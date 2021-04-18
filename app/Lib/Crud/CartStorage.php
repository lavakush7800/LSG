<?php 
namespace App\Lib\Crud;

use App\Http\Controllers\Crud\CartController;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Auth;
use App\Models\Book;

class CartStorage{
    public static function add(array $data):bool{
        try{
           $userid= Auth::id();
           unset($data['_token']);
          
           if(isset($data) and !empty($data)){
               $model = Cart::where('book_id',$data['book_id'])->first();  
           }
           if(!$model){
               $model = new Cart();
           }
           $model->book_id = $data['book_id'];
           $model->user_id = $userid;
           $model->qty = isset($model->qty) ?  $model->qty+$data['qty'] : $data['qty']; 
           $model->save();
           return true;
        }catch(\Exception $e){
            throw new \Exception('Unable to save cart!');
        }
    }
    public static function getAll():array{
        try{
             $userid = Auth::id();
             $data = Cart::where('user_id',$userid)->get();
            if($data->isNotEmpty()){
                $data = $data->toArray();  
                 $ids = array_column($data, 'book_id');
                 $bookdata = Book::whereIn('id', $ids)->get(); 
                 $cartData =self::parseCart($data);
                if($bookdata){
                    return ['bookdata'=>$bookdata,'cartdata'=>$cartData];   
                }
            }
            return [];
        }catch(\Exception $e){
            throw new \Exception('Unable to save cart!');
        }
    }
    public static function parseCart(array $data):array{
        try{
            $newdata = [];
            foreach($data as $val){
            $newdata[$val['book_id']] = ['book_id'=>$val['book_id'],'qty'=>$val['qty']];
            }
            if($newdata){
                return $newdata;
            }else{
                return [];
            }
        }catch(\Exception $e){
            throw new \Exception('Unable to save cart!');
        }
    }
    public static function update(array $pid, array $quantity):bool{
        try{
             $userid = Auth::id();
            foreach($pid as $index=>$id){
               
                $qty = $quantity[$index];
                 $result = Cart::where('user_id',$userid)->where('book_id',$id)->update(['qty'=>$qty]);
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
        }catch(\Exception $e){
            throw new \Exception('Unable to update!');
        }
    }
    public static function removeCart(int $id):bool{
        try{
            $data =  Cart::where('book_id',$id)->delete();
            if($data){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw new \Exception('Unable to remove your cart!');
        }
    }
}