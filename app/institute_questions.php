<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institute_questions extends Model
{
    protected $table = "institute_questions";
    protected $fillable=['question',"answer","institute_id"];
}
