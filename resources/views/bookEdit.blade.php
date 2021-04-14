@extends('layouts.app')
@section('title','Home')
@section('content')
<?php
//  dd($user_data);
?>
<div class="container">
 
    <center><h3>Author Edit Page</h3></center>
  <form method="post" action="/book/update" enctype="multipart/form-data">
   <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" value="{{ $bookData['image'] }}" name="image">
      @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="{{ $bookData['name'] }}" name="name">
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" class="form-control" id="price" value="{{ $bookData['price'] }}" name="price">
      @error('email')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <input type="hidden"   value="{{ $bookData['id'] }}" name="id"> 
    @csrf
    <input type="submit" value="submit" name="submit" class="btn btn-secondary btn-sm btn-block"/>
  </form>
  
</div>
@endsection