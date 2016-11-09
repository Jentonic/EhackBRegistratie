<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
  public function team()
  {
      return $this->hasOne('App\Team');
  }

  public function activities()
  {
      return $this->hasMany('App\Activity_registration');
  }

  public function options()
  {
      return $this->hasMany('App\Option_registration');
  }
}
