@extends('admin.index')
@section('sidebar')
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="{{ route ('index') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li ><a href="{{ route('user') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="{{ route('category') }}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class = "active"><a href="{{ route('product') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<!-- <li><a href="comment.html"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
			<li><a href="ads.html"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
			<li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li> -->
		</ul>

</div>
@endsection
@section('title', 'Mobile Shop - Administrator')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ route('index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{ route('create-product')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Cập nhật</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
								 @foreach($products as $key => $product)
                                    <tr>
                                        <td class="align-middle" style="">{{$product->prd_id}}</td>
                                        <td class="align-middle" style="">{{$product->prd_name}}</td>
                                        <td class="align-middle" style="">{{ number_format($product->prd_price)}} vnd</td>
                                        <td class="align-middle" style="text-align: center"><img width="130" height="180" src="{{ asset('admin/images/'.$product->prd_image)}}" /></td>
										@if ($product->prd_status == 1)
										<td class="align-middle" ><span class="label label-success">Còn hàng</span></td>
										@else
										<td class="align-middle" ><span class="label label-danger">Hết hàng</span></td>
										@endif
										<td class="align-middle" >{{$product->category->cat_name}}</td>
										<td class="align-middle" >{{$product->last_update}}</td>
                                        <td class="form-group align-middle">
                                            <a href="{{ route ('show-product', ['id' => $product->prd_id]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a data-target = "#delete-{{ $product->prd_id }}" data-toggle="modal" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                        <div class="modal" tabindex="-1" id="delete-{{ $product->prd_id }}">
											<div class="modal-dialog" >
												<div class="modal-content">
													<div class="modal-header bg-primary">
														<h5 class="modal-title">Xóa sản phẩm</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p>Bạn muốn xóa {{$product->prd_name}}?</p>
													</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" data-dismiss="modal">Close</button>
														<a href	= "{{ route('delete-product', ['id' => $product->prd_id]) }}" class="btn btn-danger">Xóa</a>
													</div>
												</div>
											</div>
										</div>
                                    </tr>
								@endforeach
                                    </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
						{{ ($products->links()) }}
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>
@endsection