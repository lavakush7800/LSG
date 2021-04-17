<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookCategory;

class CategoryController extends Controller
{
    public function index(Request $request){
        try{
            $editdata = [];
            if(isset($request->edit)){
                $id = $request['edit'];
                $editdata = Category::getById($id);
            }
            $data = Category::getAll();
        return view('category',['data'=>$data,'editdata'=>$editdata]);
        }catch(\Exception $e){
            return redirect('category')->withErrors('Unable to save');
        }
    }
    public function store(Request $request){
        try{
            $data = $request->all();
            $result = Category::store($data);
            return redirect('category');
        }catch(\Exception $e){
            return redirect('category')->withErrors('Unable to save');
        }
    }
    public function get(){
        try{
            $data = Category::getAll();
            return view('category',['category'=>$data]);
        }catch(\Exception $e){
            return redirect('category')->withErrors('Data Not Found'); 
        }
    }
    public function edit(int $id){
        try{
            $editdata = Category::getById($id);
            $data = Category::getAll();
        return view('category',['data'=>$data,'editdata'=>$editdata]);
        }catch(\Exception $e){
            return redirect('category')->withErrors('Data Not Found'); 
        }
    }
       public function update(Request $request){
        try{ 
            $data = $request->all();
            $result= Category::update($data);
            if(!empty($result)){
                return redirect('category');
            }else{
                return redirect('category')->withError('Unable to save');
            }
        }catch(\Exception $e){
			return redirect('category')->withErrors('Data Not Update');
        }
    }
    public function delete(int $id){
        try{
            $data = Category::delete($id);
            if($data){
                return redirect('category');
            }else{
                return redirect('category')->withError('Unable to delete');
            }
        }catch(\Exception $e){
            return redirect('category')->withErrors('Data Not Found');
        }
    }
}
