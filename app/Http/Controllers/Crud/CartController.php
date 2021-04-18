<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Lib\Crud\Cart;

class CartController extends Controller
{
    public function add(Request $request){
        try{
            $data = $request->all();
            $result = Cart::add($data);
           if(!empty($result)){
                return redirect('cart');
            }else{
                return redirect('book/'.$data['id'])->withErrors('Unable to add to Add to cart!');
            }
        }catch(\Exception $e){
            return redirect('cart')->withErrors('Unable to add to Add to cart!');
        }
    }
    public function addBycart(){
        try{
            $data = Cart::getCart();
            return view('cart',$data);
        }catch(\Exception $e){
            throw new \Exception('Unable to add to cart!');
        }
    }
    public function update(Request $request){
        try{
            $pid = $request->pid;
            $quantity = $request->quantity;
            $data = Cart:: updateItem($pid, $quantity);
            return redirect('cart');
        }catch(\Exception $e){
            throw new \Exception('Unable to Update cart!');
        }
    }
    public function removeCart($id){
        try{
            $data = Cart::remove($id);
            return redirect('cart');
        }catch(\Exception $e){
            throw new \Exception('Unable to add to cart!');
        }
    }
}
