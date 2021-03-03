<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurances extends Model
{
    // protected $guarded = [];  
    protected $table='insurances';
    protected $fillable=['name_ar','price','institute_id'];

    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'institute_id', 'id');
    }
}
