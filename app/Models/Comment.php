<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $tabel = 'comments';
    protected $fillable = [
        'comment',
        'commenter_id',
        'element_type',
        'element_id',
        'approvement',
    ];

    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'element_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo("App\Models\Student", 'commenter_id', 'id');
    }
}
