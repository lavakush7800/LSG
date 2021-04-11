@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<div class="container-fluid">
<div class="row">
    <div class="col"></div>
    <div class="col-6">
    <div class="card">
  <div class="card-header">
  <center><h4>Add Book</h4></center>
  </div>
    <div class="card-body">
        <form method="post" action="/book_save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image"><b>Image:</b></label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name"><b>Title:</b></label>
                <input type="name" class="form-control" id="name" name="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price"><b>Price:</b></label>
                <input type="text" class="form-control" id="price" name="price">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @csrf
            <button type="submit" class="btn btn-default">Submit</button>
       </form>
    </div>
</div>
    </div>
    <div class="col"></div>
  </div>
</div>
@endsection
