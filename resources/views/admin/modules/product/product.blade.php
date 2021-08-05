@extends('admin.index')

@section('title', 'Mobile Shop - Administrator')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ route('dashboard')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		@if(session()->exists('success'))
		@foreach(session()->get('success') as $message)
		<p class="alert alert-success" role="alert">{{ $message }}</p>
		@endforeach
		@endif
		<div id="list-data">
		@include('admin.modules.product.list-data')
		</div>
		
	</div>
@endsection
