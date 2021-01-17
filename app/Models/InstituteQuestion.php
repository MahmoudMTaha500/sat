<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstituteQuestion extends Model
{
    protected $table = "institute_questions";
    protected $fillable=['question',"answer","institute_id"];
}
