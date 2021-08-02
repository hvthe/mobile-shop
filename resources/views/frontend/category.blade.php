@extends('frontend.index')
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
<div class="products">
    <h3>iPhone (hiện có 186 sản phẩm)</h3>
    <div class="product-list row">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-1.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-2.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-3.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-4.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-5.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-6.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-7.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-8.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="#"><img src="images/product-9.png"></a>
                <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                <p>Giá Bán: <span>32.990.000đ</span></p>
            </div>
        </div>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>
@endsection