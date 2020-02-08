<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function avatar(){
        return $this->hasOne('App\Avatar');
    }
    public function setPasswordAttribute($value){
        if(!empty($value)){
            $this->attributes['password'] =  Hash::make($value);
        }
    }
    public function isAdmin(){

        if($this->role->name === 'admin' && $this->active == 1){
            return true;
        }
        return false;
    }
}
