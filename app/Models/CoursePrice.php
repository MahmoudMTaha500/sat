<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursePrice extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $date = ['deleted_at'];

}
