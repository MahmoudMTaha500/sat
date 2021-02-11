<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institute extends Model
{
    use SoftDeletes;
    protected $table = 'institutes';
    protected $fillable=[
        'name_ar',
        'slug',
        'about_ar',
        'country_id',
        'city_id',
        'logo',
        'banner',
        'creator_id',
        'sat_rate',
        'rate_switch',
        'approvment',
    ];
protected $date = ['deleted_at'];


    public function country()
    {
        return $this->hasMany('App\Models\Country' , 'id' , 'country_id');
    }
    

    public function city (){
        return $this->hasMany("App\Models\City",'id','city_id');
    }

    
}
