<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;

class RegistrationController extends Controller
{
  public function index()
  {
    return view('registration.index');
  }

  public function show(){
    return view('registration.show');
  }

  public function create(){
    return view('registration.create');
  }

  public function edit(){
    return view('registration.edit');
  }

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


}
