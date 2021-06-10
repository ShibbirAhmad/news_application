<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Welcome To Mohasagor News</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('admin/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('admin/assets/css/main.css')}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset('admin/assets/css/pages/auth-light.css')}}" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="{{url('/login')}}">ADMIN</a>
        </div>
        <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" type="email" name="email" placeholder="Email" required="" autocomplete="off">

                      @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>


            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required="" placeholder="Password">

                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>

            </div>

            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
            <div class="social-auth-hr">
                <span>Or login with</span>
            </div>
            <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div>
            <div class="text-center">Not a member?
                <a class="color-blue" href="register.html">Create accaunt</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{asset('admin/assets/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin/assets/vendors/jquery-validation/dist/jquery.validate.min.js')}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('admin/assets/js/app.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>