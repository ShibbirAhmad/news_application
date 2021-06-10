    @extends('frontend.master')

    @section('content')


    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-2 mx-auto">

        <div class="row text-center ">
            <div class="col-lg-3 col-md-3 col-sm-3 "> </div>
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <div class="card2 card border-0 px-4 py-3">
                    <div class="row mb-3 px-3">
                          <div class="register_logo">
                               <a href="{{url('/')}}">
                              <img src="{{ asset('images/login_logo.png') }}" alt="">
                                </a>
                         </div>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                    </div>
                    <div class="row px-3 mb-5">

                    </div>
                    <form action="{{ route('blog_user_login') }}" method="POST">
                        @csrf
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> <input class="mb-4" type="text" name="email"  placeholder="Enter your email"> </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password" name="password"  required placeholder="Enter password"> </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>
                    <div class="row mb-3 px-3">
                        <div class="col-md-5 col-sm-5">
                                <button type="submit" class="btn btn-blue text-center">Login</button>
                        </div>
                    </form>

                        <div class="col-md-7 col-sm-7">
                             <div class="socilate_login">
                                  <h6 class="mt-2 mr-3" >Sign in with</h6>
                                <div class="facebook text-center mr-3">
                                    <div class="fa fa-facebook"></div>
                                </div>
                                <div class="linkedin text-center mr-3">
                                    <div class="fa fa-google"></div>
                                </div>
                             </div>
                        </div>


                    </div>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a href="{{ route('end_user_register') }}" class="text-danger ">Register</a></small> </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 "> </div>
        </div>

</div>

    @endsection
