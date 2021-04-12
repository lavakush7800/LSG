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
    public function edit($id){
        try{
            $data = Book::getById($id);
            // dd($data);
            if($data){
                return view('bookEdit',['bookData'=>$data]);
            }
            else{
                return redirect('bookShow')->withErrors('Data Not Found'); 
            }
        }catch(\Exception $e){

        }
    }
    public function update(Request $request){
        try{
            $data = $request->all();
            // dd($data);
            $result= Book::update($data);

            if(!empty($result)){
                return redirect('bookShow');
            }else{
                return redirect('bookShow')->withError('Unable to save');
            }
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
