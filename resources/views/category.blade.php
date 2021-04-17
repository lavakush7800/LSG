@extends('layouts.app')
@section('title','category')
@section('content')

<div class="container">
  <center><h2>Add Category</h2></center>
  <form method="post" action="/category/update">

    <div class="form-group">
      <label for="name">Category Name:</label>
      <input type="hidden" class="form-control" id="id" placeholder="Category id" name="id" value="{{ $editdata->id??'' }}">
      <input type="text" class="form-control" id="name" placeholder="Category Name" name="name" value="{{ $editdata->name??'' }}">
      @error('name')
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

 
<div class="container">
 <center> <h2>Category Table</h2></center>   
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>category NAME</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $category)
    
      <tr>
        <td>{{ $category['id'] }}</td>
        <td>{{ $category['name'] }}</td>       
        <td>
        <a  href="category?edit={{ $category['id'] }}">
        <button class="btn btn-secondary">Edit</button>
        </a>
        </td>
        <td>
        <form  action="category/delete/{{ $category['id'] }}">
        @csrf
        <button class="btn btn-danger">Delete</button>
        </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection
 