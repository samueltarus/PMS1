<?php

namespace App;
use App\Property;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{

    protected $fillable = [
        'property_id', 'unit_name','meter_number', 'unit_type','status','avatar',

    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
