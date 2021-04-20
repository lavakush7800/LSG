<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    protected $fillable=['id','name'];
    public $timestamps = false;
    
    public function users(){
        return $this->belongsToMany(
            User::class,
            'trophies_users',
            'trophy_id',
            'user_id');
    }
    
}
