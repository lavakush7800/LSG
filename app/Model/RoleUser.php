<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $fillable = ['id','user_id','role_id'];
    
    public $timestamps = false;
    
    public function user(){
        return $this->belongsToMany('App\Model\User');
    }

    public function role(){
        return $this->belongsToMany('App\Model\Role');
    }
}
