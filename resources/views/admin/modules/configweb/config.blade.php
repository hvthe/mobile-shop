@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Thông tin website</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thông tin website</h1>
		</div>
	</div>
	<!--/.row-->
	@if(session()->exists('success'))
	@foreach(session()->get('success') as $message)
	<p class="alert alert-success" role="alert">{{ $message }}</p>
	@endforeach
	@endif

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
						<thead>
							<tr>
								<th style="">#</th>
								<th style="">Title</th>
								<th style="">Logo</th>
								<th style="">Địa chỉ</th>
								<th style="">Dịch vụ</th>
								<th style="">Hotline</th>
								<th style="">Slide</th>
								<th style="">Sửa</th>
							</tr>
						</thead>
						<tbody>
							<tr data-index="0">
								<td class="text-center" style="">1</td>
								<td class="text-center" style="">{{ $config->title }}</td>
								<td class="text-center" style=""><img width="100px" src="{{ asset('admin/images/'.$config->logo) }}"></td>
								<td class="text-center" style="">{{ $config->address }}</td>
								<td class="text-center" style="">{{ $config->service }}</td>
								<td class="text-center" style="">{{ $config->hotline }}</td>
								<td class="text-center" style="">
									<div id="carousel-example-generic" style="width: 300px;" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
											<li data-target="#carousel-example-generic" data-slide-to="1"></li>
											<li data-target="#carousel-example-generic" data-slide-to="2"></li>
											<li data-target="#carousel-example-generic" data-slide-to="3"></li>
											<li data-target="#carousel-example-generic" data-slide-to="4"></li>
										</ol>

										<div class="carousel-inner" role="listbox">
											<div class="item active">
												<img src="{{ asset('frontend/images/slide-1.png')}}" alt="...">
												<div class="carousel-caption">
												</div>
											</div>
											<div class="item">
												<img src="{{ asset('frontend/images/slide-2.png')}}" alt="...">
												<div class="carousel-caption">
												</div>
											</div>
											<div class="item">
												<img src="{{ asset('frontend/images/slide-3.png')}}" alt="...">
												<div class="carousel-caption">
												</div>
											</div>
											<div class="item">
												<img src="{{ asset('frontend/images/slide-4.png')}}" alt="...">
												<div class="carousel-caption">
												</div>
											</div>
											<div class="item">
												<img src="{{ asset('frontend/images/slide-5.png')}}" alt="...">
												<div class="carousel-caption">
												</div>
											</div>
										</div>
										<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
											<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
											<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>
								</td>
								<td class="form-group text-center" style="">
									<a href="{{route('show-config')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>


	</div>

	<!--/.row-->
</div>
@endsection