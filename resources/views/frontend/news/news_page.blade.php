@extends('frontend.master')

@section('metatag')
    <title>{{$newsbyid->post_title}}</title>

<meta property="fb:app_id" content="139482868015066" />
<meta property="og:url"           content="{{url()->current()}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$newsbyid->post_title}}" />
<meta property="og:description"   content="{{$newsbyid->post_title}}" />
<meta property="og:image"         content="{{asset($newsbyid->post_image)}}" />

@endsection

@section('content')



 <div class="catgory-page-area">
        <div class="container" style="background: #fff;">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="news.html"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">{{$newsbyid->category_name}}</a></li>
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
                            <h4>{{$newsbyid->post_title}} </h4>
                            <p>আপডেট: {{$newsbyid->post_cur_date}}</p>
                        </div>
                                                <div class="addthis_inline_share_toolbox_23q6"></div>

                        <!-- single-pg-socile start-->
                        <div class="single-pg-socile">
                            <ul class="list-unstyled text-right">

                             <!-- <li>-->

                             <!--      <div class="fb-share-button" -->
                             <!--     data-href="{{url('/moshadesh/news/'.$newsbyid->post_id)}}"-->
                             <!--       data-layout="button_count">-->

                             <!--   </div>-->

                             <!--</li>-->
                              <!--   <li>
                                    <a href="https://www.linkedin.com">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                        <div id="news_print">
                            <div class="single-pg-mg">
                                <img src="{{asset($newsbyid->post_image)}}" alt="" class="img-fluid">
                            </div>

                            <div class="single-pg-para news_paragraph">
                                <p>{!!($newsbyid->long_description)!!}</p>
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
s.src = 'https://http-mohasagor-news.disqus.com/embed.js';
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12 recent-post">
                                <div class="small-card">
                                    <div class="small-cd-img">
                                        <a href="{{url('/moshadesh/news/'.$v_all_new->post_id)}}">
                                            <img class="img-thumbnail" src="{{asset($v_all_new->post_image)}}" alt="">
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
                        <div class="fb-page fb_iframe_widget"></span>

                          {{-- advertisements --}}
                       @if (count($advertisements) >= 1)
                        <div id="ad_info" class="opinion_and">
                            <a href="{{ $advertisements[0]->url }}" target="_blank" >
                            <img  class="addvertise_image" id="_ad_click_" src=" {{ asset($advertisements[0]->image) }}" alt="news image">
                             </a>
                        </div>
                       @endif
                    {{--   advertisements --}}

                        </div>
                        <div class="clearfix"></div>
                        <br>

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
                      {{-- advertisements --}}
                       @if (count($advertisements) >= 2)
                        <div id="ad_info" class="opinion_and">
                            <a href="{{ $advertisements[1]->url }}" target="_blank" >
                            <img  class="addvertise_image" id="_ad_click_" src=" {{ asset($advertisements[1]->image) }}" alt="news image">
                             </a>
                        </div>
                       @endif
                    {{--   advertisements --}}
                     <div id="a-image">
                         @if($newsbyid->post_add_image)
                       <a href="{{$newsbyid->add_image_url  }}" target="_blank">

                                 <img src="{{ asset($newsbyid->post_add_image) }}" style="max-width: 350px;
                                width: 345px;
                                height: auto;
                                max-height: 950px;
                                border: 2px solid #0c889e;
                                margin-top: 20px" alt="">
                            </a>
                         @endif
                        </div>
                </div>
            </div>
        </div>
    </section>

@endsection
