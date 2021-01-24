<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable  = [
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
                ];

                public function institute(){
                   return   $this->hasOne('App\Models\Institute' , 'id', 'institute_id');
                }
                public function coursesPrice(){
                    return $this->hasMany('App\Models\CoursePrice','id','course_id');
                }
}
