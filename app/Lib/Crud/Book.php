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
}