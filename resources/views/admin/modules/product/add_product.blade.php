@extends('admin.index')
@section('menu')
		<ul class="nav menu">
			<li ><a href="{{ route ('index') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li ><a href="{{ route('user') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="{{ route('category') }}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class = "active"><a href="{{ route('product') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý khách hàng</a></li>
			<li><a href="{{ route('order') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Đơn hàng </a></li>
			<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>
@endsection
@section('title', 'Mobile Shop - Administrator')
@section('content')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="{{ route('index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{route('product')}}">Quản lý sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm sản phẩm</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form action = "{{route('add-product')}}" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input name="prd_name" value = "{{old('prd_name')}}"  class="form-control" placeholder="">
                                    @if($errors->first('prd_name'))
                                    <p class="text-danger">{{$errors->first('prd_name')}}</p>
                                    @endif
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input name="prd_price" value = "{{old('prd_price')}}"  type="number" min="0" class="form-control">
                                    @if($errors->first('prd_price'))
                                    <p class="text-danger">{{$errors->first('prd_price')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input name="prd_warranty" value = "{{old('prd_warranty')}}"  type="text" class="form-control">
                                    @if($errors->first('prd_warranty'))
                                    <p class="text-danger">{{$errors->first('prd_warranty')}}</p>
                                    @endif
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input name="prd_accessories" value = "{{old('prd_accessories')}}"  type="text" class="form-control">
                                    @if($errors->first('prd_accessories'))
                                    <p class="text-danger">{{$errors->first('prd_accessories')}}</p>
                                    @endif
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input name="prd_promotion" value = "{{old('prd_promotion')}}"  type="text" class="form-control">
                                    @if($errors->first('prd_promotion'))
                                    <p class="text-danger">{{$errors->first('prd_promotion')}}</p>
                                    @endif
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input name="prd_new" value = "{{old('prd_new')}}" type="text" class="form-control">
                                    @if($errors->first('prd_new'))
                                    <p class="text-danger">{{$errors->first('prd_new')}}</p>
                                    @endif
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input name="prd_image" id="upload" value = ""  type="file">
                                    @if($errors->first('prd_image'))
                                    <p class="text-danger">{{$errors->first('prd_image')}}</p>
                                    @endif
                                    <br>
                                    <div>
                                        <img src="{{ asset('admin/img/default.jpg')}}" width = " 200px" id="img_upload">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        @foreach($categories as $category)
                                        @if(old('cat_id') == $category->cat_id)
                                        <option selected value={{$category->cat_id}}>{{$category->cat_name}}</option>
                                        @else
                                        <option value={{$category->cat_id}}>{{$category->cat_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 selected>Còn hàng</option>
                                        <option value=0>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" value = "{{old('prd_featured')}}"  type="checkbox" value=1>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="prd_details" class="form-control" rows="3"></textarea>
                                        @if($errors->first('prd_details'))
                                    <p class="text-danger">{{$errors->first('prd_details')}}</p>
                                    @endif
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
    @endsection