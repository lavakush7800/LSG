@extends('layouts.master')
@section('title','Home')
@section('content')
<div class="container-fluid">
   <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-6"> 
    @for ($i = 0; $i < 1; $i++)   
     <center> <img class="img-responsive" src='<?php echo "/storage/".str_replace('public/','',$data->image); ?>' alt=""; width="300px"; height="450px"; style="margin-top:10px;"></center>      
   @endfor
   </div>


   <div class="col-sm-12 col-md-6 col-lg-6">
  <p style="font-size: 40px;">{{ $data->title}}</p> 
  <h6>Rs: {{ $data->price}}.00</h6> 
  <h6>Year: {{ $data->bookDetail['year']}}</h6>
  <h6>By: {{ $data->author['name'] }} </h6>
  <h6>Pages: {{ $data->bookDetail['pages'] }}</h6>
  <h6>Publishers: {{ $data->publisher['name'] }} </h6>
  <h6>Description: {{ $data->bookDetail['description']}}</a></h6>
  
     <form method="post" action="/cart/book">
        <input type="hidden"  name="book_id" value="{{ $data->bookDetail['id'] }}">
        <h6>Quantity</h6>
        <input type="number" name="qty" value="1">
        @csrf
        <button  class="btn btn-primary  btn-block" style="width:350px; margin-top:10px"> Add Cart</button>
     </form>
 
 <a href="book/{{ $data->id }}" target="_blank" class="btn btn-dark  btn-raised btn-block" style="width:350px; margin-top:10px">Book Now</a> 
   </div> 
</div>
</div>
@endsection


