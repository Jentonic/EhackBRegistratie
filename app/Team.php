<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function players()
  {
      return $this->hasMany('App\Player');
  }

  public function registration()
  {
      return $this->belongsTo('App\Registration','id','userid');
  }

  public function game()
  {
      return $this->belongsTo('App\Game','id','gameid');
  }


}
