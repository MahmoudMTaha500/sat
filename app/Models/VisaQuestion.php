<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaQuestion extends Model
{
    
    protected $fillable=[
        'visa_id',
        'question_ar',
        'field_type',
        'priority'
    ];

    public function visa()
    {
        return $this->hasOne('App\Models\Visa' , 'id' , 'visa_id');
    }

    public function question_choices()
    {
        return $this->hasMany('App\Models\VisaQuestionChoice' , 'question_id' , 'id');
    }
}
