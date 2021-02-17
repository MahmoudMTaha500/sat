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
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'category_id', 'id');
    }
}
