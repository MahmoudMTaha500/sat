<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    protected $guarded = [];  

    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'institute_id', 'id');
    }
}
