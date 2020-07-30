<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{


    protected $fillable = [
        'first_name', 'last_name', 'username','email',
        'passport', 'password', 'confirm_password','birth_date','gender',
        'address','county','constituency', 'town', 'phone_number','avatar','status',
    ];

    public function property(){

        return $this->hasMany('App\Property');
    }
}
