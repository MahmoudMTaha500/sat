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

    public function institute(){
        return $this->hasOne("App\Models\Institute",'id','institute_id');
    }
    public function student(){
        return $this->hasOne("App\Models\Student",'id','student_id');
    }
}
