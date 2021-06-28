<?php 
namespace App\Lib\Crud;

use App\Lib\Crud\Contact;
use App\Model\Contact as Model;
use Illuminate\Support\Facades\Auth;

class Contact{
    public static function store(array $data):string{
        try{
            $data = Model::create();
            return $data;
        }catch(\Exception $e){
            throw new \Exception('Sumthing went Wrong');
        }
    } 

    public static function getAll():array{
        try{
            $result = Model::all();
            if($result->isNotEmpty()){
                return $result->toArray();
            }
            return [];
        }catch(Exception $e){
            throw new Exception('Sumthing went Wrong');
        }
    }
    public static function getById(int $id):object{
        try{
            $data = Model::find($id);
            if($data){
                return $data;
            }else{
                return '';
            }
        }catch(\Exception $e){
            throw new \Exception('Sumthing went Wrong');
        }
    }
    public static function update(array $data):bool{
        try{
            $categorydata = [
                'name'=>$data['name'],
                'user_id'=>Auth::id()
            ];
            $id= $data['id'];
            $result= Model::updateOrCreate(['id'=>$id],$categorydata);
            if($result){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw new \Exception('Sumthing went Wrong');
        }
    }
    public static function delete(int $id):bool{
        try{
            $data = Model::find($id)->delete();
            if($data){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw new \Exception('Sumthing went Wrong');
        }
    }
}