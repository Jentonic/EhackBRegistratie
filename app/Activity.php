<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  public function acitivties_registrations()
  {
      return $this->hasMany('App\Activity_registration');
  }
}
