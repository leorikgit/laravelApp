<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class Post extends Model
{
    use Sluggable;
    public function sluggable() {
        return ['slug'=>[
            'source'=>'title',
            'onUpdate'=>true
        ]];
    }
    protected $fillable = ['title', 'body', 'category_id', 'image_id'];

    public function image(){
        return $this->belongsTo('App\Image');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
