    @extends('frontend.master')

    @section('content')


    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">

        <div class="row text-center ">
            <div class="col-lg-3 col-md-3 col-sm-3 "> </div>
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <div class="card2 card border-0 px-4 py-3">
                    <div class="row mb-4 px-3 text-center">
                        <div class="register_logo">
                               <a href="{{url('/')}}">
                              <img src="{{ asset('images/login_logo.png') }}" alt="">
                                </a>
                         </div>
                    </div>
                    <div class="row px-3 mb-5">

                    </div>

                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Name </h6>
                        </label> <input class="mb-4" type="text" required  name="name" placeholder="Ex: Mohammad">
                    </div>

                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> <input class="mb-4" type="email" required  name="email" placeholder="user@gmail.com">
                    </div>

                     <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password"  required name="password" placeholder="Enter password">
                     </div>

                    <div class="row mb-3 px-3 ">
                        <button type="submit" class="btn btn-info btn-block ">Register</button>
                    </div>

                    <div class="row mb-4 px-3"> <small class="font-weight-bold">If have an account? <a href="{{ route('end_user_login') }}" class="text-danger ">Login</a></small> </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 "> </div>
        </div>

</div>

    @endsection
