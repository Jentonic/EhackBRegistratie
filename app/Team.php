<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function users(){
    return $this->belongsToMany('App\User','teamUsers','teamID','userID');
  }

  public function game(){
    return $this->belongsTo('App\Game');
  }
}
