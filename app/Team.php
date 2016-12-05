<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function users(){
    return $this->belongsToMany('App\User','teamUsers','teamID','userID');
  }

  public function invites()
  {
      return $this->hasMany('App\PendingInvite', 'teamID');
  }

  public function game(){
    return $this->belongsTo('App\Game','gameID');
  }

  public function leader(){
    return $this->hasOne('App\User','id','leaderID');
  }
}
