    @extends('frontend.master')

    @section('content')
    <div class="container">
        <div class="row" style="margin-top: 20px;">



                <div class="col-xl-9 col-lg-9 col-md-9 col-xs-12">
                    <div class="row">
                       @foreach ($most_view_news as $post)
                           <div class="col-md-4 col-sm-4">
                           <a style="color:#000" href="{{url('/moshadesh/news/'.$post->post_id)}}">
                              <img class="img-thumbnail" src="{{ asset($post->post_image) }}" alt="news image">
                               <h4 class="top_news_heading"> {{ $post->post_title }} </h4>
                               <p class="top_news_description"> {!!  str_limit($post->short_description,200) !!} </p>
                             </a>
                           </div>
                       @endforeach

                    </div>
                </div>


                <div class="col-xl-3 col-lg-3 col-md-3 col-xs-12">

                    <div class="exc-area section-margin">
                        <div class="opinion_and">

                        </div>
                        <div class="option-cardd">


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9" style="padding: 5px 0px; text-align: center;">

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">

                </div>
            </div>


            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 blue">
                            <div class="section-title ">

                                <h3><a href="{{url('/moshadesh/category/'.$nationals->category_id.'/'.$nationals->category_name)}}">{{$nationals->category_name}}</a></h3>

                            </div>


                            <div class="single-cardd">
                                @foreach($nationals_head as $v_national_one)
                                <div class="cardd-img">
                                    <a href="{{url('/moshadesh/news/'.$v_national_one->post_id)}}">
                                    <img class="img-thumbnail" src="{{asset($v_national_one->post_image)}}" alt="">
                                </a>
                                </div>


                                <div class="cardd-tw-caption">
                                    <h2>
                                        <a href="{{url('/moshadesh/news/'.$v_national_one->post_id)}}">{{$v_national_one->post_title}}</a>
                                    </h2>
                                </div>

                                @endforeach

                                <div class="option-cardd">

                                    @foreach($nationals_sub as $v_nationals_sub)
                                     <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_nationals_sub->post_id)}}">
                                        <img src="{{asset($v_nationals_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_nationals_sub->post_id)}}">
                                            {{ str_limit($v_nationals_sub->post_title,35)}}

                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach

                                    {{-- <ul class="list-unstyled">
                                        @foreach($nationals_sub as $v_nationals_sub)
                                        <li>
                                            <a href="{{url('/moshadesh/news/'.$v_nationals_sub->post_id)}}">
                                            <img src="{{asset($v_nationals_sub->post_image)}}" alt="" class="img-fluid">
                                            <p>{{$v_nationals_sub->post_title}}</p>
                                        </a>
                                        </li>
                                        @endforeach
                                    </ul> --}}

                                </div>
                            </div>

                        </div>

                        <!--single-card-end-->

                        <div class="col-xl-4 col-lg-4 col-md-12 blue">
                            <div class="section-title section-title-2">

                                <h3><a href="{{url('/moshadesh/category/'.$politics->category_id.'/'.$politics->category_name)}}">{{$politics->category_name}}</a></h3>

                            </div>
                            <div class="single-cardd">
                                @foreach($politics_head as $v_politics)
                                <div class="cardd-img">
                                    <a href="{{url('/moshadesh/news/'.$v_politics->post_id)}}">
                                    <img class="img-thumbnail" src="{{asset($v_politics->post_image)}}" alt="" >
                                </a>

                                </div>

                                <div class="cardd-tw-caption">
                                    <h2>
                                        <a href="{{url('/moshadesh/news/'.$v_politics->post_id)}}">
                                            {{str_limit($v_politics->post_title,35)}}
                                        </a>
                                    </h2>
                                </div>

                                @endforeach

                                <div class="option-cardd">

                                    {{-- <ul class="list-unstyled">
                                            @foreach($politics_sub as $v_politics_sub)
                                        <li>
                                            <a href="{{url('/moshadesh/news/'.$v_politics_sub->post_id)}}">
                                            <img src="{{asset($v_politics_sub->post_image)}}" alt="" class="img-fluid">
                                            <p>{{$v_politics_sub->post_title}}</p>
                                        </a>
                                        </li>
                                        @endforeach
                                    </ul> --}}
 @foreach($politics_sub as $v_politics_sub)
                                     <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_politics_sub->post_id)}}">
                                        <img src="{{asset($v_politics_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_politics_sub->post_id)}}">
                                            {{str_limit($v_politics_sub->post_title,35)}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach

                                </div>

                            </div>
                        </div>
                        <!--single-card-end-->

                        <div class="col-xl-4 col-lg-4 col-md-12 blue">
                            <div class="section-title ">
                                <h3><a href="{{url('/moshadesh/category/'.$internationalbyid->category_id.'/'.$internationalbyid->category_name)}}">{{$internationalbyid->category_name}}</a></h3>
                            </div>
                            <div class="single-cardd">
                                @foreach($international_head as $v_international)
                                <div class="cardd-img">
                                    <a href="{{url('/moshadesh/news/'.$v_international->post_id)}}">
                                        <img class="img-thumbnail" src="{{asset($v_international->post_image)}}" alt="" >
                                    </a>
                                </div>

                                <div class="cardd-tw-caption">
                                    <h2>
                                        <a href="{{url('/moshadesh/news/'.$v_international->post_id)}}">{{$v_international->post_title}}</a>
                                    </h2>
                                </div>

                                @endforeach

                                <div class="option-cardd">

 @foreach($international_sub as $v_international_sub)
                                     <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_international_sub->post_id)}}">
                                        <img src="{{asset($v_international_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_international_sub->post_id)}}">
                                            {{str_limit($v_international_sub->post_title,35)}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                                </div>

                            </div>
                        </div>
                        <!--single-card-end-->
                    </div>
                    <!--row end-->
                </div>


                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="exc-area section-margin">
                        <div class="opinion_and">
                            <a href="{{url('/moshadesh/category/'.$exclusivebyid->category_id.'/'.$exclusivebyid->category_name)}}">{{$exclusivebyid->category_name}} </a>
                        </div>
                        <div class="option-cardd">
                            {{-- <ul class="list-unstyled">

                                @foreach($excluive_head as $v_excluive)
                                <li>
                                    <a href="{{url('/moshadesh/news/'.$v_excluive->post_id)}}">
                                        <img src="{{asset($v_excluive->post_image)}}" alt="" class="img-fluid">
                                        <p>{{$v_excluive->post_title}}</p>
                                    </a>
                                </li>

                                @endforeach

                            </ul> --}}
                             @foreach($excluive_head as $v_excluive)

                             <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_excluive->post_id)}}">
                                        <img src="{{asset($v_excluive->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_excluive->post_id)}}">{{
                                            str_limit($v_excluive->post_title,35)
                                        }}</a>
                                    </h3>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-xl-9 col-lg-9 col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                            <div class="cardd-4-title section-title ">
                                <h3><a href="{{url('/moshadesh/category/'.$all_bangladesh->category_id.'/'.$all_bangladesh->category_name)}}">{{$all_bangladesh->category_name}}</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            @foreach($allbangladesh_head as $v_allbangladesh)
                            <div class="sp-top-post">
                                <div class="sp-tp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_allbangladesh->post_id)}}">
                        <img src="{{asset($v_allbangladesh->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-caption">
                                    <h2>
                                        <a href="{{url('/moshadesh/news/'.$v_allbangladesh->post_id)}}">{{$v_allbangladesh->post_title}}</a>
                                    </h2>
                                    <p>
                                        <a href="{{url('/moshadesh/news/'.$v_allbangladesh->post_id)}}">

                                            <!-- {{strip_tags(preg_replace('/\s+/', '', $v_allbangladesh->short_description))}} -->

                                            {!!($v_allbangladesh->short_description)!!}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--col-end-->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <div class="row">
                                @foreach($allbangladesh_sub as $v_allbangladesh_sub)
                                <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="small-card">
                                        <div class="small-cd-img">

                                            <a href="{{url('/moshadesh/news/'.$v_allbangladesh_sub->post_id)}}">
                                                <img src="{{asset($v_allbangladesh_sub->post_image)}}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="sm-cd-caption">
                                            <h3>
                                                <a href="{{url('/moshadesh/news/'.$v_allbangladesh_sub->post_id)}}">{{$v_allbangladesh_sub->post_title}}</a>
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
                <!--col-9 end-->
            <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12">
                <div class="section-margin">
                    <div class="cardd-4-title section-title section-title-2">
                        <h3><a href="{{url('/moshadesh/category/'.$job_newsbyid->category_id.'/'.$job_newsbyid->category_name)}}">{{$job_newsbyid->category_name}}</a></h3>
                    </div>

                    @foreach($jobnews_head as $v_jobnews_head)
                    <div class="sp-warp">
                        <div class="sp-img">
                            <a href="{{url('/moshadesh/news/'.$v_jobnews_head->post_id)}}">
                                <img src="{{asset($v_jobnews_head->post_image)}}" alt="">
                            </a>
                        </div>
                        <div class="sp-text">
                            <h3>
                                <a href="{{url('/moshadesh/news/'.$v_jobnews_head->post_id)}}">{{str_limit($v_jobnews_head->post_title,35)}}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach





                </div>
            </div>
            <!--col-md-3-->
        </div>
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sx-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="cardd-4-title section-title section-title-2">
                                <h3><a href="{{url('/moshadesh/category/'.$sportsbyid->category_id.'/'.$sportsbyid->category_name)}}">{{$sportsbyid->category_name}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sx-12">
                            @foreach($sports_head as $v_sports_head)
                            <div class="sp-top-post">
                                <div class="sp-tp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_sports_head->post_id)}}">
                                        <img src="{{asset($v_sports_head->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-caption">
                                    <h2>
                                        <a href="{{url('/moshadesh/news/'.$v_sports_head->post_id)}}">{{$v_sports_head->post_title}}</a>
                                    </h2>
                                    <p>
                                        <a href="{{url('/moshadesh/news/'.$v_sports_head->post_id)}}">
                                        {!!($v_sports_head->short_description)!!}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!--col-end-->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sx-12">
                            @foreach($sports_sub as $v_sports_sub)
                            <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_sports_sub->post_id)}}">
                                        <img src="{{asset($v_sports_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_sports_sub->post_id)}}">{{
                                            str_limit($v_sports_sub->post_title,35)
                                        }}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach






                        </div>
                        <!--col-end-->
                    </div>
                </div>
                <!--col-9 end-->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sx-12">
                    <div class="section-margin">
                        <div class="cardd-4-title section-title ">
                            <h3><a href="{{url('/moshadesh/category/'.$featured_news->category_id.'/'.$featured_news->category_name)}}">{{$featured_news->category_name}}</a></h3>
                        </div>

                        @foreach($featured_head as $v_featured_head)
                        <div class="sp-warp">
                            <div class="sp-img">
                                <a href="{{url('/moshadesh/news/'.$v_featured_head->post_id)}}">
                                    <img src="{{asset($v_featured_head->post_image)}}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="sp-text">
                                <h3>
                                    <a href="{{url('/moshadesh/news/'.$v_featured_head->post_id)}}">{{str_limit($v_featured_head->post_title,35)}}</a>
                                </h3>
                            </div>
                        </div>

                        @endforeach





                    </div>
                </div>
                <!--col-md-3-->
            </div>
            <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="cardd-4-title section-title ">
                                <h3><a href="{{url('/moshadesh/category/'.$entertainment->category_id.'/'.$entertainment->category_name)}}">{{$entertainment->category_name}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            @foreach($entertainment_sub as $v_entertainment_sub)
                            <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_entertainment_sub->post_id)}}">
                                        <img src="{{asset($v_entertainment_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_entertainment_sub->post_id)}}">
                                            {{str_limit($v_entertainment_sub->post_title)}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-5">
                            @foreach($entertainment_head as $v_entertainment_head)
                            <div class="sp-top-post">
                                <div class="sp-tp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_entertainment_head->post_id)}}">
                                        <img src="{{asset($v_entertainment_head->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-caption">
                                    <h2>
                                        <a href="{{url('/moshadesh/news/'.$v_entertainment_head->post_id)}}">{{$v_entertainment_head->post_title}}</a>
                                    </h2>
                                    <p>
                                        <a href="{{url('/moshadesh/\ews/'.$v_entertainment_head->post_id)}}">{!! str_limit($v_entertainment_head->short_description, 200)!!}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-3">
                            <div class="section-margin" style="position: absolute;
        width: 255px;margin-top:-43px;">
                                <div class="cardd-4-title section-title section-title-2">
                                    <h3><a href="{{url('/moshadesh/category/'.$lifestyle->category_id.'/'.$lifestyle->category_name)}}">{{$lifestyle->category_name}}</a></h3>
                                </div>

                                @foreach($lifestyle_head as $v_lifestyle_head)
                                <div class="sp-warp">
                                    <div class="sp-img">
                                        <a href="{{url('/moshadesh/news/'.$v_lifestyle_head->post_id)}}">
                                            <img src="{{asset($v_lifestyle_head->post_image)}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="sp-text">
                                        <h3>
                                            <a href="{{url('/moshadesh/news/'.$v_lifestyle_head->post_id)}}">{{str_limit($v_lifestyle_head->post_title,35)}}</a>
                                        </h3>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>


                    </div>
                    </div>

                {{-- <div class="col-xl-9 col-lg-9 col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="cardd-4-title section-title ">
                                <h3><a href="{{url('/moshadesh/category/'.$entertainment->category_id.'/'.$entertainment->category_name)}}">{{$entertainment->category_name}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            @foreach($entertainment_sub as $v_entertainment_sub)
                            <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_entertainment_sub->post_id)}}">
                                        <img src="{{asset($v_entertainment_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_entertainment_sub->post_id)}}">{{$v_entertainment_sub->post_title}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach





                        </div>
                        <!--col-end-->

                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            @foreach($entertainment_head as $v_entertainment_head)
                            <div class="sp-top-post">
                                <div class="sp-tp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_entertainment_head->post_id)}}">
                                        <img src="{{asset($v_entertainment_head->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-caption">
                                    <h2>
                                        <a href="{{url('/moshadesh/news/'.$v_entertainment_head->post_id)}}">{{$v_entertainment_head->post_title}}</a>
                                    </h2>
                                    <p>
                                        <a href="{{url('/moshadesh/news/'.$v_entertainment_head->post_id)}}">{!! str_limit($v_entertainment_head->short_description, 200)!!}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--col-end-->
                    </div>

                </div> --}}
                <!--col-9 end-->

                <!--col-md-3-->
            </div>
        </div>
        <section class="cardd-area-six">
            <div class="container" style="background-color: #EEE;">
                <div class="carrd-six-warp">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                            <div class="cardd-4-title section-title section-title-2">
                                <h3><a href="{{url('/moshadesh/category/'.$features->category_id.'/'.$features->category_name)}}">{{$features->category_name}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!--row-end-->
                    <div class="row">
                        @foreach($features_head as $v_features_head)
                        <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12">
                            <div class="small-card">
                                <div class="small-cd-img">
                                    <a href="{{url('/moshadesh/news/'.$v_features_head->post_id)}}">
                                        <img src="{{asset($v_features_head->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sm-cd-caption">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_features_head->post_id)}}">{{$v_features_head->post_title}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        @endforeach




                    </div>
                </div>
            </div>
        </section>
        <section class="cardd-two">
            <div class="container" style="padding-top: 20px; background-color: #fff;">
                <div class="row">
                </div>
                <div class="cardd-two-warp section-margin">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12 blue">
                                    <div class="section-title ">
                                        <h3>
                                            <a href="{{url('/moshadesh/category/'.$diverse_news->category_id.'/'.$diverse_news->category_name)}}">{{$diverse_news->category_name}}</a>
                                        </h3>
                                    </div>

                                    <div class="single-cardd">
                                        @foreach($diversenews_head as $v_diversenews_head)
                                        <div class="cardd-img">
                                            <a href="{{url('/moshadesh/news/'.$v_diversenews_head->post_id)}}">
                                                <img class="img-thumbnail"src="{{asset($v_diversenews_head->post_image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="cardd-tw-caption">
                                            <h2>
                                                <a href="{{url('/moshadesh/news/'.$v_diversenews_head->post_id)}}">{{$v_diversenews_head->post_title}}</a>
                                            </h2>
                                        </div>

                                        @endforeach

                                        <div class="option-cardd">


                                            @foreach($diversenews_sub as $v_diversenews_sub)

                                                <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_diversenews_sub->post_id)}}">
                                        <img src="{{asset($v_diversenews_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_diversenews_sub->post_id)}}">
                                            {{str_limit($v_diversenews_sub->post_title,35)}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                                            {{-- <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{url('/moshadesh/news/'.$v_diversenews_sub->post_id)}}">
                                                        <img src="{{asset($v_diversenews_sub->post_image)}}" alt="" class="img-fluid">
                                                        <p>{{$v_diversenews_sub->post_title}}</p>
                                                    </a>
                                                </li>

                                                @endforeach


                                                 --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12 blue">
                                    <div class="section-title section-title-2">
                                        <h3>


                                            <a href="{{url('/moshadesh/category/'.$crimecorruption->category_id.'/'.$crimecorruption->category_name)}}">{{$crimecorruption->category_name}}</a>

                                        </h3>
                                    </div>
                                    <div class="single-cardd">
                                        @foreach($crimecorruption_head as $v_crimecorruption_head)
                                        <div class="cardd-img">
                                            <a href="{{url('/moshadesh/news/'.$v_crimecorruption_head->post_id)}}">
                                                <img class="img-thumbnail" src="{{asset($v_crimecorruption_head->post_image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="cardd-tw-caption">
                                            <h2>
                                                <a href="{{url('/moshadesh/news/'.$v_crimecorruption_head->post_id)}}">{{$v_crimecorruption_head->post_title}}</a>
                                            </h2>
                                        </div>

                                        @endforeach

                                        <div class="option-cardd">
                                            @foreach($crimecorruption_sub as $v_crimecorruption_sub)

                                                    <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_crimecorruption_sub->post_id)}}">
                                        <img src="{{asset($v_crimecorruption_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_crimecorruption_sub->post_id)}}">{{str_limit($v_crimecorruption_sub->post_title,35)}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach

                                            {{-- @foreach($crimecorruption_sub as $v_crimecorruption_sub)
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{url('/moshadesh/news/'.$v_crimecorruption_sub->post_id)}}">
                                                        <img src="{{asset($v_crimecorruption_sub->post_image)}}" alt="" class="img-fluid">
                                                        <p>{{$v_crimecorruption_sub->post_title}}</p>
                                                    </a>
                                                </li>

                                                @endforeach

                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12 blue">
                                    <div class="section-title ">
                                        <h3>
                                            <a href="{{url('/moshadesh/category/'.$information->category_id.'/'.$information->category_name)}}">{{$information->category_name}}</a>
                                        </h3>
                                    </div>
                                    <div class="single-cardd">
                                        @foreach($information_head as $v_information_head)
                                        <div class="cardd-img">
                                            <a href="{{url('/moshadesh/news/'.$v_information_head->post_id)}}">
                                                <img class="img-thumbnail" src="{{asset($v_information_head->post_image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="cardd-tw-caption">
                                            <h2>
                                                <a href="{{url('/moshadesh/news/'.$v_information_head->post_id)}}">{{$v_information_head->post_title}}</a>
                                            </h2>
                                        </div>

                                        @endforeach

                                        <div class="option-cardd">
 @foreach($information_sub as $v_information_sub)
                                                   <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_information_sub->post_id)}}">
                                        <img src="{{asset($v_information_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_information_sub->post_id)}}">{{str_limit($v_information_sub->post_title,35)}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach

                                            {{-- @foreach($information_sub as $v_information_sub)
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{url('/moshadesh/news/'.$v_information_sub->post_id)}}">
                                                        <img src="{{asset($v_information_sub->post_image)}}" alt="" class="img-fluid">
                                                        <p>{{$v_information_sub->post_title}}</p>
                                                    </a>
                                                </li>

                                                @endforeach --}}

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12 blue">
                                    <div class="section-title section-title-2">
                                        <h3><a href="{{url('/moshadesh/category/'.$health->category_id.'/'.$health->category_name)}}">{{$health->category_name}}</a></h3>
                                    </div>
                                    <div class="single-cardd">

                                        @foreach($health_head as $v_health_head)
                                        <div class="cardd-img">
                                            <a href="{{url('/moshadesh/news/'.$v_health_head->post_id)}}">
                                                <img class="img-thumbnail" src="{{asset($v_health_head->post_image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="cardd-tw-caption">
                                            <h2>
                                                <a href="{{url('/moshadesh/news/'.$v_health_head->post_id)}}">{{$v_health_head->post_title}}</a>
                                            </h2>
                                        </div>

                                        @endforeach

                                        <div class="option-cardd">
{{--
                                            <ul class="list-unstyled">
                                                @foreach($health_sub as $v_health_sub)
                                                <li>
                                                    <a href="{{url('/moshadesh/news/'.$v_health_sub->post_id)}}">
                                                        <img src="{{asset($v_health_sub->post_image)}}" alt="" class="img-fluid">
                                                        <p>{{$v_health_sub->post_title}}</p>
                                                    </a>
                                                </li>
                                            @endforeach
                                            </ul> --}}
                                @foreach($health_sub as $v_health_sub)
                                             <div class="sp-warp">
                                <div class="sp-img">
                                    <a href="{{url('/moshadesh/news/'.$v_health_sub->post_id)}}">
                                        <img src="{{asset($v_health_sub->post_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="sp-text">
                                    <h3>
                                        <a href="{{url('/moshadesh/news/'.$v_health_sub->post_id)}}">{{str_limit($v_health_sub->post_title,35)}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--row end-->
                        </div>
                    </div>
                    <!--row- end-->
                </div>
            </div>
        </section>

        <section class="photo_gallery">
            <div class="container" style="padding-bottom: 20px; padding-top: 20px;background-color: #fff;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 style="font-size: 19px;" class="block_title gallary_title">
                            <a href="#">ফটো গ্যালারী</a>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="slider-section">
                    <div style="display: block; overflow: hidden; margin: -7px auto 0 auto; padding: 10px 5px 5px 10px; width: 96%; max-width:940px; min-width: 240px; border: 0px solid #ccc; background-color: #fff; box-shadow: 2px 2px 10px 2px #fff; -webkit-box-shadow: 0px 0px 5px 0px #fff; font-size: .8em; line-height: 1.5em;">
        <!-- Jssor Slider Begin -->

            <div id="slider2_container" style="position: relative; margin: 0px 5px 5px 0px; float: left; top: 0px; left: 0px; width: 600px;
                height: 370px; overflow: hidden;">
                <!-- Slides Container -->
                <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 600px; height: 370px;
                    overflow: hidden;">
                    @foreach($sliders as $v_slider)
                    <div><img data-u="image" src="{{asset($v_slider->slider_image)}}" />
                        <div style="position:absolute;left:100px;top:230px;width:110px;height:40px;font-size:20px;color:#fff;line-height:40px;">{{$v_slider->title}}</div>

                    </div>
                    @endforeach




                </div>
                <!-- Trigger -->

            </div>
            <!-- Jssor Slider End -->

        </div>
                    </div>
                    </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <div class="row clearfix">

                            @foreach($gallerys as $v_gallery)
                            <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">
                                <div class="v_content1 photo_gallery">
                                    <div class="v_content_small_img gallery_img_style">
                                        <a href=""><img class="img-thumbnail" src="{{asset($v_gallery->gallery_image)}}" alt=""></a>
                                    </div>
                                    <p><a href="">{{$v_gallery->gallery_title}}</a></p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>



                </div>
            </div>
        </section>

        <section class="video-gallery">
            <div class="container" style="padding-bottom: 20px; padding-top: 20px;background-color: #fff;">
            <!--  <div class="row">
                    <div class="col-lg-12">
                        <h3 style="font-size: 19px;" class="block_title gallary_title">
                            <a href="#">ভিডিও</a>
                        </h3>
                    </div>
                </div> -->

                <div class="row">

                        <?php
                            $video_list = DB::table('videos')->take(6)->orderBy('id', 'DESC')->get();
                            foreach ($video_list as $v_video_list) {

                        ?>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">

                        <div class="video">
                                <a href=""><div id="headerPopup" class="mfp-hide embed-responsive embed-responsive-21by9">
                                <iframe class="embed-responsive-item" width="854" height="800" src="{{$v_video_list->video_link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div></a>
                            <h5 style="color: #000;">{{$v_video_list->video_title}}</h5>
                        </div>

                            </div>

                        <?php } ?>

                </div>
            </div>
        </section>

            </div>
            <style>

    .at-expanding-share-button-toggle-bg {
    display: none;
}
</style>
    @endsection
