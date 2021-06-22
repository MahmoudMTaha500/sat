<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaCategory extends Model
{

    protected $fillable = [
        'creator_id',
        'name_ar',
    ];

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }
}
