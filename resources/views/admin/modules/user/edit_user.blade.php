@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')
@section('menu')
		<ul class="nav menu">
			<li ><a href="{{ route ('index') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class = "active" ><a href="{{ route('user') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li ><a href="{{ route('category') }}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li ><a href="{{ route('product') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="{{ route('customer') }}"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý khách hàng</a></li>
			<li><a href="{{ route('order') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Đơn hàng </a></li>
			<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>
@endsection
@section('content')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">{{ $user->username }}</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: {{ $user->username }}</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <!-- <div class="alert alert-danger">Email đã tồn tại, Mật khẩu không khớp !</div> -->
                            <form role="form" method="post" action = "{{ route('update-user') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" placeholder="">
                                    <input type="hidden" name="id" class="form-control" value="{{ $user->user_id }}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="re_password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option {{ $user->user_level == 1 ? 'selected' : '' }} value=1 >Admin</option>
                                        <option {{ $user->user_level == 0 ? 'selected' : '' }} value=0 >Member</option>
                                    </select>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
@endsection