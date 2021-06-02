<section class="topbar-three">
        <div class="container heder_container">
            <div class="row header_row" >
                <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="row">
                       <div class="col-md-4">

                        <div class="day_container">
                            <button class="btn   "><i class="fa fa-bars desktom_view_menu_icon" aria-hidden="true"></i></button>
                        <a href="{{url('/')}}">{{bn_date(date('d M Y, l'))}}
                           <span><script type="text/javascript"
                          src="http://bangladate.appspot.com/index2.php"></script>
                        </span></a>

                         </div>


                      </div>
                       <div class="col-md-2 text-center">
                         <div class="home-logo">
                               <a href="{{url('/')}}">
                              <img src="{{asset('frontend/images/logo/logo.png')}}" alt="">
                                </a>
                           </div>
                        </div>
                       <div class="col-md-4">
                         <!--header-address-->
                            <div class="header-search">
                                <form method="get" action="{{url('news-search')}}">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="news"  placeholder="খবর অনুসন্ধান করুন">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                                <h5 class="text-center" style="color: red">{{Session::get('warning')}}</h5>
                            </div>
                     </div>
                     <div class="col-md-2 col-sm-2">
                         <button class="btn login_button "><a href="{{ route('end_user_login') }}">Login</a></button>
                     </div>

                </div>

                </div>

            </div>
        </div>
    </section>

	<div class="container-fluid navbar_container "  >
   <div class="container ">
  <nav class="navbar navbar-expand-lg navbar-light bg-light" data-toggle="sticky-onscroll">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto navbar-style">

      {{-- <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">হোম</a>
      </li> --}}

       <?php

            //filtering category
      $category_position_count = DB::table('categorys')->where('cat_status', 1)->sum('category_position');
      if($category_position_count > 0){
           $all_menus=DB::table('categorys')->orderBy('category_position','DESC')->take(12)->get();
      }else{

            $most_view_posts_categories=DB::table('posts')
                                    ->orderBy('popular_news','desc')
                                    ->take(50)
                                    ->select('cat_id',DB::raw('count(*) as id'))
                                    ->groupBy('cat_id')->pluck('cat_id') ;
            $all_menus=DB::table('categorys')->whereIn('category_id',$most_view_posts_categories)->take(12)->get();
      }


              foreach ($all_menus as $value) {

         ?>
      <li class="nav-item">
        <a class="nav-link" style="color: #000;" href="{{url('/moshadesh/category/'.$value->category_id.'/'.$value->category_name)}}">{{$value->category_name}}</a>
      </li>
          <?php } ?>


        <li class="nav-item">
        <a class="nav-link" style="color: #000;"  href="https://mohasagor.com/" target="_blank"> শপিং</a>
      </li>

       <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="color: #000;"  href="#" id="navbardrop" data-toggle="dropdown">
        আরো
      </a>
      <div class="dropdown-menu hello">
         <?php
            $catid = [1,2,3,4,5,6,7,8,9,10];
            $subcategory = DB::table('categorys')->where('cat_status', 1)->whereNotIn('category_id', $catid)->get();
            foreach ($subcategory as $v_sub) {


           ?>
        <a class="nav-link wrold" href="{{url('/moshadesh/category/'.$v_sub->category_id.'/'.$v_sub->category_name)}}">{{$v_sub->category_name}}</a>

    <?php } ?>

      </div>
    </li>

    </ul>
  </div>
</nav>

</div>
</div>


