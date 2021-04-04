<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lib\Crud\Book;

class BookController extends Controller
{
    public function index(){
        return view('book');
    }
    public function store(Request $request){
        try{
            $data = $request->all();
            $fname = $request->image->store('/public');
            // dd($fname);
            $data['image'] =$fname;
            $result = Book::get($data);
            return redirect('book');
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
}
