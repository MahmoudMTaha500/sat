<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaQuestionChoices extends Model
{
    protected $fillable = [
        'choice_ar',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\VisaQuestion', 'question_id', 'id');
    }
}
