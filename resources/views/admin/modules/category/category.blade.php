@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">{{__('list-categories')}}</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{__('list-categories')}}</h1>
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