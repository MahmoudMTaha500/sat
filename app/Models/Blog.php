<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use SoftDeletes;

    // protected $fillable = [
    //     'title_ar',
    //     'slug',
    //     'content_ar',
    //     'banner',
    //     'creator_id',
    //     'country_id',
    //     'city_id',
    //     'institute_id',
    //     'approvement',
    // ];

    protected $guarded = [];  
    protected $date = ['deleted_at'];

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'category_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo("App\Models\City", 'city_id', 'id');
    }

    public function institute()
    {
        return $this->belongsTo('App\Models\Institute', 'institute_id', 'id');
    }
}
