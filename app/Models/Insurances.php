<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurances extends Model
{
    // protected $guarded = [];  
    protected $table='insurances';
    protected $fillable=['price','institute_id' , 'weeks'];

    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'institute_id', 'id');
    }
}
