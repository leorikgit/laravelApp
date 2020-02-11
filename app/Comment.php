<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'post_id', 'user_id', 'status'];

    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function replays(){
        return $this->hasMany('App\Comment_replay');
    }
    public function user(){
        return $this->belongsTo('App\USer');
    }

}
