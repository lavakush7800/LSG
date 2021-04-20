@extends('layouts.app')
@section('title','Author')
@section('content')

<div class="container">
  <center><h2>Add Author</h2></center>
  <form method="post" action="/author/update">

    <div class="form-group">
      <label for="name">Author Name:</label>
      <input type="hidden" class="form-control" id="id" placeholder="Author id" name="id" value="{{ $editdata->id??'' }}">
      <input type="text" class="form-control" id="name" placeholder="Author Name" name="name" value="{{ $editdata->name??'' }}">
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

 

  <div class="card">
  <div class="card-header"> <center> <h2>Author Table</h2></center></div>
  <div class="card-body">
  <div class="container"> 
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>AUTHOR NAME</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $author)
    
      <tr>
        <td>{{ $author['id'] }}</td>
        <td>{{ $author['name'] }}</td>       
        <td>
        <a  href="author?edit={{ $author['id'] }}">
        <button class="btn btn-secondary">Edit</button>
        </a>
        </td>
        <td>
        <form  action="author/delete/{{ $author['id'] }}">
        @csrf
        <button class="btn btn-danger">Delete</button>
        </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
  </div>
@endsection
 