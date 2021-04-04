@extends('layouts.app')
@section('content')
<div class="container">
<center> <h2>Book Table </h2></center>
    <table class="table">
        <thead>
           <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>PRICE</th>
                <th>UPDATE</th>
                <th>DELETE</th>
           </tr>
        </thead>
        <tbody>
            @foreach($results as $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td><img src='<?php echo "/storage/".str_replace('public/','',$value['image']); ?>' width="80" /></td>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['price'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection