<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<link href="{{ asset ('admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset ('admin/css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset ('admin/css/bootstrap-table.css') }}" rel="stylesheet">
	<link href="{{ asset ('admin/css/styles.css') }}" rel="stylesheet">
	<!-- <link href="{{ asset ('admin/css/stilcopy.css') }}" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--Icons-->
	
	<script src="{{ asset ('admin/js/lumino.glyphs.js') }}"></script>
	<script src="{{ asset ('admin/js/jquery-1.11.1.min.js') }}"></script>

	<!-- [if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif] -->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> {{__('hello')}} {{session()->get('user')->username}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use>
									</svg> Hồ sơ</a></li>
							<li><a href="{{ route('logout') }}"><svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use>
									</svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>

			</div>

		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		@csrf
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<?php $route = Route::current()->uri;
		$route = explode('/', $route);
		$route = count($route) > 1? $route[1]:'';
		?>
		@section('menu')

		<ul class="nav menu">
			<li class="{{$route == ''? 'active': ''}}"><a href="{{ route ('dashboard') }}"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg>{{__('dashboard')}}</a></li>
			@if(session()->get('user')->user_level == 1)
			<li class="{{$route == 'user'? 'active': ''}}"><a href="{{ route('user') }}"><svg class="glyph stroked male user ">
						<use xlink:href="#stroked-male-user" />
					</svg>{{__('user')}}</a></li>
			@endif
			<li class="{{$route == 'category'? 'active': ''}}"><a href="{{ route('category') }}"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg>{{__('category')}}</a></li>
			<li class="{{$route == 'product'? 'active': ''}}"><a href="{{ route('product') }}"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
					</svg>{{__('product')}}</a></li>
			<li class="{{$route == 'customer'? 'active': ''}}"><a href="{{route('customer')}}"><svg class="glyph stroked chain">
						<use xlink:href="#stroked-chain" />
					</svg>{{__('customer')}}</a></li>
			<li class="{{$route == 'order'? 'active': ''}}"><a href="{{route('order')}}"><svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper"></use>
					</svg>{{__('order')}}</a></li>
			<li><a href="#"><svg class="glyph stroked gear">
						<use xlink:href="#stroked-gear" />
					</svg>{{__('config')}}</a></li>
			<li class="dropdown">
				<a href="#" style= "color: #30a5ff" class="dropdown-toggle" data-toggle="dropdown">
					{{ __('language')}}
					@if(session()->get('language')=='en')
					<img src="{{asset('admin/img/eng.png')}}" width="20px" alt="">
					@else
					<img src="{{asset('admin/img/vn.png')}}" width="20px" alt="">
					@endif
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{ route('change-language', 'vn') }}">
							<img src="{{asset('admin/img/vn.png')}}" width="15px" alt="">
							VN
						</a>
					</li>
					<li>
						<a href="{{ route('change-language', 'en') }}">
							<img src="{{asset('admin/img/eng.png')}}" width="15px" alt="">
							ENG
						</a>
					</li>
				</ul>
			</li>
		</ul>
		@show

	</div>
	<!--/.sidebar-->
	@yield('content')
	<!--/.main-->
	<script src="{{ asset ('admin/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset ('admin/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset ('admin/js/bootstrap-table.js') }}"></script>
	<script src="{{ asset ('admin/js/main.js') }}"></script>
	@yield('listdata')
</body>

</html>