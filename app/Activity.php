<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function group(){
      return $this->belongsTo('App\ActivityGroup','activityGroupID');
    }

    public function users(){
      return $this->belongsToMany('App\User','userActivities','activityID','userID');
    }
}
