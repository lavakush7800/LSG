<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    protected $fillable=['book_id','year','pages','qty','description'];
    public $timestamps = false;

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
    public function cart(){
        return $this->belongsTo('App\Models\Cart');
    }
}
