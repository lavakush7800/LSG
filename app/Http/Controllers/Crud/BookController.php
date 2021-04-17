<?php
namespace App\Http\Controllers\Crud;

use App\Lib\Crud\Book;
use App\Lib\Crud\BookDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\storeBook;
use App\Lib\Crud\Author;
use App\Lib\Crud\Publisher;
use App\Lib\Crud\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(){
        $data['authors'] = Author::getAll();
        $data['publisher'] = Publisher::getAll();
        $data['category'] = Category::getAll();
        return view('book',$data);
    }

    public function storeBook(Request $request){
        try{
            $data = $request->all();
            $fname = $request->image->store('/public');
            // dd($fname);
            $data['image'] =$fname;
            
            $id = Book::storeBook($data);
            
            if(!empty($id)){
                $result = BookDetail::store($id,$data);
                return redirect('book_show');

            }else{
                return redirect('book')->withErrors('Unable to save data!');
            }
        }catch(\Exception $e){
			return redirect('book')->withErrors('Unable to save data!');
        }
    }
    public function getAllBook(){
        try{
            $data = Book::getAllBook();
            return view('book_show',['bookdata'=>$data]);
        }catch(\Exception $e){
			return redirect('book_show')->withErrors('Unable to save data!');
        }
    }

    public function edit(int $id){
        try{
            $data['data'] = Book::getById($id);
            $data['authors'] = Author::getAll();
            $data['publishers'] = Publisher::getAll();
            $data['categories'] = Category::getAll();
            if($data){
                return view('book_edit',$data);
            }
            else{
                return redirect('book_show')->withErrors('Data Not Found'); 
            }
        }catch(\Exception $e){
			return redirect('book_show')->withErrors('Data Not Found');
        }
    }
    public function update(Request $request){
        try{ 
            $data = $request->all();
            $fname = $request->image->store('/public');
            $data['image'] =$fname;
            $result= Book::update($data);
            if(!empty($result)){
                $detailbook = BookDetail::update($data);
                return redirect('book_show');
            }else{
                return redirect('book_show')->withError('Unable to update data!');
            }
        }catch(\Exception $e){
			return redirect('book_show')->withErrors('Unable to update data!');
        }
    }

    public function delete(int $id){
        try{
            $data=Book::delete($id);      
            if($data){
                return redirect('book_show');
            }
            else{
                return redirect('book_show')->withError('Unable to delete');
            }
        }catch(\Exception $e){
			return redirect('book_show')->withError('Unable to delete');
        }
    }
}
