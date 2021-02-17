<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstituteRate extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'rate',
        'student_id',
        'institute_id',
    ];

    protected $date = ['deleted_at'];
    public function institute(){
        return $this->hasOne("App\Models\Institute",'id','institute_id');
    }
    public function student(){
        return $this->hasOne("App\Models\Student",'id','student_id');
    }
}
