<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_replay extends Model
{
    protected $fillable = ['content', 'comment_id', 'user_id', 'status'];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
