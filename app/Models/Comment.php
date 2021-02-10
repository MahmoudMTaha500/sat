<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $tabel ='comments';
    protected $fillable = [
        'comment',
        'commenter_id',
        'element_type',
        'element_id',
        'approvement',
    ];

    public function institute(){
        return $this->hasOne("App\Models\Institute",'id','element_id');
    }
   
    public function student(){
        return $this->hasOne("App\Models\Student",'id','commenter_id');
    }
}
