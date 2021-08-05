<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Home')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css')}}">
    @yield('css')
    <script src="{{ asset('frontend/js/jquery-3.3.1.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js')}}"></script>
    @yield('script')

</head>

<body>

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

</html>