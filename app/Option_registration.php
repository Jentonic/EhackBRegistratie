<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option_registration extends Model
{
  public function option()
  {
      return $this->belongsTo('App\Option');
  }

  public function registration()
  {
      return $this->hasOne('App\Registration', 'id', 'userid');
  }
}
