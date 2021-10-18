<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $date = ['deleted_at'];

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }
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
    public function blogs()
    {
        return $this->hasMany('App\Models\Blog', 'course_id', 'id');
    }
    public function student_request(){
        return  $this->hasMany("App\Models\StudentRequest",'course_id','id');
    }
}
