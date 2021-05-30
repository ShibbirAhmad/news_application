@extends('admin.base')

@section('content')
	
    <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Gallery List</div>

            <div class="float-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#newCategory">New Gallery</button>
                    </div>
                    </div>

                    <div class="modal" id="newCategory">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Gallery</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <form method="post" action="{{url('insert-gallery')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                         
                         @include('admin.gallery.gallery_form')
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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                    
                                </tr>
                            </thead>
                    
                            <tbody id="gallery_info">
                              <?php $count = 1;?>
                                @foreach($gallerys as $v_gallery)
                                <tr>
                                  <td>{{$count++}}</td>
                                  <td>{{$v_gallery->gallery_title}}</td>
                                  <td><img src="{{asset($v_gallery->gallery_image)}}" alt="" width="120" height="50"></td>
                                  <td>
                                    <?php
                                      if ($v_gallery->gallery_status == 1) {
                                        echo "Published";
                                      }elseif ($v_gallery->gallery_status == 2) {
                                        echo "Un-Published";
                                      }
                                    ?>
                                  </td>
                                  <td>
                                    <a title="Update Gallery" href="{{url('edit-gallery/'.$v_gallery->id)}}"><i class="fa fa-edit"></i></a>

                                    <a onclick="return confirm('Are You Sure To Delete')" href="{{url('delete-gallery/'.$v_gallery->id)}}"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

  <!--   Update Category Modal Form -->
      
       <div class="modal" id="UpdateGallery">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Gallery</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <form method="post" action="{{url('insert-gallery')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                         
                         @include('admin.gallery.gallery_form')
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

    </div>

                            
@endsection



