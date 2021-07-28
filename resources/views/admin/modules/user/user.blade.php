@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')
@section('sidebar')
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="{{ route ('index') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class = "active"><a href="{{ route('user') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li ><a href="{{ route('category') }}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li ><a href="{{ route('product') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<!-- <li><a href="comment.html"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
			<li><a href="ads.html"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
			<li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li> -->
		</ul>

</div>
@endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{ route('add-user') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="">1</td>
                                    <td style="">Admin</td>
                                    <td style="">admin@gmail.com</td>
                                    <td><span class="label label-danger">Admin</span></td>
                                    <td class="form-group">
                                        <a href="{{ route('edit-user', ['id' => 1]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a class="btn btn-danger" data-target = "#delete" data-toggle = "modal"><i class="glyphicon glyphicon-remove"></i></a>
                                        <div class="modal" tabindex="-1" id="delete">
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
														<a href	= "#" class="btn btn-danger">Xóa</a>
													</div>
												</div>
											</div>
										</div>
                                    </td>

                                </tr>
                                <tr>
                                        <td style="">2</td>
                                        <td style="">Nguyễn Văn A</td>
                                        <td style="">nguyenvana@gmail.com</td>
                                        <td><span class="label label-warning">Member</span></td>
                                        <td class="form-group">
                                            <a href="{{ route('edit-user', ['id' => 2]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="/" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                            </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>
@endsection