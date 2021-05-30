@extends('frontend.master')

@section('content')
 <div class="catgory-page-area">
        <div class="container" style="background: #fff;">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="news.html"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">{{$newsbyid->menu_name}}</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <section>
        <div class="container" style="background-color: #fff;">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-xs-12">
                    <div class="single-pg-item">
                        <div class="single-pg-header">
                            <h4>{{$newsbyid->news_title}} </h4>
                            <p>আপডেট: {{$newsbyid->menu_cur_date}}</p>
                        </div>
                        <!-- single-pg-socile start-->
                        <div class="single-pg-socile">
                            <ul class="list-unstyled text-right">
                                <li>
                                    <a href="https://www.facebook.com">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com">
                                        <i class="fa fa-linkedin"></i>
                                    </a> 
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="news_print">
                            <div class="single-pg-mg">
                                <img src="{{asset($newsbyid->menu_image)}}" alt="" class="img-fluid">
                            </div>

                            <div class="single-pg-para news_paragraph">
                                <p>{{$newsbyid->description}}</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="fb-like fb_iframe_widget"></div>
                    </div>

                                        <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://mohasagor-news.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                    <!--recent-news area start-->
                    <div class="recent-news">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                                <div class="cardd-4-title section-title">
                                    <h3>আরও পড়ুন</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            @foreach($all_news as $v_all_new)
                            <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12">
                                <div class="small-card">
                                    <div class="small-cd-img">
                                        <a href="{{url('/moshadesh/news/'.$v_all_new->post_id)}}">
                                            <img src="{{asset($v_all_new->post_image)}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="sm-cd-caption">
                                        <h3>
                                            <a href="{{url('/moshadesh/news/'.$v_all_new->post_id)}}">{{$v_all_new->post_title}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                       

                            @endforeach

                        </div>
                    </div>
                    <!--recent-news area end-->
                </div>
                <!--opinion_and start-->
                <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">
                    <div class="sidebar-option-warp" style="overflow: hidden;">
                        <div class="fb-page fb_iframe_widget"></span></div>
                        <div class="clearfix"></div>
                        <br>

                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#home">সর্বশেষ খবর</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#menu1">জনপ্রিয় খবর</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active">
                                @foreach($latests as $v_latest)
                        <ul class="pillsing">
                            
                            <li>
                                <a href="{{url('/moshadesh/news/'.$v_latest->post_id)}}">{{str_limit($v_latest->post_title, 40)}}</a>
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
        </div>
    </section>

@endsection
