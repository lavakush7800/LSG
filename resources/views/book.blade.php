@extends('layouts.app')
@section('title','Home')
@section('content')

<div class="container">
  <center><h2>Book</h2></center>
  <form method="post" action="/booksave" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Book:</label>
      <input type="text" class="form-control" id="title" placeholder="Title" name="title">
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
     
    <div class="form-group">
      <label for="image">Book Image:</label>
      <input type="file" class="form-control" id="image" placeholder="upload image" name="image">
      @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" class="form-control" id="price" placeholder="" name="price">
      @error('price')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    <div class="form-group">
      <label for="year">Year:</label>
      <input type="text" class="form-control" id="year" placeholder="" name="year">
      @error('year')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    <div class="form-group">
      <label for="page">Pages:</label>
      <input type="text" class="form-control" id="page" placeholder="" name="page">
      @error('page')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    <div class="form-group">
      <label for="qty">Quantity:</label>
      <input type="Number" class="form-control" id="qty" placeholder="" name="qty">
      @error('qty')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    <div class="form-group">
      <label for="description">Descriptions:</label>
      <input type="text" class="form-control" id="description" placeholder="" name="description">
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    <div class="form-group">
      <label for="author_id">Author Name:</label>
      <select class="form-control" name="author_id">
        <option value="">Select Author</option>
       @foreach($authors as $author)
         <option value="{{ $author['id'] }}">{{ $author['name'] }}</option>
       @endforeach
      </select>
      @error('author_id')
        <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    <div class="form-group">
      <label for="publisher_id">Publisher Name:</label>
      <select class="form-control" name="publisher_id">
        <option value="">Select Publisher</option>
       @foreach($publisher as $publisher)
       <option value="{{ $publisher['id'] }}">{{ $publisher['name'] }}</option>
       @endforeach
      </select>
      @error('publisher_id')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    <div class="form-group">
      <label for="category_id">Category Name:</label>
      <select class="form-control" name="category_id">
        <option value="">Select Category</option>
       @foreach($category as $category)
       <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
       @endforeach
      </select>
      @error('category_id')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>

    @csrf
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
 
