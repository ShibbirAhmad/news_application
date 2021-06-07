<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta http-equiv="pragma" content="no-cache">
   <meta name="description" content="">
   <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="khokon ahmed,Khorshed Alam,Softwarefirmbd.com, Online News Paper, Mohasagor.news, Mohasogor.com">

  <meta name="google-site-verification" content="qEjCtBYMthDf2bMyfSj95S9se4VLPGB-R3YOde4Yif4" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

   @yield('metatag')

  <!-- You can use open graph tags to customize link previews.-->

  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/images/logo/favicon.png')}}">

	<title>মহাদেশ</title>


	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css')}}">
  <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">

   <!-- Facebook Like And Shere  -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=317118652454335&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




  <script id="dsq-count-scr" src="//mohasagor-news.disqus.com/count.js" async></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129683045-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129683045-1');
</script>

<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!--<script>-->
<!--  (adsbygoogle = window.adsbygoogle || []).push({-->
<!--    google_ad_client: "ca-pub-3176370518050275",-->
<!--    enable_page_level_ads: true-->
<!--  });-->
<!--</script>-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129683045-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129683045-1');
</script>

<style>

  .at4-follow-container.addthis_24x24_style {
    display: none;
}
.sp-caption h2 {
    margin-bottom: -30px;
}
</style>

</head>
<body onload="digi()">


    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '310707446208617',
      xfbml      : true,
      version    : 'v3.2'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


       <!--  Header Section -->

   

     @include('frontend.inc.header')

     @yield('content')


       <!--  Footer Section -->

       @include('frontend.inc.footer')


    <script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/js-image-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/mohasagor.js')}}"></script>

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
