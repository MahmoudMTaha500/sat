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
}
