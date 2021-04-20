<?php 
namespace App\Lib\Crud;

use App\Lib\Crud\Publisher;
use App\Model\Publisher as Model;
use Illuminate\Support\Facades\Auth;

class Publisher{
    public static function store(array $data):string{
        try{
            if(isset($data['id']) and !empty($data['id'])){
                $model = Model::find($data['id']);
            }
            if(!$model){
                $model = new Model();
            }
            $model->name = $data['name'];
            $model->save();
            if($result){
                return $result;
            }else{
                return '';
            }
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
            $publisherdata = [
                'name'=>$data['name'],
                'user_id'=>Auth::id()
            ];
            $id= $data['id'];
            $result= Model::updateOrCreate(['id'=>$id],$publisherdata);
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