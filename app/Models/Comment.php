<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $tabel = 'comments';
    protected $guarded = [];  


    public function institute()
    {
        return $this->belongsTo("App\Models\Institute", 'element_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo("App\Models\Student", 'commenter_id', 'id');
    }
    public function blog()
    {
        return $this->belongsTo("App\Models\Blog", 'element_id', 'id');
    }
}
