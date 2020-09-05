<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{


    protected $fillable = [
      'landlord_id','property_name','property_manager','property_number','property_type','property_description',
      'number_of_units','projected_monthly_rev','projected_annulized_rev','management_fee','address',
      'county','constituency','town','phone_number','avatar','status',
    ];

    public function landlord(){
        return $this->belongsTo('App\Landlord');
    }
    public function houses(){
        return $this->hasMany('App\House');
    }
}
