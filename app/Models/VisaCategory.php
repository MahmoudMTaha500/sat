<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaCategory extends Model
{
    

    protected $fillable=[
        'creator_id',
        'name_ar'
    ];

    public function creator()
    {
        return $this->hasOne('App\Models\User' , 'id' , 'creator_id');
    }
}
