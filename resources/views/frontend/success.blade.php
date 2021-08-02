@extends('frontend.app')
@section('title', 'Category')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css')}}">
@endsection
@section('content')
<!--	Slider	-->
<div id="slide" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#slide" data-slide-to="0" class="active"></li>
        <li data-target="#slide" data-slide-to="1"></li>
        <li data-target="#slide" data-slide-to="2"></li>
        <li data-target="#slide" data-slide-to="3"></li>
        <li data-target="#slide" data-slide-to="4"></li>
        <li data-target="#slide" data-slide-to="5"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('frontend/images/slide-1.png')}}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/images/slide-2.png')}}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/images/slide-3.png')}}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/images/slide-4.png')}}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/images/slide-5.png')}}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/images/slide-6.png')}}">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#slide" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slide" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>
<!--	End Slider	-->

<!--	List Product	-->
<div id="order-success">
    <div class="row">
        <div id="order-success-img" class="col-lg-3 col-md-3 col-sm-12"></div>
        <div id="order-success-txt" class="col-lg-9 col-md-9 col-sm-12">
            <h3>bạn đã đặt hàng thành công !</h3>
            <p>Vui lòng kiểm tra email để xem lại thông tin đơn hàng của mình.</p>
        </div>
    </div>
</div>
@endsection