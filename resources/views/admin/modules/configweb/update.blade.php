@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Config</a></li>
            <li class="active"></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Information </h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('update-config') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $config->title }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="logo">
                                <div style="background-color: #e9ecf2;">
                                    <img src="{{ asset('admin/images/'.$config->logo) }}" width="100%" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea name="address" id="" cols="10" rows="3" class="form-control">{{ $config->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Dịch vụ</label>
                                <textarea name="service" id="" cols="10" rows="3" class="form-control">{{ $config->service }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hotline</label>
                                <textarea name="hotline" id="" cols="10" rows="3" class="form-control">{{ $config->hotline }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Slide</label>
                                <p>Image 1 <input type="file" name = "slide-1"></p>
                                <p>Image 2 <input type="file" name = "slide-2"></p>
                                <p>Image 3 <input type="file" name = "slide-3"></p>
                                <p>Image 4 <input type="file" name = "slide-4"></p>
                                <p>Image 5 <input type="file" name = "slide-5"></p>
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
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->
@endsection