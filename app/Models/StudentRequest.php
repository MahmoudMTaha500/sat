<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'institute_message',
        'status',
    ];
}
