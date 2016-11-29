<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\RegisterTeamRequest;
use App\Http\Requests\RegisterCasualRequest;
use App\Http\Requests\RegisterPublicRequest;
use App\Http\Requests\RegisterMailRequest;
use App\PendingInvite;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Activity;
use App\Option;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('ehackb.index');
    }

    public function show()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $activities = array();
            $options = array();

            if (!empty($user->activities())) {
                $activities = $user->activities()->get();
            }

            if (!empty($user->options())) {
                $options = $user->options()->get();

            }
            if ($user->hasTeam) {
                $team = $user->team()->get()->first();
                $game = $team->game()->get()->first();

                if ($game->isSingleplayer) {
                    return view('registration.show')->with('user', $user)->with('activities', $activities)->with('options', $options)->with('team', $team)->with('game', $game);
                } else {
                    $teamUsers = $team->users()->get();
                    $members = array();
                    foreach ($teamUsers as $teamUser) {
                        array_push($members, $teamUser);
                    }
                    return view('registration.show')->with('user', $user)->with('activities', $activities)->with('options', $options)->with('team', $team)->with('game', $game)->with('members', $members);
                }
            } else {
                return view('registration.show')->with('user', $user)->with('activities', $activities)->with('options', $options);
            }
        } else {
            // Make unauthorized page
            return redirect('/login');
        }
    }

    public function create()
    {
        $activities;
        $collection = Activity::all();
        foreach ($collection as $ac) {
            if ($ac->users()->count() < $ac->maxUsers) {
                $activities[] = $ac;
            }
        }
        return view('registration.create')->with('activities', collect($activities))->with('options', Option::all());
    }

    public function createCasual()
    {
        $activities;
        $collection = Activity::all();
        foreach ($collection as $ac) {
            if ($ac->users()->count() < $ac->maxUsers) {
                $activities[] = $ac;
            }
        }
        return view('registration.create-casual')->with('activities', collect($activities))->with('options', Option::all());
    }

    public function createPublic()
    {
        $games = Game::orderBy('name')->where('maxPlayers', '>', 1)->get();
        $teams;
        $collection2 = Team::where('gameID', $games[0]->id)->where('isPublic', '1')->get();
        foreach ($collection2 as $t) {
            if (($t->game->maxPlayers - $t->invites()->count() - $t->users()->count()) > 0) {
                $teams[] = $t;
            }
        }

        $view = view('registration.create-public')->with('games', $games);
        if (!empty($teams)) {
            $view->with('teams', collect($teams));
        }

        $view->with('activities', $this->getAvailableActivities());

        return $view->with('options', Option::all());
    }

    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $activities = null;

            if (!isEmpty($user->activities())) {
                $activities = $user->activities()->get();
            }

            if ($user->hasTeam) {
                $team = $user->team()->get()->first();

                return view('registration.show')->with('user', $user)->with('activities', $activities)->with('team', $team);
            } else {
                return view('registration.show')->with('user', $user)->with('activities', $activities);
            }
        } else {
            // Make unauthorized page
            return view('errors.503');
        }
        return view('registration.edit');
    }

    public function storeTeam(RegisterTeamRequest $request)
    {
        $user = new User();

        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));

        $user->confirmationToken = str_replace('/', '_', Str::random(60));
        $savedUser = $user->save(); // create user in db

        if ($request->has('activities')) {
            $activities = $request->input('activities');
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if (!$ac->users()->count() < $ac->maxUsers) {
                    $error = 'Maximum amount of people reached for ' . $ac->name;
                    $user->delete();
                    return redirect()->back()->with('err', $error);
                }
            }
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if (!is_null($ac)) {
                    $ac->users()->attach($user);
                }
            }
        }

        if ($request->has('options')) {
            $options = $request->input('options');
            foreach ($options as $option) {
                $op = Option::find($option);
                if (!is_null($op)) {
                    $op->users()->attach($user);
                }
            }
        }

        if ($savedUser) {
            $team = new Team();
            $team->leaderID = $user->id;
            $team->name = $request->input('teamname');
            $team->gameID = $request->input('gameid');

            $mailarr = $request->input('teammembers');
            $gameTeamSize = Game::where('id', $team->gameID)->first()->maxPlayers;

            //remove empty fields
            $mailarr = array_filter($mailarr);

            if ($gameTeamSize == count($mailarr)) {
                // non public team
                $team->isPublic = false;
            } else {
                // public team
                $team->isPublic = true;
            }
            $savedTeam = $team->save();
            if ($savedTeam) {
                $pendingInvites = array();

                for ($i = 0; $i < count($mailarr); $i++) {
                    $membermail = $mailarr[$i];
                    $inv = new PendingInvite();
                    $inv->email = $membermail;
                    $inv->teamID = $team->id;
                    $inv->token = str_replace('/', '_', Str::random(60));
                    array_push($pendingInvites, $inv);
                }
                foreach ($pendingInvites as $pendingInvite) {
                    if ($pendingInvite->save()) {
                        $this->mailInvite($pendingInvite, $team);
                    }
                }
                $team->users()->attach($user);
                $this->mailConfirm($user);
            } else {
                $team->delete();
                $user->delete();
                return redirect()->back()->with('err', 'Could not save the team.');
            }
        } else {
            return redirect()->back()->with('err', 'Could not save the user.');
        }
        return redirect("/login");
    }

    public function update(Request $request)
    {
    }

    public function ajaxTeams($gameid)
    {
        $teams;
        $collection2 = Team::where('gameID', $gameid)->where('isPublic', '1')->get();
        foreach ($collection2 as $t) {
            if (($t->game->maxPlayers - $t->invites()->count() - $t->users()->count()) > 0) {
                $teams[] = $t;
            }
        }
        $view = view('ajax.team');
        if (!empty($teams)) {
            $view->with('teams', $teams);
        }
        return $view;
    }


    public function userConfirmation($token){
        $user = User::where('confirmationToken',$token)->first();
        if(isset($user) && $user->confirmed == false){
            $user->confirmed = true;
            $user->save();
            return view('registration.confirmation')->with('succ','Your account is confirmed. Enjoy EhackB!');
        }
        else if(isset($user) && $user->confirmed == true){
          return view('registration.confirmation')->with('succ','Your account was already confirmed');
        }
        else{
            return view('registration.confirmation')->with('err','We could not confirm your account with this token.');
        }
    }

    public function createMailInvite(Request $request, $token)
    {
        $invite = PendingInvite::where('token', $token)->first();


        if (!empty($invite)) {
            return view('registration.create-mail')->with('activities', $this->getAvailableActivities())->with('invite', $invite)->with('team', $invite->team)->with('options', Option::all());
        } else {
            return view('registration.mail-error')->with('activities', $this->getAvailableActivities())->with('options', Option::all());
        }
    }

    public function storeCasual(RegisterCasualRequest $request)
    {
        //creating user
        $user = new User();
        $user->email = $request->input('email');
        $user->reminderMail = $request->input('reminderemail');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->confirmationToken = str_replace('/', '_', Str::random(60));
        $savedUser = $user->save(); // create user

        if (!$savedUser) {
            return redirect()->back()->with('err', 'Could not save the user.');
        }

        if ($request->has('activities')) {
            $activities = $request->input('activities');
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if ($ac->users()->count() >= $ac->maxUsers) {
                    $error = 'Maximum amount of people reached for ' . $ac->name;
                    $user->delete();
                    return redirect()->back()->with('err', $error);
                }
            }
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if (!is_null($ac)) {
                    $ac->users()->attach($user);
                }
            }
        }

        if($request->has('options')) {
            $options = $request->input('options');
            foreach ($options as $option) {
                $op = Option::find($option);
                if (!is_null($op)) {
                    $op->users()->attach($user);
                }
            }
        }

        //sendmail
        $this->mailConfirm($user);
        return redirect('/login');
    }

    public function storePublicTeam(RegisterPublicRequest $request)
    {

        //creating user
        $user = new User();
        $user->email = $request->input('email');
        $user->reminderMail = $request->input('reminderemail');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->confirmationToken = str_replace('/', '_', Str::random(60));
        $savedUser = $user->save(); // create user

        if (!$savedUser) {
            return redirect()->back()->with('err', 'Could not save the user.');
        }

        if ($request->has('team')) {
            $team = Team::find($request->input('team'));
            if (!is_null($team)) {
                if ($team->users()->count() < (($team->game->maxPlayers) - $team->invites()->count())) {
                    $team->users()->attach($user);
                    if ($team->users()->count() == $team->game->maxPlayers) {
                        $team->isPublic = false;
                    }
                } else {
                    $user->delete();
                    return redirect()->back()->with('err', 'This team is full');
                }
            } else {
                $user->delete();
                return redirect()->back()->with('err', 'Could not find this team');
            }
        }

        if ($request->has('activities')) {
            $activities = $request->input('activities');
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if ($ac->users()->count() >= $ac->maxUsers) {
                    $error = 'Maximum amount of people reached for ' . $ac->name;
                    $user->delete();
                    return redirect()->back()->with('err', $error);
                }
            }
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if (!is_null($ac)) {
                    $ac->users()->attach($user);
                }
            }
        }

        if ($request->has('options')) {
            $options = $request->input('options');
            foreach ($options as $option) {
                $op = Option::find($option);
                if (!is_null($op)) {
                    $op->users()->attach($user);
                }
            }
        }

        //sendmail
        $this->mailConfirm($user);
        return redirect('/login');
    }

    public function storeMailInvite(RegisterMailRequest $request)
    {
        //dd($request);
        $token = $request->input('token');
        $invite = PendingInvite::where('token', $token)->first();

        //creating user
        $user = new User();
        $user->email = $invite->email;
        $user->reminderMail = $request->input('reminderemail');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->confirmationToken = str_replace('/', '_', Str::random(60));
        $savedUser = $user->save(); // create user


        if (!$savedUser) {
            return redirect()->back()->with('err', 'Could not save the user.');
        }

        if ($request->has('activities')) {
            $activities = $request->input('activities');
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if ($ac->users()->count() >= $ac->maxUsers) {
                    $error = 'Maximum amount of people reached for ' . $ac->name;
                    $user->delete();
                    return redirect()->back()->with('err', $error);
                }
            }
            foreach ($activities as $activity) {
                $ac = Activity::find($activity);
                if (!is_null($ac)) {
                    $ac->users()->attach($user);
                }
            }
        }

        if ($request->has('options')) {
            $options = $request->input('options');
            foreach ($options as $option) {
                $op = Option::find($option);
                if (!is_null($op)) {
                    $op->users()->attach($user);
                }
            }
        }

        $team = Team::where('id', $invite->teamID)->first();
        $team->users()->attach($user);

        $invite->delete();

        //sendmail
        $this->mailConfirm($user);
        return redirect('/login');
    }

    private function mailInvite(PendingInvite $invite, Team $team)
    {
        // $message->bcc($address, $name = null);
        $game = Game::where('id', $team->gameID)->first();
        $leader = User::where('id', $team->leaderID)->first();

        $title = "Welkom bij EhackB!";
        $content = "Je bent uitgenodigd voor een {$game->name} team door {$leader->firstName} {$leader->lastName}<br>
                    Wil je meedoen? Klik op de link hieronder!";

        /*
        $content2 = "Hi, <br><br>
            Join me 16-17 december in the fight for the best {$game->name} team at EhackB 2016.
            Click the link below to join our team {$team->name}<br><br>
            Regards,<br><br>{$leader->firstName} {$leader->lastName}<br>";
        */

        $token = $invite->token;
        Mail::send(['html'=>'mail.invite'],['title' => $title, 'content' => $content, 'team' => $team->name, 'token'=>$token], function($message) use ($invite){
            $message->sender('no-reply@ehackb.be', $name = 'EhackB crew');
            $message->subject('Je bent uitgenodigd voor een team op EhackB!');
            $message->replyTo('ehackb@ehackb.be', $name = null);
            $message->to($invite->email, $name = null);
        });
    }

    private function mailConfirm(User $user)
    {
        $title = "Welkom bij EhackB!";
        $content = "Confirmeer je email adres!";
        Mail::send('mail.confirmation',  ['title' => $title, 'content' => $content,'user' => $user,'token' => $user->confirmationToken], function($message) use ($user){
            $message->sender('no-reply@ehackb.be', $name = 'EhackB crew');
            $message->subject('Welcome to EhackB!');
            $message->to($user->email, $name = null);
        });

    }

    private function getAvailableActivities(){
        $activities=array();
        $collection = Activity::all();
        foreach ($collection as $ac) {
            if ($ac->users()->count() < $ac->maxUsers) {
                $activities[] = $ac;
            }
        }

        return collect($activities);
    }

}
