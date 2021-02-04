<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'commenter_id',
        'element_type',
        'element_id',
        'approvement',
    ];
}
