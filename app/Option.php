<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  public function users(){
    return $this->belongsToMany('App\User','userOptions','optionID','userID');
  }
}
