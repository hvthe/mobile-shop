@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')
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

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="{{ route('index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{route('product')}}">Quản lý sản phẩm</a></li>
				<li class="active">{{ $product->prd_name }}</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: {{ $product->prd_name }}</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form action = "{{ route('update-product', ['id' => $product->prd_id]) }}" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="prd_name" class="form-control" value="{{ is_string(old('prd_name')) ? old('prd_name') : $product->prd_name }}"  placeholder="">
                                    @if($errors->first('prd_name'))
                                    <p class="text-danger">{{$errors->first('prd_name')}}</p>
                                    @endif
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="prd_price" value="{{ is_string(old('prd_price')) ? old('prd_price') : $product->prd_price }}" class="form-control">
                                    @if($errors->first('prd_price'))
                                    <p class="text-danger">{{$errors->first('prd_price')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input type="text" name="prd_warranty" value="{{ is_string(old('prd_warranty')) ? old('prd_warranty') : $product->prd_warranty }}" class="form-control">
                                    @if($errors->first('prd_warranty'))
                                    <p class="text-danger">{{$errors->first('prd_warranty')}}</p>
                                    @endif
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input type="text" name="prd_accessories" value="{{ is_string(old('prd_accessories')) ? old('prd_accessories') : $product->prd_accessories }}" class="form-control">
                                    @if($errors->first('prd_accessories'))
                                    <p class="text-danger">{{$errors->first('prd_accessories')}}</p>
                                    @endif
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input type="text" name="prd_promotion" value="{{ is_string(old('prd_promotion')) ? old('prd_promotion') : $product->prd_promotion }}" class="form-control">
                                    @if($errors->first('prd_promotion'))
                                    <p class="text-danger">{{$errors->first('prd_promotion')}}</p>
                                    @endif
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input type="text" name="prd_new" value="{{ is_string(old('prd_new')) ? old('prd_new') : $product->prd_new }}" type="text" class="form-control">
                                    @if($errors->first('prd_new'))
                                    <p class="text-danger">{{$errors->first('prd_new')}}</p>
                                    @endif
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="text" hidden name="prd_image_old"  value = {{$product->prd_image}}>
                                    <input type="file" name="prd_image" id = "upload" >
                                    <br>
                                    <div>
                                        <img src="{{ asset('admin/images/'.$product->prd_image)}}" width = "200px" id = "img_upload">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        @foreach($categories as $category)
                                            @if($product->cat_id == $category->cat_id)
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
                                        <option {{ $product->prd_status == 1 ? 'selected' : ''}} value=1>Còn hàng</option>
                                        <option {{ $product->prd_status == 0 ? 'selected' : ''}} value=0>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1 {{ $product->prd_featured == 1? 'checked' : '' }}>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="prd_details" class="form-control" rows="3">{{ is_string(old('prd_details')) ? old('prd_details') : $product->prd_details }}</textarea>
                                        @if($errors->first('prd_details'))
                                        <p class="text-danger">{{$errors->first('prd_details')}}</p>
                                        @endif
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
