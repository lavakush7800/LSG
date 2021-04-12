<?php
namespace App\Lib\Crud;
use App\Http\Controllers\Crud\BookController;
use App\Models\Book as Model;
use Illuminate\Support\Facades\Log;

class Book{
    public static function get(array $data):array{
        try{
            // dd($data);
            $result = Model::create($data);
            if($result){
                return $result->toArray();
            }else{
                return [];
            }
        }catch(\Exception $e){
            Log::error($e);
        }
    }
    public static function show():array{
        try{
            $data = Model::all();
            if($data){
                return $data->toArray();
            }else{
                return [];
            }
        }catch(\Exception $e){
            Log::error($e);
        }
    }
    public static function getById($id):object{
        try{
            $data = Model::find($id);  
            // dd($data);
            if($data){
                return $data;
            }else{
                return '';
            }
        }catch(\Exception $e){
            Log::error($e);
        }
    }
    public static function update(array $data):bool{
        try{
            // dd($data);
            $bookData = [
                'image' => $data['image'],
                'name' => $data['name'],
                'price' => $data['price']
            ];
            $id = $data['id'];
            $result = Model::where('id', $id)->update($bookData);
            if($result){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            Log::error($e);
        }
    }
    public static function delete(int $id):bool{
        try{
            $result = Model::find($id)->delete();
            if($result){
                return true;
            }else{
                return false;
            };
        }catch(\Exception $e){

        }
    }
}