@extends('layouts.app')
@section('title','Book Show')
@section('content')
<?php
  // dd($data);
?>
<div class="container">
<center><h4>Book Data</h4></center>
 <a href="/book"><button class="btn btn-primary btn-sm">Add Book</button></a>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>BOOK</th>
        <th>IMAGES</th>
        <th>PRICE</th>
        <th>YEAR</th>
        <th>PAGES</th>
        <th>QUANTITY</th>
        <th>DESCRIPTION</th>
        <th>AUTHOR</th>
        <th>PUBLISHER</th>
        <TH>CATEGORY</TH>
        <th>UPDATE</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
    @foreach($bookdata as $data)
      <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->title }}</td>
        <td><img src='<?php echo "/storage/".str_replace('public/','',$data->image); ?>' width="80" /></td>
        <td>{{ $data->price }}</td>
        <td>{{ $data->bookDetail['year'] }}</td>
        <td>{{ $data->bookDetail['pages'] }}</td>
        <td>{{ $data->bookDetail['qty'] }}</td>
        <td>{{ $data->bookDetail['description'] }}</td>
        <td>{{ $data->author->name }}</td>
        <td>{{ $data->publisher->name }}</td>
        <td>{{ $data->category->name }}</td>
        <td>
        <form  action="book/edit/{{ $data->id }}">
        
        <input type="hidden"  name="id" value="{{ $data->bookDetail['id'] }}">
        @csrf
        <button class="btn btn-primary">Edit</button>
        </form>
        </td>
   
        <td>
        <a href="book/delete/{{ $data->id }}">
        <button class="btn btn-danger">Delete</button>
        </a>
        </td>
      </tr>
    @endforeach
      <tr>
        <td colspan="7">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
