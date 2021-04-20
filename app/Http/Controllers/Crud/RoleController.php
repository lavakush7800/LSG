<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;

class RoleController extends Controller
{
    public function addRole(){
        $roles = [
            ["name"=>"HR"],
            ["name"=>"Developer"],
            ["name"=>"Tester"],
        ];
        Role::insert($roles);
        return "Role has been created";
    }

    public function getById(int $id){
        $role = Role::find($id);
        dd($role->user);
        foreach($role->users as $user){
            echo $user;
        }
    }
}
