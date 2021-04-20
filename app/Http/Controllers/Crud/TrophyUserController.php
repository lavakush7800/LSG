<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TrophiesUsers;
use App\Model\User;
use App\Model\Trophy;

class TrophyUserController extends Controller
{
    public function getAll(int $id):object{
        try{
            $result = TrophiesUsers::with('user','trophy')->get();
            dd($id);
            return $result;
            
        }catch(Exception $e){
            throw new \Exception('Somthing went wrong');
        }
    }
}
