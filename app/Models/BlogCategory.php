<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = [];  

    public function blogs(){
        return $this->hasMany('App\Models\Blog','category_id','id');
    }

}
