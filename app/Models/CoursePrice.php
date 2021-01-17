<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePrice extends Model
{
    protected $fillable  = [
                            'weeks',
                            'price',
                            'course_id',
                        ];
}
