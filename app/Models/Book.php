<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['title','image','price','author_id','publisher_id','category_id'];
    public $timestamps = false;

    public function bookDetail(){
        return $this->hasOne('App\Models\BookDetail');
    }

    public function author(){
        return $this->belongsTo('App\Models\Author');
    }

    public function publisher(){
        return $this->belongsTo('App\Models\Publisher');
    }

    public function  category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function  user(){
        return $this->belongsTo('App\Modesl\user');
    }
    public function  cart(){
        return $this->belongsTo('App\Models\cart');
    }
}
