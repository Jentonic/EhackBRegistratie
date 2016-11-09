<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  public function team()
  {
      return $this->belongsTo('App\Team','id','teamid');
  }

  public function registration()
  {
      return $this->hasOne('App\Registration','id','userid');
  }
}
