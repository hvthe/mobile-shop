<div id="header">
	<div class="container">
    	<div class="row">
        	<div id="logo" class="col-lg-3 col-md-3 col-sm-12">
            	<h1><a href="{{route('index')}}"><img class="img-fluid" width = "80%" src="{{ asset('frontend/images/logo.png')}}"></a></h1>
            </div>
            <div id="search" class="col-lg-6 col-md-6 col-sm-12">
                <form class="form-inline" action="{{route('front.search')}}" method="get">
                    @csrf
                    <input class="form-control mt-3" name = "keyWord" type="search" placeholder="Tìm kiếm" aria-label="Search">
                    <button class="btn mt-3" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div id="cart" class="col-lg-3 col-md-3 col-sm-12">
                <!-- <a href="{{route('login')}}" class="mt-4 mr-2">Đăng nhập</a> -->
            	<a class="mt-4 mr-2" href="{{route('cart')}}">giỏ hàng</a>
                <span class="mt-3 cart-qtt">{{ session()->has('cart')? array_sum(session()->get('cart')) : 0}}</span>
            </div>
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>