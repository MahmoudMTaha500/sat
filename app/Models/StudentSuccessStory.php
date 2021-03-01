<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSuccessStory extends Model
{
    protected $fillable = [
        'storey',
        'student_id',
        'approvement',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
}
