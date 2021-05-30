@extends('admin.base')

@section('content')
	
    <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">User List</div>

            <div class="float-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#newCategory">New User</button>
                    </div>
                    </div>

                    <div class="modal" id="newCategory">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New User</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <form method="post" action="{{url('insert-user')}}">
                        @csrf
                        <div class="modal-body">
                         
                         @include('admin.auth.user_form')
                        </div>
                        
                        <!-- Modal footer -->
                    <div class="modal-footer">
                 <button type="submit" class="btn btn-info">Submit</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </form>
                        
                      </div>
                    </div>
                  </div>
                   
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>User type</th>
                                    <th>Action</th>
                                    
                                    
                                </tr>
                            </thead>
                    
                            <tbody id="user_info">
                                      
                                      @php $count = 1 @endphp
                                    @foreach($users as $v_user)
                                  <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$v_user->name}}</td>
                                    <td>{{$v_user->email}}</td>
                                    <td>
                                      @if($v_user->user_status == 1)
                                         <button class="btn btn-success btn-sm">Active</button>
                                        @elseif ($v_user->user_status == 2)
                                          <button class="btn btn-danger btn-sm">In-Active</button>
                                        
                                      @endif
                                    </td>

                                     <td>
                                      @if($v_user->user_type == 1)
                                         <button class="btn btn-success btn-sm">Admin</button>
                                        @elseif ($v_user->user_type == 2)
                                          <button class="btn btn-info btn-sm">Editor</button>
                                           @elseif ($v_user->user_type == 3)
                                          <button class="btn btn-warning btn-sm">Author</button>
                                        
                                      @endif
                                    </td>
                                    <td>
                                    
                                    <a title="Update User" href="{{url('edit-user/'.$v_user->id)}}"><i class="fa fa-edit"></i></a>
                                      <a onclick="return confirm('Are you Sure To Delete');" href="{{url('/delete-user/'.$v_user->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>

                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>


                            
@endsection
