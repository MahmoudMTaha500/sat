<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = 'institutes';
    protected $fillable=[
        'name_ar',
        'about_ar',
        'country_id',
        'city_id',
        'logo',
        'banner',
        'creator_id',
        'sat_rate',
        'rate_switch',
        'active',
        'approvment',
    ];

    public function country()
    {
        return $this->hasMany('App\Models\Country' , 'id' , 'country_id');
    }
    

    public function city (){
        return $this->hasOne("App\Models\City",'id','city_id');
    }

    
}
