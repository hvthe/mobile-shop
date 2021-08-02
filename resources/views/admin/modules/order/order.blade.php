@extends('admin.index')

@section('title', 'Mobile Shop - Administrator')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('index')}}"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách đơn hàng</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đơn hàng</h1>
        </div>
    </div>
    <!--/.row-->
    @if(session()->exists('success'))
    @foreach(session()->get('success') as $message)
    <p class="alert alert-success" role="alert">{{ $message }}</p>
    @endforeach
    @endif
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
    <div class="panel-footer">
        {!! $orders->links() !!}
    </div>

</div>
@endsection