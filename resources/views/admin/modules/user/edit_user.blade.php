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
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">Nguyễn Văn A</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: Nguyễn Văn A</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <div class="alert alert-danger">Email đã tồn tại, Mật khẩu không khớp !</div>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="user_full" required class="form-control" value="Nguyễn Văn A" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_mail" required value="nguyenvana@gmail.com" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="user_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="user_re_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2 selected>Member</option>
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