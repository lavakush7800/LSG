<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookPublisher;

class PublisherController extends Controller
{
    public function index(Request $request){
        try{
            $editdata = [];

            if(isset($request->edit)){
                $id = $request['edit'];
                $editdata = Publisher::getById($id);
            }
            $data = Publisher::getAll();
        return view('publisher',['data'=>$data,'editdata'=>$editdata]);

        }catch(\Exception $e){
            return redirect('publisher')->withErrors('Unable to save');
        }
    }
    public function store(Request $request){
        try{
            $data = $request->all();
            $result = Publisher::store($data);
            return redirect('publisher');
             
        }catch(\Exception $e){
            return redirect('publisher')->withErrors('Unable to save');
        }
    }
    public function get(){
        try{
            $data = Publisher::getAll();
            return view('publisher',['publisher'=>$data]);
        }catch(\Exception $e){
            return redirect('publisher')->withErrors('Data Not Found'); 
        }
    }
    public function edit(int $id){
        try{
            $editdata = Publisher::getById($id);
            $data = Publisher::getAll();
        return view('publisher',['data'=>$data,'editdata'=>$editdata]);
        }catch(\Exception $e){
            return redirect('publisher')->withErrors('Data Not Found'); 
        }
    }
       public function update(Request $request){
        try{ 
            $data = $request->all();
          
            $result= Publisher::update($data);
            
            if(!empty($result)){
                return redirect('publisher');
            }else{
                return redirect('publisher')->withError('Unable to save');
            }
        }catch(\Exception $e){
			return redirect('publisher')->withErrors('Data Not Update');
        }
    }
    public function delete(int $id){
        try{
            $data = Publisher::delete($id);
            if($data){
                return redirect('publisher');
            }else{
                return redirect('publisher')->withError('Unable to delete');
            }
        }catch(\Exception $e){
            return redirect('publisher')->withErrors('Data Not Found');
        }
    }
}
