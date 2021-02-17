<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursePrice extends Model
{
    use SoftDeletes;

    protected $fillable  = [
                            'weeks',
                            'price',
                            'course_id',
                        ];
protected $date = ['deleted_at'];

                        
}
