<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['title','image','price','author_id','publisher_id','category_id','user_id'];
    public $timestamps = false;

    public function bookDetail(){
        return $this->hasOne('App\Model\BookDetail');
    }

    public function author(){
        return $this->belongsTo('App\Model\Author');
    }

    public function publisher(){
        return $this->belongsTo('App\Model\Publisher');
    }

    public function  category(){
        return $this->belongsTo('App\Model\Category');
    }
    public function  user(){
        return $this->belongsTo('App\Model\user');
    }
    public function  cart(){
        return $this->belongsTo('App\Model\cart');
    }

    
    // public function discount($discout = '30%'){

    // }
    // Book::discount('10%');//customer
    // Book::discount('20%');//restedar
    // Book::discount('40%');//Wholeseller
    // }
}