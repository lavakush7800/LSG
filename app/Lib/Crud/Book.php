<?php 
namespace App\Lib\Crud;

use App\Lib\Crud\BookDetail;
use App\Http\Controllers\Crud\BookController;
use App\Model\Book as Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Book{
    public static function storeBook(array $data):string{
        try{
            $data['user_id'] = Auth::id();
            // dd($data);
            $result = Model::create($data);
            if($result){
                 return $result->id;
            }else{
                return '';
            }
        }catch(\Exception $e){
            throw new \Exception('Unable to save Data!');
        }
    }
    public static function getAllBook($relations = ['bookDetail','author','publisher','category']):object{
        try{
            $data = Model::with($relations)->get();
            return $data;
        }catch(Exception $e){
            throw new \Exception('Data Not Fond!');
        }
    }
    public static function getById(int $id){
        try{
            $data = Model::find($id);
            return $data;
        }catch(\Exception $e){
            throw new \Exception('Somthing went wrong');
        }
    }
    public static function update(array $data):bool{
        try{
            $bookData = [
                'title'=>$data['title'],
                'image'=>$data['image'],
                'price'=>$data['price'],
            ];
            $id= $data['id'];
            $result= Model::where('id', $id)->update($bookData);
            if($result){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw new \Exception('Data Not Update!');
        }
    }   
    public static function delete(int $id):bool{
       try{
        $data=Model::find($id)->delete();
        if($data){
            return true;
        }else{
            return false;
        }
       }catch(\Exception $e){
        throw new \Exception('Data Not Delete!');
       }
    }
}