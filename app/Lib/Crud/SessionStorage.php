<?php
namespace App\Lib\Crud;

use App\Http\Controllers\Crud\CartController;
use Illuminate\Support\Facades\Log;
use App\Lib\Crud\Cart;
use App\Models\Book;

class SessionStorage{
    public static function addSession($data){
        try{
            $cart =[];
            if(session()->has('cart')){
                $cart = session()->get('cart');
            }
            if(isset($cart[$data['book_id']])){
                $cart[$data['book_id']]['qty'] += $data['qty'];
            }else{
                $cart[$data['book_id']] = ['book_id'=>$data['book_id'],'qty'=>$data['qty']];
            }
            session()->put('cart',$cart);   
            return true;
        }catch(\Exception $e){
            throw new \Exception('Unable to save cart!');
        }
    }
    public static function getAll(){
        try{
            $data =session()->get('cart');
                if(isset($data)){
                    $id = array_column($data,'book_id');
                    
                    $bookdata = Book::whereIn('id',$id)->get();
                    if($bookdata){
                        return ['bookdata'=>$bookdata,'cartdata'=>$data];
                    }
                }
        }catch(\Exception $e){
            throw new \Exception('Unable to save cart!');
        }
    }
    public static function updateQty(array $pid, array $quantity){
        try{
            $cart = session()->get('cart');
            foreach($pid as $index=>$value){
            $cart[$value]['qty'] = $quantity[$index];
            }
        session()->put('cart',$cart);
        return true;
        }catch(\Exception $e){
            throw new \Exception('Unable to update cart!');
        }
    }
    public static function removeCart($id){
        try{
            $cart = session()->get('cart');
                if(isset($cart[$id])){
                unset($cart[$id]);
                }
                session()->put('cart',$cart);
                if($cart){
                    return true;
                }else{
                    return false;
                }
        }catch(\Exception $e){
            throw new \Exception('Unable to delete cart!');
        }
    }
}