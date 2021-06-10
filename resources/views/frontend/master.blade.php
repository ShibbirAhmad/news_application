<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta http-equiv="pragma" content="no-cache">
   <meta name="description" content="">
   <meta name="keywords" content="News,Blog,business">

  <meta name="viewport" content="width=device-width, initial-scale=1">

   @yield('metatag')

  <!-- You can use open graph tags to customize link previews.-->

  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/images/logo/favicon.png')}}">

	<title>মহাদেশ</title>


	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">



<style>

  .at4-follow-container.addthis_24x24_style {
    display: none;
}
.sp-caption h2 {
    margin-bottom: -30px;
}
</style>

</head>
<body >



       <!--  Header Section -->



     @include('frontend.inc.header')

     @yield('content')


       <!--  Footer Section -->

       @include('frontend.inc.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

    @yield('extra_js')
  <div class="gotoup">
   <i class="fa fa-angle-up" aria-hidden="true"></i>
  </div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fab8a7bc7716feb"></script>

  <script type="text/javascript">
     $(window).scroll(function() {
        if ($(this).scrollTop() > 300 ) {
            $('.gotoup').fadeIn();
        }else{
            $('.gotoup').fadeOut();
        }
        });
        $('.gotoup').click(function() {
          $("html, body").animate({scrollTop:0}, 200)
        });

  </script>

</body>
</html>
