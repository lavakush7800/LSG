<?php 
namespace App\Lib\Crud;

use App\Http\Controllers\Crud\CartController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Model\Book;
use App\Model\Cart as Model;
use App\Lib\Crud\CartStorage;
use App\Lib\Crud\SessionStorage;

class Cart{
    public static function add(array $data):bool{
        try{
            if(Auth::check()){
                $data = CartStorage::add($data);
                return $data;
            }
            else{
                $data = SessionStorage::addSession($data);
            }
            return true;
        }catch(\Exception $e){
            throw new \Exception('Unable to add to cart!');
        }
    }
    public static function getCart():array{
        try{
            if(Auth::check()){  
                self::moveCart();
                $data =  CartStorage::getAll();
                return $data;
            }else{
                $data = SessionStorage::getAll();
                return $data;
            }
            return [];
        }catch(\Exception $e){
            throw new \Exception('Unable to add to cart!');
        }
    }
    public static function updateItem(array $pid, array $quantity):bool{
        try{
            if(Auth::check()){

                $data = CartStorage::update($pid, $quantity);
                return $data;
            }else{
              $data = SessionStorage::updateQty($pid,$quantity);
              return $data;
            }
            return true;
        }catch(\Exception $e){
            throw new \Exception('Unable to edit!');
        }
    }
    public static function remove(int $id):bool{
        try{
            if(Auth::check()){
                $data = CartStorage::removeCart($id);
                return $data;
            }else{
                $data = SessionStorage::removeCart($id);
                return $data;
            }
            return true;
        }catch(\Exception $e){
            throw new \Exception('Unable to remove!');
        }
    }
    public static function moveCart():bool{
        try{
            if(Auth::check()){
                if(session()->has('cart')){
                    $data = session()->get('cart');
                  
                    $userid = Auth::id();
                    foreach($data as $cart){
                        $a = [
                            "user_id"=>$userid,
                            "book_id" => $cart['book_id'],
                            "qty" => $cart['qty'],
                        ];
                        Model::create($a);
                    }
                    session()->forget('cart');
                }
            }
            return false;
        }catch(\Exception $e){
            throw new \Exception('Unable to remove!');
        }
    }
}