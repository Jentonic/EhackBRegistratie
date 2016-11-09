<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity_registration extends Model
{
  public function activity()
  {
      return $this->belongsTo('App\Activity');
  }

  public function registration()
  {
      return $this->hasOne('App\Registration', 'id', 'userid');
  }
}
