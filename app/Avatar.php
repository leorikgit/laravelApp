<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    private $path = '/upload/avatars/';
    protected $fillable = ['name', 'orginal_name', 'type', 'size', 'unique_id'];

    public function getNameAttribute($value){
        return $this->path . $value;
    }
}
