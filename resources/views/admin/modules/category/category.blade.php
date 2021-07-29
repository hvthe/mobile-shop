@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')
@section('menu')
		<ul class="nav menu">
			<li ><a href="{{ route ('index') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li ><a href="{{ route('user') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li class = "active"><a href="{{ route('category') }}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li ><a href="{{ route('product') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý khách hàng</a></li>
			<li><a href="#"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Đơn hàng </a></li>
			<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Quản lý danh mục</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div><!--/.row-->
	@if(session()->exists('success'))
	@foreach(session()->get('success') as $message)
	<p class="alert alert-success" role="alert">{{ $message }}</p>
	@endforeach
	@endif
	
	<div id="toolbar" class="btn-group">
		<a href="{{ route('create-category') }}" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> Thêm danh mục
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table 
					data-toolbar="#toolbar"
					data-toggle="table">
					
					<thead>
						<tr>
							<th data-field="id" data-sortable="true">ID</th>
							<th>Tên danh mục</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td style="">{{ $category->cat_id }}</td>
							<td style="">{{ $category->cat_name }}</td>
							<td class="form-group">
								<a href="{{ route('show-category', ['id' => $category->cat_id]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$category->cat_id}}"><i class="glyphicon glyphicon-remove"></i></a>
								<div class="modal" tabindex="-1" id="delete-{{$category->cat_id}}">
									<div class="modal-dialog" >
										<div class="modal-content">
											<div class="modal-header bg-primary">
												<h5 class="modal-title">Xóa danh mục</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
																<p>Bạn muốn xóa ?</p>
															</div>
															<div class="modal-footer">
																<button class="btn btn-secondary" data-dismiss="modal">Close</button>
																<a href	= "{{ route('delete-product', ['id' => $category->cat_id])}}" class="btn btn-danger">Xóa</a>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>
							</div>
							
							<div class="panel-footer">
								{{ $categories->links()}}
							</div>
						</div>
					</div>
				</div><!--/.row-->
			</div>
@endsection
			