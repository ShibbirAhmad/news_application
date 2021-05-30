@extends('admin.base')

@section('content')

 <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Post List</div>

            <div class="float-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#newCategory">New Post</button>
                    </div>
                    </div>

                    <div class="modal" id="newCategory">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Post</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                <form method="post" action="{{url('insert-menu')}}" enctype="multipart/form-data">
                         @csrf
                        <div class="modal-body">
                         
                          @include('admin.menu.menu_form')
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
                                    <th>Menu Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                    
                            <tbody id="menu_info">
                              <?php $count = 1;?>
                               @foreach($menus as $v_menu)
                               <tr>
                                 <td>{{$count++}}</td>
                                 <td>{{$v_menu->menu_name}}</td>
                                 <td>{{str_limit($v_menu->description, 100)}}</td>
                                 <td>
                                   <?php 

                                     if ($v_menu->menu_status == 1) {
                                      echo "Active";
                                     }elseif ($v_menu->menu_status == 2) {
                                      echo "In-Active";
                                     }  
                                    ?>
                                  </td>

                                   <td>
                                     <a href="{{url('delete-menu/'.$v_menu->id)}}"><i class="fa fa-trash"></i></a>
                                   </td>
                               </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

  <!--   Update Category Modal Form -->

<div class="modal" id="UpdateCategory">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form id="update_frm" method="post" action="{{url('update-category')}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="category_id" value="">
                    @include('admin.category.category_form')
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
    </div>

                            
@endsection



@push('scripts')

    

@endpush
