<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  public function options_registrations()
  {
      return $this->hasMany('App\Option_registration');
  }
}
