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

class RegistrationController extends Controller
{
    public function index(){
        return view('registration.index');
    }

    public function show(){
        return view('registration.show');
    }

    public function create(){
        return view('registration.create');
    }

    public function createCasual(){
        $activities;
        $collection = Activity::all();
        foreach($collection as $ac){
            if($ac->users()->count() < $ac->maxUsers){
                $activities[] = $ac;
            }
        }
        return view('registration.create-casual')->with('activities',collect($activities))->with('options',Option::all());
    }

    public function createPublic(){
        $activities;
        $collection = Activity::all();
        foreach($collection as $ac){
            if($ac->users()->count() < $ac->maxUsers){
                $activities[] = $ac;
            }
        }

        $games = Game::orderBy('name')->where('maxPlayers','>',1)->get();

        $teams;
        $collection2 = Team::where('gameID',$games[0]->id)->where('isPublic','1')->get();
        foreach($collection2 as $t){
            if(($t->game->maxPlayers - $t->invites()->count() - $t->users()->count()) > 0){
                $teams[] = $t;
            }
        }

        $view = view('registration.create-public')->with('games',$games);
        if(!empty($teams)){
            $view->with('teams',collect($teams));
        }
        if(!empty($activities)){
            $view->with('activities',collect($activities));
        }
        return $view->with('options',Option::all());
    }

    public function edit(){
        return view('registration.edit');
    }

    /**
     * Stores the teamleader + the new team he wants to create
     *
     * @param Request $request
     */
    public function store(RegisterTeamRequest $request){
        //creating user
        $user = new User();
        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->confirmationToken = Str::random(60);

        $savedUser = $user->save(); // create user

        $game = Game::where('id',$request->input('gameID'));
        $maxTeamsReached = Game::where('id', $game->id)->first()->maxTeams < $game->teams()->count();

        //check if user wants new team and if user succesfully saved
        if(!$request->has('casual') && !$request->has('teamID') && $savedUser && $maxTeamsReached){

            //create new team
            $team = new Team();
            $team->teamleaderID = $user->id;
            $team->gameID = $gameID;
            $game = Game::find($team->gameID);
            $team->isPublic = $request->input('isPublic');
            $savedTeam = $team->save(); //create team

            //check if team succesfully saved
            if($savedTeam){
                $teamUsers = $request->input('teamUsers');//array of emails

                if($team->isPublic || (!$team->isPublic && count($teamUsers) == $game->maxPlayers)){
                    $checkAttach = true;

                    foreach($teamUsers as $teamUser){
                        $userTeam = new User();
                        $userTeam->email = $teamUser;
                        $userTeam->hasRole = false;
                        $userTeam->confirmed = false;
                        $userTeam->confirmationToken = Str::random(60);
                        $userTeam->save();
                        $savedTeamUser = $team->users()->attach($userTeam);//insert into teamUserstable
                        if(!$savedTeamUser){
                            $checkAttach = false;
                        }
                    }
                    if($checkAttach){
                        $team->delete();
                        $user->delete();
                        //stuur hier de teaminvites
                    }
                    else{
                        //return with error niet alle teamgenoten konden geinvite worden
                    }
                }
                else{
                    $team->delete();
                    $user->delete();
                    //return with error not enough players for private team
                }
            }
            else{
                $user->delete();
                //return with error could not make team;
            }
        }
        else if($request->has('teamID') && $savedUser){//want to join existing team
            $team = Team::find($request->input('teamID'));
            if($team){
                $team->users()->attach($user);//insert into teamUserstable
            }
            else{
                //return with could not find team
            }
        }
        else if(!$savedUser){
            //return with error could not make user;
        }
        //stuur hier een confirmatie mail
        //return with ayyy it worked
    }

    public function update(Request $request){}

    public function ajaxTeams($gameid){
        $teams;
        $collection2 = Team::where('gameID',$gameid)->where('isPublic','1')->get();
        foreach($collection2 as $t){
            if(($t->game->maxPlayers - $t->invites()->count() - $t->users()->count()) > 0){
                $teams[] = $t;
            }
        }
        $view = view('ajax.team');
        if(!empty($teams)){
            $view->with('teams',$teams);
        }
        return $view;
    }

