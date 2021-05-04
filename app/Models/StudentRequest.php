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
<<<<<<< HEAD
        return $this->belongsTo('App\Models\residences', 'residence_id', 'id');
=======
        return $this->belongsTo("App\Models\Residences", 'residence_id', 'id');
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
    }

    public function insurance()
    {
        return $this->belongsTo("App\Models\Insurances", 'insurance_id', 'id');
    }


}
