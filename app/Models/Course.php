<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_ar',
        'about_ar',
        'institute_id',
        'creator_id',
        'min_age',
        'start_day',
        'study_period',
        'lessons_per_week',
        'hours_per_week',
        'required_level',
        'discount',
        'approvment',
        'slug',
    ];
    protected $date = ['deleted_at'];

    public function institute()
    {
        return $this->belongsTo('App\Models\Institute', 'institute_id', 'id');
    }
    public function coursesPricePerWeek()
    {
        return $this->hasOne('App\Models\CoursePrice', 'course_id', 'id')->orderBy('weeks' , 'ASC');
    }
    public function coursesPrice()
    {
        return $this->hasMany('App\Models\CoursePrice', 'course_id', 'id')->orderBy('weeks' , 'ASC');
    }
    public function student_favourite()
    {
        return $this->hasMany('App\Models\Favourite', 'course_id', 'id');
    }
}
