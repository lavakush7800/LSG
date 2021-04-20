<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    protected $fillable=['book_id','year','pages','qty','description'];
    public $timestamps = false;

    public function book(){
        return $this->belongsTo('App\Model\Book');
    }
    public function cart(){
        return $this->belongsTo('App\Model\Cart');
    }
}
