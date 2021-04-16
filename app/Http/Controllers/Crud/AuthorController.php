<?php
namespace App\Http\Controllers\Crud;

use App\Lib\Crud\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookAuthor;

class AuthorController extends Controller
{
    public function index(Request $request){
        try{
            $editdata = [];
        if(isset($request->edit)){
            $id = $request['edit'];
            $editdata = Author::getById($id);
        }
        $data = Author::getAll();
        return view('author',['data'=>$data,'editdata'=>$editdata]);
        }catch(\Exception $e){
            return redirect('author')->withErrors('Unable to save');
        }
    }

    public function store(Request $request){
        try{
            $data = $request->all();
            dd($data);
            $result = Author::store($data);
        }catch(\Exception $e){
            return redirect('author')->withErrors('Unable to save');
        }
    }
    public function get(){
        try{
            $data = Author::getAll();
            return view('authorshow',['authordata'=>$data]);
        }catch(\Exception $e){
            return redirect('author')->withErrors('Data Not Found'); 
        }
    }
    public function edit(int $id){
        try{
            $editdata = Author::getById($id);
            $data = Author::getAll();
            return view('author',['data'=>$data,'editdata'=>$editdata]);
        }catch(\Exception $e){
            return redirect('author')->withErrors('Data Not Found'); 
        }
    }
    public function update(Request $request){
        try{ 
            $data = $request->all();
            $result= Author::update($data);
            if(!empty($result)){
                return redirect('author');
            }else{
                return redirect('author')->withError('Unable to save');
            }
        }catch(\Exception $e){
			return redirect('author')->withErrors('Data Not Update');
        }
    }
    public function delete(int $id){
        try{
            $data = Author::delete($id);
            if($data){
                return redirect('author');
            }else{
                return redirect('author')->withError('Unable to delete');
            }
        }catch(\Exception $e){
            return redirect('author')->withErrors('Data Not Found');
        }
    }
}
