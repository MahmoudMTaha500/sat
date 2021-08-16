<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaQuestionChoices extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo('App\Models\VisaQuestion', 'question_id', 'id');
    }
}
