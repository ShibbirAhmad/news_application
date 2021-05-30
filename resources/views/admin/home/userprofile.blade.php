@extends('admin.base')

@section('content')
    
   
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Prifile Update</div>
                             	     <h3 class="text-center" style="color: red">{{Session::get('warning')}}</h3>
              <h3 class="text-center" style="color: blue">{{Session::get('success')}}</h3>
                            </div>
                            <div class="ibox-body">
                                <form  action="{{ url('profile-update/'.$profiles->id) }}" method="POST">
                                	 @csrf
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="{{$profiles->name}}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email" value="{{$profiles->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input class="form-control" type="password" name="oldpassword" placeholder="Old Password">
                                         @if ($errors->has('oldpassword'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                     <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" name="newpassword" placeholder="New Password">
                                          @if ($errors->has('newpassword'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-info" name="btn" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        
@endsection