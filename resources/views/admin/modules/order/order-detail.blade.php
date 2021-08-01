@extends('admin.index')
@section('menu')
<ul class="nav menu">
    <li><a href="{{ route ('index') }}"><svg class="glyph stroked dashboard-dial">
                <use xlink:href="#stroked-dashboard-dial"></use>
            </svg> Dashboard</a></li>
    <li><a href="{{ route('user') }}"><svg class="glyph stroked male user ">
                <use xlink:href="#stroked-male-user" />
            </svg>Quản lý thành viên</a></li>
    <li><a href="{{ route('category') }}"><svg class="glyph stroked open folder">
                <use xlink:href="#stroked-open-folder" />
            </svg>Quản lý danh mục</a></li>
    <li><a href="{{ route('product') }}"><svg class="glyph stroked bag">
                <use xlink:href="#stroked-bag"></use>
            </svg>Quản lý sản phẩm</a></li>
    <li><a href="{{ route('customer') }}"><svg class="glyph stroked chain">
                <use xlink:href="#stroked-chain" />
            </svg> Quản lý khách hàng</a></li>
    <li class="active"><a href="{{ route('order') }}"><svg class="glyph stroked clipboard with paper">
                <use xlink:href="#stroked-clipboard-with-paper"></use>
            </svg> Đơn hàng </a></li>
    <li><a href="#"><svg class="glyph stroked gear">
                <use xlink:href="#stroked-gear" />
            </svg> Cấu hình</a></li>
</ul>
@endsection

@section('title', 'Mobile Shop - Administrator')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('index')}}"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Chi tiết đơn hàng </li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mã đơn hàng #{{ $order->ord_id}}</h1>
        </div>
    </div>
    <!--/.row-->
    @if(session()->exists('success'))
    @foreach(session()->get('success') as $message)
    <p class="alert alert-success" role="alert">{{ $message }}</p>
    @endforeach
    @endif
    <div class="info__customer">
        <form>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Tên:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" value = "{{$order->customer->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-1 col-form-label">Số điện thoại:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" value = "{{$order->customer->phone}}">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-1 col-form-label">Địa Chỉ:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" value = "{{$order->customer->address}}">
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-5">Thời gian đặt hàng: {{$order->created_at}}</p>
                @if($order->status == 1)
                <p class="col-sm-5">Tình trạng đơn hàng: <span class="label label-success">Đã xử lý</span></p>
                @else
                <p class="col-sm-5">Tình trạng đơn hàng: <span class="label label-danger">Chưa xử lý</span></p>
                @endif
            </div>
            <div class="list-item">
                <table data-toolbar="#toolbar" data-toggle="table">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">STT</th>
                            <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th data-field="price" data-sortable="true">Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td class="align-middle">{{++$key}}</td>
                            <td class="align-middle">{{$product->prd_name}}</td>
                            <td class="align-middle"> <img height="50px" src="{{ asset('admin/images/'.$product->prd_image) }}" alt=""> </td>
                            <td class="align-middle"> {{ number_format($product->prd_price) }} vnd</td>
                            <td class="align-middle"> {{$product->pivot->quantity}} </td>
                            <td class="align-middle"> {{number_format($product->prd_price*$product->pivot->quantity)}} vnd </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="align-middle">Tổng</td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle text-danger"> {{ number_format($order->value) }} vnd </td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
            <div style = "margin: 15px 0 15px;">
                <button class="btn btn-success">Giao hàng</button>
                <button class="btn btn-danger">Xóa</button>
            </div>
        </form>
    </div>

</div>
@endsection