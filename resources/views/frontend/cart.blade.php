@extends('frontend.app')
@section('title', 'Product')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/cart.css')}}">
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
@if(!empty(session()->get('cart')))
<!--	Cart	-->
<div id="my-cart">
    <div class="row">
        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
    </div>
    <form method="post" action="{{ route('cart.update')}}">
        @csrf
        @foreach($products as $product)
        <div class="cart-item row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <img src="{{asset('admin/images/'.$product->prd_image)}}">
                <h4>{{ $product->prd_name }}</h4>
            </div>

            <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                <input type="number" name="quantity[{{ $product->prd_id }}]" id="quantity" class="form-control form-blue quantity" value="{{ $cart[$product->prd_id] }}" min="1">
            </div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>{{ number_format($product->prd_price) }}đ</b><a href="{{route('cart.delete',['id' => $product->prd_id])}}">Xóa</a></div>
        </div>
        @endforeach
        <div class="row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
            </div>
            <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
            <div class="total-bill cart-price col-lg-3 col-md-3 col-sm-12"><b>{{ number_format($total) }}đ</b></div>
        </div>

    </form>

</div>
<!--	End Cart	-->

<!--	Customer Info	-->
<div id="customer">
    <form id="buy-now" method="post" action="{{route('cart.order')}}">
        @csrf
        <div class="row">

            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" value="{{old('name')}}" class="form-control">
                @if($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" value="{{old('phone')}}" class="form-control">
                @if($errors->has('phone'))
                <p class="text-danger">{{$errors->first('phone')}}</p>
                @endif
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Email (bắt buộc)" type="text" name="mail" value="{{old('mail')}}" class="form-control">
                @if($errors->has('mail'))
                <p class="text-danger">{{$errors->first('mail')}}</p>
                @endif
            </div>
            <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" value="{{old('add')}}" class="form-control">
                @if($errors->has('add'))
                <p class="text-danger">{{$errors->first('add')}}</p>
                @endif
            </div>

        </div>
    </form>
    <div class="row">
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#" id="submitForm">
                <b>Mua ngay</b>
                <span>Giao hàng tận nơi siêu tốc</span>
            </a>
            <script>
                document.querySelector('#submitForm').onclick = function() {
                    document.querySelector('#buy-now').submit();
                };
            </script>
        </div>
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#">
                <b>Trả góp Online</b>
                <span>Vui lòng call (+84) 0123456789</span>
            </a>
        </div>
    </div>
</div>
<!--	End Customer Info	-->
@else
<div class="row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <img src="{{asset('frontend/images/empty_cart.png')}}" class="img-fluid" alt="">
    </div>
</div>
@endif
@endsection