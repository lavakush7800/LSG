<?php 
namespace App\Lib\Crud;

use App\Lib\Crud\Book;
use App\Model\BookDetail as Model;
use Illuminate\Support\Facades\Log;

class BookDetail{
    public static function store(int $id, array $data):bool{
        try{
            $detailBook = [
                'book_id'=>$id,
                'year'=>$data['year'],
                'pages'=>$data['page'],
                'qty'=>$data['qty'],
                'description'=>$data['description'],
            ];
            $result = Model::create($detailBook);
            if($result){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            throw new Exception('Sumthing went Wrong');
        }
    }

    public static function update(array $data):bool{
        try{
            $detailbook = [
                'book_id'=>$data['id'], 
                'year'=>$data['year'],
                'pages'=>$data['page'],
                'qty'=>$data['qty'],
                'description'=>$data['description'],
            ];
            $id = $data['book_id'];
            $result = Model::updateOrCreate(['id'=>$id],$detailbook);
            if($result){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            throw new Exception('Sumthing went Wrong');
        }
    }
}