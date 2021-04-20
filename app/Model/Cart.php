<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['id','book_id','user_id','qty'];

    public function  books(){
        return $this->hasMany('App\Model\Book');
    }  

    public function  users(){
        return $this->hasMany('App\Model\User');
    }  

    public function bookDetails(){
        return $this->hasMany('App\Model\BookDetail');
    }

}
