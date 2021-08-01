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
    <li class="active"><a href="{{ route('customer') }}"><svg class="glyph stroked chain">
                <use xlink:href="#stroked-chain" />
            </svg> Quản lý khách hàng</a></li>
    <li><a href="{{ route('order') }}"><svg class="glyph stroked clipboard with paper">
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
            <li class="active">Quản lý khách hàng</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lịch sử mua hàng của {{$customer->name}}</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Khách hàng</th>
                                <th data-sortable="true">SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Giá trị</th>
                                <th>Trạng thái</th>
                                <th>Thời gian đặt</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="align-middle">{{$order->ord_id}}</td>
                                <td class="align-middle">{{$order->customer->name}}  </td>
                                <td class="align-middle">{{ $order->customer->phone }} </td>
                                <td class="align-middle">{{ $order->customer->address }} </td>
                                <td class="align-middle">{{ number_format($order->value) }}</td>
                                @if ($order->status == 1)
                                <td class="align-middle"><span class="label label-success">Đã xử lý</span></td>
                                @else
                                <td class="align-middle"><span class="label label-danger">Chưa xử lý</span></td>
                                @endif
                                <td class="align-middle">{{$order->created_at}}</td>
                                <td class="form-group align-middle">
                                    <a href="{{ route ('detail-order', ['id' => $order->ord_id]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a data-target="#delete-{{ $order->ord_id }}" data-toggle="modal" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                                <div class="modal" tabindex="-1" id="delete-{{ $order->ord_id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title">Xóa đơn hàng</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Bạn muốn xóa đơn hàng số {{$order->ord_id}}?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ route('delete-order', ['id' => $order->ord_id]) }}" class="btn btn-danger">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
    <div class="btn-group">
        <a href="{{ route('customer') }}" class="btn btn-info btn-sm">
           <i class="glyphicon glyphicon-chevron-left"></i> Quay lại
        </a>
    </div>
    <!-- <div class="panel-footer">
    </div> -->

</div>
@endsection