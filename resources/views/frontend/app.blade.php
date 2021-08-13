<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Home')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/toast.css')}}">
    @yield('css')
    <script src="{{ asset('frontend/js/jquery-3.3.1.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js')}}"></script>
    @yield('script')

</head>

<body>
    <div id="toast"></div>

    <!--	Header	-->
    @include('frontend.header')
    <!--	End Header	-->

    <!--	Body	-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav>
                        <div id="menu" class="collapse navbar-collapse">
                            <ul>
                                @foreach($categories as $category)
                                <li class="menu-item"><a href="{{route('front.category', ['cat_id' => $category->cat_id])}}">{{$category->cat_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div id="main" class="col-lg-8 col-md-12 col-sm-12">
                    @yield('content')
                </div>
                @section('sidebar')
                <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
                    <div id="banner">
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="{{ asset('frontend/images/banner-1.png')}}"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="{{ asset('frontend/images/banner-2.png')}}"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="{{ asset('frontend/images/banner-3.png')}}"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="{{ asset('frontend/images/banner-4.png')}}"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="{{ asset('frontend/images/banner-5.png')}}"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="{{ asset('frontend/images/banner-6.png')}}"></a>
                        </div>
                    </div>
                </div>
                @show
            </div>
        </div>
    </div>
    <!--	End Body	-->
    <!--	Footer	-->
    @include('frontend.footer')
    <!--	End Footer	-->
</body>
<script src="{{ asset('frontend/js/toast.js')}}"></script>
<script>
    // update số lượng lên lên icon giỏ hàng
    var cartQtt = document.querySelector('.cart-qtt')
    var btn = document.querySelectorAll('.btn.btn-warning.btn-sm')
    console.log();
    for (var i = 0; i < btn.length; i++) {
        btn[i].onclick = function(event) {
            event.preventDefault();
            $('.alert.alert-success').alert('close');
            var prd_id = this.getAttribute('data-id');
            var link = "{{ route('cart.store') }}?id=" + prd_id;
            console.log()
            $.ajax({
                url: link,
                type: "GET",
            }).done(function (data){
                toast()
                cartQtt.innerText = data;
            })
        }
    }
</script>

</html>