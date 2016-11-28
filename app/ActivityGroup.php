<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityGroup extends Model
{
  protected $table="activityGroups";

  public function activity(){
    return $this->hasMany('App\Activity','activityID');
  }
}
