<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institute extends Model
{
    use SoftDeletes;
    protected $table = 'institutes';
    protected $fillable = [
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
        'approvement',
    ];
    protected $date = ['deleted_at'];

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'institute_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo("App\Models\City", 'city_id', 'id');
    }
    public function rats()
    {
        return $this->hasMany("App\Models\InstituteRate", 'institute_id', 'id');
    }

}
