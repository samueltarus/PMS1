<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function property(){
        return $this->hasMany('App\Property');
    }
    public function house(){
        return $this->hasMany('App\House');
    }

}