    public function userConfirmation($token){
        $user = User::where('confirmationToken',$token)->first();
        if(!empty($user)){
            $user->confirmed = true;
            return view('registration.confirmation')->with('succ','Your account is confirmed. Enjoy EhackB!');
        }
        else{
            return view('registration.confirmation')->with('err','We could not confirm your account with this token.');
        }
    }

    public function createMailInvite(Request $request,$token){
        $invite = PendingInvite::where('token',$token)->first();

        $activities;
        $collection = Activity::all();
        foreach($collection as $ac){
            if($ac->users()->count() < $ac->maxUsers){
                $activities[] = $ac;
            }
        }


        if(!empty($invite)){
            return view('registration.create-mail')->with('activities',collect($activities))->with('invite',$invite)->with('team',$invite->team)->with('options',Option::all());
        }
        else{
            return view('registration.mail-error')->with('activities',collect($activities))->with('options',Option::all());
        }
    }

    public function storeCasual(Request $request){


        //creating user
        $user = new User();
        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->confirmationToken = str_replace('/','_',Str::random(60));
        $savedUser = $user->save(); // create user

        if(!$savedUser){
            return redirect()->back()->with('err','Could not save the user.');
        }

        if($request->has('activities')){
            $activities = $request->input('activities');
            foreach($activities as $activity){
                $ac = Activity::find($activity);
                if(!$ac->users()->count() < $ac->maxUsers){
                    $error = 'Maximum amount of people reached for '.$ac->name;
                    $user->delete();
                    return redirect()->back()->with('err',$error);
                }
            }
            foreach($activities as $activity){
                $ac = Activity::find($activity);
                if(!is_null($ac)){
                    $ac->users()->attach($user);
                }
            }
        }

        if($request->has('options')){
            $options = $request->input('options');
            foreach($options as $option){
                $op = Option::find($option);
                if(!is_null($op)){
                    $op->users()->attach($user);
                }
            }
        }

        //sendmail
        $this->mailConfirm($user);
        return redirect('/login');
    }

    public function storePublicTeam(RegisterPublicRequest $request){

        //creating user
        $user = new User();
        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->confirmationToken = str_replace('/','_',Str::random(60));
        $savedUser = $user->save(); // create user

        if(!$savedUser){
            return redirect()->back()->with('err','Could not save the user.');
        }

        if($request->has('team')){
            $team = Team::find($request->input('team'));
            if(!is_null($team)){
                if($team->users()->count() < (($team->game->maxPlayers) - $team->invites()->count())){
                    $team->users()->attach($user);
                    if($team->users()->count() == $team->game->maxPlayers){
                        $team->isPublic = false;
                    }
                }
                else{
                    $user->delete();
                    return redirect()->back()->with('err','This team is full');
                }
            }
            else{
                $user->delete();
                return redirect()->back()->with('err','Could not find this team');
            }
        }

        if($request->has('activities')){
            $activities = $request->input('activities');
            foreach($activities as $activity){
                $ac = Activity::find($activity);
                if($ac->users()->count() >= $ac->maxUsers){
                    $error = 'Maximum amount of people reached for '.$ac->name;
                    $user->delete();
                    return redirect()->back()->with('err',$error);
                }
            }
            foreach($activities as $activity){
                $ac = Activity::find($activity);
                if(!is_null($ac)){
                    $ac->users()->attach($user);
                }
            }
        }

        if($request->has('options')){
            $options = $request->input('options');
            foreach($options as $option){
                $op = Option::find($option);
                if(!is_null($op)){
                    $op->users()->attach($user);
                }
            }
        }

        //sendmail
        $this->mailConfirm($user);
        return redirect('/login');
    }

