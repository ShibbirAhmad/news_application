@extends('frontend.master')

@section('content')

	  <div class="catgory-page-area">
        <div class="container" style="background: #fff;">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
                        <li><a href="">

                            @foreach($allposts as $v_posts)
                             {{$v_posts->category_name}}



                        </a></li>
                    </ol>
                </div>
            </div>
            <section class="cardd-area">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-12 col-xs-12">
                        <!--- cardd-raea-three start -->
                        <div class="cardd-raea-three section-margin">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="cd-top-post">
                                        <div class="card">
                                <a href="{{url('/moshadesh/news/'.$v_posts->post_id)}}">
                             <img class="card-img-top" src="{{asset($v_posts->post_image)}}" alt="Card image cap">
                             </a>
                               <div class="card-body" style="background: none;">
                                    <h5 class="card-title"><a href="{{url('/moshadesh/news/'.$v_posts->post_id)}}">{{$v_posts->post_title}}</a></h5>
                                    <p class="card-text" style="margin-top:-30px;"><a href="#">{!! str_limit($v_posts->short_description, 120) !!}</a></p>
                                </div>
                                        </div>

                                    </div>
                                </div>
                                 @endforeach


                                <!--col-end-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="row">
                                        @foreach($four_posts as $v_four_post)
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="small-card">
                                                <div class="small-cd-img">
                                                    <a href="{{url('/moshadesh/news/'.$v_four_post->post_id)}}">
                                                        <img src="{{asset($v_four_post->post_image)}}" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="sm-cd-caption">
                                                    <h3>
                                                        <a href="{{url('/moshadesh/news/'.$v_four_post->post_id)}}">{{$v_four_post->post_title}}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach




                                    </div>
                                    <!--row-end-->
                                </div>
                                <!--col-end-->
                            </div>
                        </div>
                        <!-- category-it-section start -->
                        <div class="category-it-section section-margin">
                            <div class="row">
                                @foreach($all_news as $v_all_news)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 recent_category">

                                    <div class="small-card">
                                        <div class="small-cd-img">
                                            <a href="{{url('/moshadesh/news/'.$v_all_news->post_id)}}">
                                 <img src="{{asset($v_all_news->post_image)}}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="sm-cd-caption">
                                            <h3>
                                                <a href="{{url('/moshadesh/news/'.$v_all_news->post_id)}}">{{$v_all_news->post_title}}</a>
                                            </h3>
                                        </div>
                                    </div>

                                </div>
                                @endforeach












                            </div>
                        </div>
                        <!-- category-it-section end -->
                        <!-- pagination -->
                        <!-- <div class="col-md-12">
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item "><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Last ›</a></li>
                            </ul>
                        </div> -->
                        <!--  end pagination -->
                    </div>
                    <!--col-9 end-->
                    <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12">
                        <div class="cardd-sidebar section-margin">
                            <div class="fb-page fb_iframe_widget"></div>
                            <br>
                            <!-- add-area-one start-->
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#home">সর্বশেষ </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu1">জনপ্রিয়</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="home" class="container tab-pane active">
                                     @foreach($latests as $v_latest)
                        <ul class="pillsing">

                            <li>
                                <a href="{{url('/moshadesh/news/'.$v_latest->post_id)}}">{{str_limit($v_latest->post_title, 80)}}</a>
                            </li>



                        </ul>
                         @endforeach
                    </div>

                    <div id="menu1" class="container tab-pane fade">
                        @foreach($populars as $v_popular)
                        <ul class="pillsing">

                            <li>
                                <a href="{{url('/moshadesh/news/'.$v_popular->post_id)}}">{{str_limit($v_popular->post_title,40)}}</a>
                            </li>



                        </ul>
                         @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- end row -->
    </div>

@endsection