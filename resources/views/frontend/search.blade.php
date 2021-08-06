@extends('frontend.app')
@section('title', 'Search')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/search.css')}}">
@endsection
@section('content')
<!--	List Product	-->
<div class="products">
    <div id="search-result">{{$products->total()}} Kết quả tìm kiếm với từ khóa <span>{{ $keyWord }}</span></div>
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
    {{$products->links()}}
    <!-- <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul> -->
</div>

@endsection