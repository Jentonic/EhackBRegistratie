<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  public function teams(){
    return $this->hasMany('App\Team','gameID');
  }

  public function isFull(){
      $max = $this->maxTeams;
      $now = $this->teams()->count();
      return $now>=$max;
  }
}
