<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurances extends Model
{
    protected $table='insurances';
    protected $guarded = [];

    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'institute_id', 'id');
    }
}
