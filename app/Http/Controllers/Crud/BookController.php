<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lib\Crud\Book;
use App\Http\Requests\StoreBook;

class BookController extends Controller
{
    public function index(){
        return view('book');
    }
    public function store(StoreBook $request){
        try{
            $data = $request->all();
            $fname = $request->image->store('/public');
            // dd($fname);
            $data['image'] =$fname;
            $result = Book::get($data);
            return redirect('bookShow');
        }catch(\Exception $e){

        }
    }
    public function show(){
        try{
            $results = Book::show();
            return view('bookShow', compact('results'));
        }catch(\Exception $e){

        }
    }
    public function delete($id){
        try{
            $data = Book::delete($id);
            $results = Book::show();
           return view('bookShow',compact('results'));
        }catch(\Exception $e){

        }
    }
}
