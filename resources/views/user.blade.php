@extends('layouts.master')
@section('title','Home')
@section('content')
<div class="container-fluid">
  <div class="row">
   @foreach($values as $data)
   <?php
    // dd($data);
    ?>
   <div class="col-md-3 portfolio-item">
     <div class="card" style="margin-top:25px; ">
         <center><a href="book/{{ $data->id }}">
         <img class="img-responsive" src='<?php echo "/storage/".str_replace('public/','',$data->image); ?>' alt=""; width="345px"; height="450px">
         </a></center>
         <center> <h5>{{ $data->title}}</h5></center>
         <center><h6>Price:{{ $data->price}}</h6></center>
         <center><h6>Year:{{ $data->bookDetail['year']}}</a></h6></center>
         <center><a  href="/book/{{ $data->id }}"class="btn btn-dark btn-sm btn-block" style="width:280px;margin-bottom: 20px;">Book Now</a></center>
       </div>
   </div>
   @endforeach
  </div>
</div>
@endsection