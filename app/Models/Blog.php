<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'banner',
        'creator_id',
        'country_id',
        'city_id',
        'institute_id',
        'approvement',
    ];

    public function creator()
    {
        return $this->hasOne('App\User' , 'id' , 'creator_id');
    }

    public function category()
    {
        return $this->hasOne('App\Models\BlogCategory' , 'id' , 'category_id');
    }
}
