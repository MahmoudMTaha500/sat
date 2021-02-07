<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstituteRate extends Model
{
    protected $fillable=[
        'rate',
        'student_id',
        'institute_id',
    ];
}
