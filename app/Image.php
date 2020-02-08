<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $dir = '/upload/images/';
    protected $fillable = ['path','name', 'orginal_name', 'type', 'size'];

    public function getPathAttribute($value){
        return $this->dir . $this->name;
    }
}
