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
<div class="products">
    <h3>{{ $category }} (hiện có {{$products->count()}} sản phẩm)</h3>
    <div class="product-list row">
    @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="{{route('front.product', ['id'=>$product->prd_id])}}"><img src="{{ asset('admin/images/'.$product->prd_image)}}"></a>
                <h4><a href="{{route('front.product', ['id'=>$product->prd_id])}}">{{$product->prd_name}}</a></h4>
                <p>Giá Bán: <span>{{ number_format($product->prd_price)}}đ</span></p>
                <div>
                    <a class="btn btn-success btn-sm" href="{{route('cart', ['id' => $product->prd_id])}}">Mua ngay</a>
                    <a class="btn btn-warning btn-sm" href="{{route('cart')}}">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    {{ $products->links()}}
    <!-- <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul> -->
</div>
@endsection