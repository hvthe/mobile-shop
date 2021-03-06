@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')

@section('content')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active">Danh mục 1</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">{{ $category->cat_name }}</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <!-- <div class="alert alert-danger">Danh mục đã tồn tại !</div> -->
							<form role="form" method="post" action = "{{route('update-category',['id' => $category->cat_id])}}">
								@csrf
								<div class="form-group">
									<label>Tên danh mục:</label>
									<input type="text" name="cat_name" value="{{ $category->cat_name }}" class="form-control">
									@if($errors->all())
									<p class="text-danger">{{$errors->first('cat_name')}}</p>
									@endif
								</div>
								<button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
								<button type="reset" class="btn btn-default">Làm mới</button>
							</form>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div>	<!--/.main-->	
	</div>
@endsection
