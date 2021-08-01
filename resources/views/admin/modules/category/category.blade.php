@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')
@section('menu')
<ul class="nav menu">
	<li><a href="{{ route ('index') }}"><svg class="glyph stroked dashboard-dial">
				<use xlink:href="#stroked-dashboard-dial"></use>
			</svg> Dashboard</a></li>
	<li><a href="{{ route('user') }}"><svg class="glyph stroked male user ">
				<use xlink:href="#stroked-male-user" />
			</svg>Quản lý thành viên</a></li>
	<li class="active"><a href="{{ route('category') }}"><svg class="glyph stroked open folder">
				<use xlink:href="#stroked-open-folder" />
			</svg>Quản lý danh mục</a></li>
	<li><a href="{{ route('product') }}"><svg class="glyph stroked bag">
				<use xlink:href="#stroked-bag"></use>
			</svg>Quản lý sản phẩm</a></li>
	<li><a href="{{ route('customer') }}"><svg class="glyph stroked chain">
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
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Quản lý danh mục</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<!--/.row-->
	@if(session()->exists('success'))
	@foreach(session()->get('success') as $message)
	<p class="alert alert-success" role="alert">{{ $message }}</p>
	@endforeach
	@endif
	<div id="data-cat">
		@include('admin.modules.category.data-cat')
	</div>
</div>
@endsection