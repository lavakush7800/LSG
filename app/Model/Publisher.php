<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected  $fillable=['name','user_id'];
    public $timestamps = false;

    public function books(){
        return $this->hasMany('App\Model\Book');
    }
}
