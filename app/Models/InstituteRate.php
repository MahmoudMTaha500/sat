<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstituteRate extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $date = ['deleted_at'];
    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'institute_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo("App\Models\Student", 'student_id', 'id');
    }
}
