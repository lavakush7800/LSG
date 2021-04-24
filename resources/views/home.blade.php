@extends('layouts.app')

@section('content')
<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{URL::asset('/image/l1.jpg')}}" alt="profile Pic" height="200" width="200">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100" src="{{URL::asset('/image/l1.jpg')}}" alt="profile Pic" height="200" width="200">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100" src="{{URL::asset('/image/l1.jpg')}}" alt="profile Pic" height="200" width="200">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="row">
    <div class="col-12 col-md-8"><h2>About Us</h2></div>
    <div class="col-6 col-md-4">
    <div class="container-fluid card">
      <div class="card-body"><h4>Contact Us</h4></div>
          <div class="container-fluid">
                <form class="col px-md-10" action="/action_page.php" style="margin-bottom: 25px;">
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
    </div>  
    </div>
 </div>
</div>
@endsection
