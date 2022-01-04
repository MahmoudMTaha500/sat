<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StudentRequest extends Model implements HasMedia
{
    use InteractsWithMedia;
    
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
    // public function bill_file()
    // {
    //     return $this->belongsTo("App\Models\Insurances", 'insurance_id', 'id');
    // }


}
