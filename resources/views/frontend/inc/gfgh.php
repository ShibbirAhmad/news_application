  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container" style="padding-left: 0px;padding-right: 0px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
                <a href="#" class="menu-toggle full abcd"><i class="fa fa-bars"></i> মেনু </a>
            </button>
            <div class="collapse navbar-collapse" id="mainMenu">
           
                <ul class="navbar-nav" style="margin-right: auto">
                    <li><a href="{{url('/')}}" class="nav-link">হোম</a></li>
                         <?php 

                    $all_menus = DB::table('categorys')->where('cat_status', 1)->take(12)->get();
                    foreach ($all_menus as $value) {
                     
                 ?>
                    <li><a href="{{url('/moshadesh/category/'.$value->category_id.'/'.$value->category_name)}}"  class="nav-link">{{$value->category_name}}</a></li>
                      <?php } ?>

                </ul>
          
             <!--    <ul class="navbar-nav">
                    <li><a style="background: #000;" href="#" class="nav-link">English Hightlights</a></li>
                    <li style="width: 20px; height: 41px; background: #FF4D03;"></li>
                </ul> -->
            </div>
        </div>
    </nav>
