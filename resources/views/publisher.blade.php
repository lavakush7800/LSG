@extends('layouts.app')
@section('title','Publisher')
@section('content')

<div class="container">
  <center><h2>Add Publiher</h2></center>
  <form method="post" action="/publisher/update">

    <div class="form-group">
      <label for="name">Publisher Name:</label>
      <input type="hidden" class="form-control" id="id" placeholder="Publisher id" name="id" value="{{ $editdata->id??'' }}">
      <input type="text" class="form-control" id="name" placeholder="Publisher Name" name="name" value="{{ $editdata->name??'' }}">
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
 <center> <h2>Publisher Table</h2></center>   
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>PUBLISHER NAME</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $publisher)
    
      <tr>
        <td>{{ $publisher['id'] }}</td>
        <td>{{ $publisher['name'] }}</td>       
        <td>
        <a  href="publisher?edit={{ $publisher['id'] }}">
        <button class="btn btn-secondary">Edit</button>
        </a>
        </td>
        <td>
        <form  action="publisher/delete/{{ $publisher['id'] }}">
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
 