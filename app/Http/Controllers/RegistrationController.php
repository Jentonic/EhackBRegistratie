<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\RegisterTeamRequest;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Activity;
use App\Option;
use Auth;

class RegistrationController extends Controller
{
  public function index()
  {
    return view('registration.index');
  }

  public function show(){
      if (Auth::check()) {
        $user = Auth::user();

        $activities = array();
        $options = array();

        if (!isEmpty($user->activities())) {
          $activities = $user->activities()->get();
        }

        if (!isEmpty($user->options())) {
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
        return view('errors.503');
      }
  }

  public function create(){
    return view('registration.create');
  }

  public function edit(){
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

    /**
     * Functie Eli
     *
     * @param RegisterTeamRequest $request
     */
  public function store(Request $request){
    //creating user
    $user = new User();
    $user->email = $request->input('email');
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->password = Hash::make($request->input('password'));
    $user->confirmationToken = Str::random(60);
    $savedUser = $user->save(); // create user

    //check if user wants new team and if user succesfully saved
    if(!$request->has('casual') && !$request->has('teamID') && $savedUser){

      //create new team
      $team = new Team();
      $team->teamleaderID = $user->id;
      $team->gameID = $request->input('gameID');
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


  public function update(Request $request){

  }

  public function storeCasual(Request $request){

    //creating user
    $user = new User();
    $user->email = $request->input('email');
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->password = Hash::make($request->input('password'));
    $user->confirmationToken = Str::random(60);
    $savedUser = $user->save(); // create user

    if(!$savedUser){
      return redirect()->back()->with('error','Could not save the user.');
    }

    if($request->has('activities')){
      $activites = $request->input('activities');
      foreach($activities as $activity){
        $ac = Activity::find($activity);
        if(!$ac->users()->count() < $ac->maxUsers){
          $error = 'Maximum amount of people reached for '.$ac->name;
          $user->delete();
          return redirect()->back()->with('error',$error);
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
    return redirect('/login');
  }

  public function storePublicTeam(Request $request){

    //creating user
    $user = new User();
    $user->email = $request->input('email');
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->password = Hash::make($request->input('password'));
    $user->confirmationToken = Str::random(60);
    $savedUser = $user->save(); // create user

    if(!$savedUser){
      return redirect()->back()->with('error','Could not save the user.');
    }

    if($request->has('team')){
      $team = Team::find($request->input('team'));
      if(!is_null($team)){
        if($team->users()->count() < $team->game()->maxPlayers){
          $team->users()->attach($user);
        }
        else{
          $user->delete();
          return redirect()->back()->with('error','This team is full');
        }
      }
      else{
        $user->delete();
        return redirect()->back()->with('error','Could not find this team');
      }
    }

    if($request->has('activities')){
      $activites = $request->input('activities');
      foreach($activities as $activity){
        $ac = Activity::find($activity);
        if(!$ac->users()->count() < $ac->maxUsers){
          $error = 'Maximum amount of people reached for '.$ac->name;
          $user->delete();
          return redirect()->back()->with('error',$error);
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
    return redirect('/login');
  }



    /**
     * Values that need to be stored eventually
    'email'
    'firstname'
    'lastname'
    'password'
    'confirmationtoken'
    'casual'
    'teamID'
    'isPublic'
    'teamUsers'
     */

  public function storeTeam(RegisterTeamRequest $request){
      $user = new User();

      $user->email = $request->input('email');
      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->password = Hash::make($request->input('password'));

      $user->confirmationToken = Str::random(60);
      $savedUser = $user->save(); // create user in db

      if($savedUser){
          $team = new Team();
          $team->teamLeaderID = $user->id;
          $team->name = $request->input('teamname');
          $team->gameID = $request->input('gameid');
          $team->public = $request->input('ispublic');

          $mailarr = $request->input('teammembers');
          $gameTeamSize = Game::where('id', $team->gameID)->maxPlayers;

          if($gameTeamSize==count(mailarr)){
              // non public team

          } else {
              // public team
          }
      }
  }

}
