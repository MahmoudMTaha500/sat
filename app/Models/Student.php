<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Student extends Authenticatable implements HasMedia
{
    use Notifiable;
    use InteractsWithMedia;
    
    protected $guarded = []; 

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo("App\Models\City", 'city_id', 'id');
    }
    public function all_courses_requests()
    {
        return $this->hasMany("App\Models\StudentRequest", 'student_id', 'id');
    }
    public function single_course_request()
    {
        return $this->hasOne("App\Models\StudentRequest", 'student_id', 'id');
    }
    public function sucess_story()
    {
        return $this->hasOne("App\Models\StudentSuccessStory", 'student_id', 'id');
    }
    public function favourite_courses()
    {
        return $this->hasMany("App\Models\Favourite", 'student_id', 'id');
    }
}
