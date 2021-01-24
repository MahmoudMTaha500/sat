<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable=[
        'category_id',
        'country_id',
        'creator_id',
        'price',
        'approvement',
        'active',
    ];

    public function category()
    {
        return $this->hasOne('App\Models\VisaCategory' , 'id' , 'category_id');
    }
    public function country()
    {
        return $this->hasOne('App\Models\Country' , 'id' , 'country_id');
    }
    public function creator()
    {
        return $this->hasOne('App\Models\User' , 'id' , 'creator_id');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\VisaQuestion' , 'visa_id' , 'id');
    }
}
