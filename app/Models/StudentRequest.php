<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    protected $guarded = [];  


    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'institute_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo("App\Models\Course", 'course_id', 'id');
    }

    public function airport()
    {
        return $this->belongsTo("App\Models\Airports", 'airport_id', 'id');
    }

    public function residence()
    {
        return $this->belongsTo('App\Models\residences', 'residence_id', 'id');
    }

    public function insurance()
    {
        return $this->belongsTo("App\Models\Insurances", 'insurance_id', 'id');
    }


}
