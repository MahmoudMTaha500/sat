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
}
