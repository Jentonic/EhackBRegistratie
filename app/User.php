<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activities(){
      return $this->belongsToMany('App\Activity','userActivities','activityID','userID');
    }

    public function options(){
      return $this->belongsToMany('App\Option','userOptions','optionID','userID');
    }

    public function team(){
      return $this->belongsTo('App\Team','teamUsers','teamID','userID');
    }
}