    public function storeMailInvite(RegisterMailRequest $request){
        //dd($request);
        $token = $request->input('token');
        $invite = PendingInvite::where('token',$token)->first();

        //creating user
        $user = new User();
        $user->email = $invite->email;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->confirmationToken = str_replace('/','_',Str::random(60));
        $savedUser = $user->save(); // create user


        if(!$savedUser){
            return redirect()->back()->with('err','Could not save the user.');
        }

        if($request->has('activities')){
            $activities = $request->input('activities');
            foreach($activities as $activity){
                $ac = Activity::find($activity);
                if($ac->users()->count() >= $ac->maxUsers){
                    $error = 'Maximum amount of people reached for '.$ac->name;
                    $user->delete();
                    return redirect()->back()->with('err',$error);
                }
            }
            foreach($activities as $activity){
                $ac = Activity::find($activity);
                if(!is_null($ac)){
                    $ac->users()->attach($user);
                }
            }
        }

        if($request->has('options')){
            $options = $request->input('options');
            foreach($options as $option){
                $op = Option::find($option);
                if(!is_null($op)){
                    $op->users()->attach($user);
                }
            }
        }

        $team = Team::where('id',$invite->teamID)->first();
        $team->users()->attach($user);

        $invite->delete();

        //sendmail
        $this->mailConfirm($user);
        return redirect('/login');
    }

    public function storeTeam(RegisterTeamRequest $request){
        $user = new User();

        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));

        $user->confirmationToken = str_replace('/','_',Str::random(60));
        $savedUser = $user->save(); // create user in db

        if($savedUser){
            $team = new Team();
            $team->leaderID = $user->id;
            $team->name = $request->input('teamname');
            $team->gameID = $request->input('gameid');

            $mailarr = $request->input('teammembers');

            $gameTeamSize = Game::where('id', $team->gameID)->first()->maxPlayers;

            //remove empty fields
            $mailarr = array_filter($mailarr);

            if($gameTeamSize==count($mailarr)){
                // non public team
                $team->isPublic = false;
            } else {
                // public team
                $team->isPublic = true;
            }

            $savedTeam = $team->save();
            if($savedTeam) {
                $pendingInvites = array();

                for($i=0;$i<count($mailarr);$i++) {
                    $membermail = $mailarr[$i];
                    $inv = new PendingInvite();
                    $inv->email = $membermail;
                    $inv->teamID = $team->id;
                    $inv->token = str_replace('/','_',Str::random(60));
                    array_push($pendingInvites, $inv);
                }
                foreach ($pendingInvites as $pendingInvite) {
                    if($pendingInvite->save()){
                        $this->mailInvite($pendingInvite, $team);
                    }
                }
            } else {
                $team->delete();
            }

        } else {
            // cri
        }
    }

    private function mailInvite(PendingInvite $invite, Team $team){
        // $message->bcc($address, $name = null);
        $game = Game::where('id', $team->gameID)->first();
        $leader = User::where('id', $team->leaderID)->first();

        $title = "Welcome to EhackB!";
        $content = "You were invited to a {$game->name} team by {$leader->firstName} {$leader->lastName}<br>
                    Want to join in on the fun? Click the link below.";

        /*
        $content2 = "Hi, <br><br>
            Join me 16-17 december in the fight for the best {$game->name} team at EhackB 2016.
            Click the link below to join our team {$team->name}<br><br>
            Regards,<br><br>{$leader->firstName} {$leader->lastName}<br>";
        */

        $token = $invite->token;
        Mail::send(['html'=>'mail.invite'],['title' => $title, 'content' => $content, 'team' => $team->name, 'token'=>$token], function($message) use ($invite){
            $message->sender('no-reply@ehackb.be', $name = 'EhackB crew');
            $message->subject('You have been invited to a team at EhackB!');
            $message->replyTo('ehackb@ehackb.be', $name = null);
            $message->to($invite->email, $name = null);
        });
    }

    private function mailConfirm(User $user){
        $title = "Welcome to EhackB!";
        $content = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, aspernatur cupiditate dignissimos expedita facilis fugit hic nam sed tempora voluptas?";

        Mail::send('mail.invite',  ['title' => $title, 'content' => $content], function($message) use ($user){
            $message->sender('no-reply@ehackb.be', $name = 'EhackB crew');
            $message->subject('You have been invited to a team for EhackB!');
            $message->to($user->email, $name = null);
        });
    }
}
