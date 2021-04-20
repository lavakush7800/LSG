<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\TrophiesUser;

class UserController extends Controller
{
    public function index(){
        return view('user');
    }
}
