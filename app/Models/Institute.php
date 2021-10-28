<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Institute extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    protected $table = 'institutes';
    protected $guarded = [];
    protected $date = ['deleted_at'];
    

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }
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
    public function residence()
    {
        return $this->hasMany('App\Models\residences', 'institute_id', 'id');
    }
    public function airport()
    {
        return $this->hasMany("App\Models\Airports", 'institute_id', 'id');
    }
    public function insurancePrice()
    {
        return $this->hasMany('App\Models\Insurances', 'institute_id', 'id')->orderByRaw("CAST(weeks as UNSIGNED) ASC")->select('weeks' , 'price');
    }
    public function rats()
    {
        return $this->hasMany("App\Models\InstituteRate", 'institute_id', 'id');
    }
    public function approved_rates()
    {
        return $this->hasMany("App\Models\InstituteRate", 'institute_id', 'id')->where('approvement' , 1);
    }
    public function blogs()
    {
        return $this->hasMany('App\Models\Blog', 'institute_id', 'id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(400);
    }

}
