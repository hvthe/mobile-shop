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
								<th style="">Sửa</th>
							</tr>
						</thead>
						<tbody>
							<tr data-index="0">
								<td class="text-center" style="">1</td>
								<td class="text-center" style="">Mobile Shop</td>
								<td class="text-center" style=""><img width="242px" src="../images/logo-footer.png"></td>
								<td class="text-center" style="">Kaengnam hà nội</td>
								<td class="text-center" style="">Bảo hành rơi vỡ, ngấm nước Care Diamond

									Bảo hành Care X60 rơi vỡ ngấm nước vẫn Đổi mới</td>
								<td class="text-center" style="">Phone Sale: (+84) 0123456789

									Email: test@gmail.com</td>
								<td class="form-group text-center" style="">
									<a href="index.php?page_layout=edit_info&amp;id=1" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
					<table data-toggle="table">
						<thead>
							<tr>
								<th>
									Slide 
									<a href="index.php?page_layout=edit_info&amp;id=1" class="btn"><i class="glyphicon glyphicon-pencil"></i></a>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width: 500px;">
									<div class="row">
										<div class="col-lg-3"></div>
										<div class="col-lg-6">
											<div id="carousel-example-generic" style="width: 500px;" class="carousel slide" data-ride="carousel">
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
										</div>
									</div>

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