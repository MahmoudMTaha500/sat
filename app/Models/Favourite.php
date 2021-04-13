<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo("App\Models\Course", 'course_id', 'id');
    }
}
