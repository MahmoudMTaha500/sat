<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

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
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(400);
    }
  
}
