@extends('layouts.master')
@section('title','Home')
@section('content')
<?php  ?>
<form method="post" action="/cart/update">
@csrf
<div class="container">
 <h3 style="martin-top:30px; margin-bottom:20px;">Your Cart</h3> 
 
  <table class="table">
  <thead>
        <tr>
          <th></th>
          <th></th>
          <th>PRICE</th>
          <th>QUANTITY</th>
          <th>TOTAL</th>
        </tr>
      </thead>
  <tbody>
  @php
  $total = 0;
  @endphp
  @if(isset($bookdata))
  @foreach($bookdata as $book)
  
  @php 
  
  $subtotal = $cartdata[$book['id']]['qty'] * $book['price'];
  $total += $subtotal;
  
  @endphp
    <tr>
          <td><img src="<?php echo "/storage/".str_replace('public/','',$book['image']); ?>" width="100"/></td>
          <td><?php  echo $book['title']; ?> <br> <a href="remove/book/{{$book->id}}"style="width:350px; margin-top:10px">Remove</a></td>
          <td><?php  echo $book['price']; ?>.00</td>
          <td>
          <div class="form-group row">
            <div class="col-sm-4">
              <input type="hidden" name="pid[]" class="form-control" value="<?php  echo $book['id'] ?>">   
              <input type="number"name="quantity[]" class="form-control" value="<?php  echo $cartdata[$book['id']]['qty'] ?>">
            </div>
          </div>
          </td>
          <td><?php  echo $subtotal; ?>.00</td>
    </tr>
          
  @endforeach
  <tfoot>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Subtotal Rs.<?php echo $total;  ?>.00</td>
  </tr>
  </tfoot>
  </tbody>
  </table>
  <div class="row">
  <div class="col-4"></div>
  <div class="col-4"></div>
  <div class="col-4">
 <button class="btn btn-outline-secondary" type="submit">Update Cart</button>
  <a href="#" class="btn btn-primary  active" role="button" aria-pressed="true">Check Out</a></div>
</div>
</form>
  @else
  You cart is empty
  @endif
  

</div>
@endsection