<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Trophy;

class TrophyController extends Controller
{
    public function store(){
        try{
            $trophies = [
                ['name'=>'Darshan'],
                ['name'=>'Ram'],
                ['name'=>'Syaam'],
                ['name'=>'Vinay'],
            ];
            $result = Trophy::insert($trophies);
            if($result){
                return "Trophy table is created";
            }else{
                return "Trophy Table not Created";
            }
        }catch(Exception $e){
            \Log::error($e->getMessage());
			return redirect('trophy')->withErrors('Unable to save');
        }
    }

    public function getById($id){
        try{
            $trophy = Trophy::find($id);
            return $trophy->users;  
           foreach($trophy->users as $user){
               echo $user;
           }
        }catch(Exception $e){
            \Log::error($e->getMessage());
			return redirect('trophy')->withErrors('Id Not Found');
        }
    }
    public function delete($id){
        $ids  = Trophy::where('name','like', 'a%')->groupBy('name')
                    ->pluck('name')->toArray();
                    // dd($ids);
                     
    }
}
