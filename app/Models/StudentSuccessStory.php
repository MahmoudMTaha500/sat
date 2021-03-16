<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSuccessStory extends Model
{
    protected $guarded = []; 
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
}
