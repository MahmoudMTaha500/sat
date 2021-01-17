<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = "cities";
    protected $fillable = ['name_ar','country_id'];

    public function country()
    {
        return $this->hasOne('App\Models\Country' , 'id' , 'country_id');
    }
}
