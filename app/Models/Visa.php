<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\VisaCategory', 'category_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'id', 'creator_id');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\VisaQuestion', 'visa_id', 'id');
    }
}
