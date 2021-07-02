@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-8">
    <div class="card-body"><h4>Contact Us</h4></div>
          <div class="container-fluid">
                <form class="col px-md-10" method="post" action="/contact/save" style="margin-bottom: 25px;">
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea4">Descriptions</label>
                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                  </div>
                  @csrf
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
    </div>
    <div class="col-6 col-md-4">
      
    </div>  
 </div>
</div>
@endsection
