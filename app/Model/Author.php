<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected  $fillable=['id','name','user_id'];
    public $timestamps = false;

    public function  books(){
        return $this->hasMany('App\Model\Book');
    }
}
