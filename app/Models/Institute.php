<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class institute extends Model
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
}
