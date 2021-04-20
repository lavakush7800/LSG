<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['id','name'];
    
    public $timestamps = false;

    public function user(){
        return $this->belongsToMany('App\Model\User');
    }
}
