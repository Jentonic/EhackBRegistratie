<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingInvite extends Model
{
    protected $table="pendingInvites";

    public function team(){
        return $this->belongsTo('App\Team','teamID');
    }
}
