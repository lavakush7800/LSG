<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['id','name','title','image','price'];

    public $timestamps= false;

    public function trophies(){
        return $this->belongsToMany(
            Trophy::class,
            'trophies_users',
            'trophy_id',
            'user_id');
    }
    
        public function books(){
        return $this->hasMany('App\Model\Book');
    }
}
