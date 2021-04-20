<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrophiesUsers extends Model
{
    protected $fillable = ['id','user_id','trophy_id'];
    public $timestamps = false;

    public function user(){
        return $this->belongsToMany('App\Model\User');
    }

    Public function trophy(){
        return $this->belongsToMany('App\Model\Trophy');
    }
}
