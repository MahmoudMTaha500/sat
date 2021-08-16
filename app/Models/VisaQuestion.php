<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaQuestion extends Model
{

    protected $guarded = [];

    public function visa()
    {
        return $this->belongsTo('App\Models\Visa', 'visa_id', 'id');
    }

    public function question_choices()
    {
        return $this->hasMany('App\Models\VisaQuestionChoices', 'question_id', 'id');
    }
}
