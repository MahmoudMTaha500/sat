<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institute extends Model
{
    protected $table = "institutes";
    protected $fillable=['name_ar',"about_ar","country_id",'city_id'];
}
