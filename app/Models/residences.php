<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class residences extends Model
{
    protected $fillable=['name_ar','price','institute_id'];
  
    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'institute_id', 'id');
    }
}
