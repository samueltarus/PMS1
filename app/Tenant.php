<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'username','passport','email',
      'occupation','age', 'address','county', 'town', 'phone_number','avatar','status',
    ];

    public function house(){
        return $this->hasMany('App\House');
    }
    public function property(){
        return $this->belongsTo('App\Property');
    }

}
