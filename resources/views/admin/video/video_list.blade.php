@extends('admin.base')

@section('content')

 <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Video List</div>

            <div class="float-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#newVideo">New Video</button>
                    </div>
                    </div>

                    <div class="modal" id="newVideo">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Video</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <form method="post" action="{{url('insert-video')}}">
                         @csrf
                        <div class="modal-body">
                         
                         <div class="col-sm-12">
                        <div class="form-group">
                          <label for="video_link">Video Link</label>
                          <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Video Link" required="">
                        </div>
                         </div>

                         <div class="col-sm-12">
                        <div class="form-group">
                          <label for="video_title">Video Title</label>
                          <input type="text" class="form-control" id="video_title" name="video_title" placeholder="Video Title" required="">
                        </div>
                         </div>

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
                                    <th>Video Link</th>
                                    <th>Video Title</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                    
                            <tbody id="video_info">
                              	<?php $i = 1;?>
	                               	@foreach($video_list as $v_video)
                                  <tr>
                                    <td>{{$i++}}</td>
                                    <td><iframe class="embed-responsive-item" width="200" height="100" src="{{$v_video->video_link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
                                    <td>
                                      {{$v_video->video_title}}
                                    </td>
                                    <td>
                                       <a title="Update Video" href="" data-toggle="modal" id="edit" data-id="{{$v_video->id}}"><i class="fa fa-edit"></i></a>

                                       <a onclick="return confirm('Are You Sure To Delete')" title="Delete Video" href="{{url('/delete-video/'.$v_video->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

 
          <div class="modal" id="UpdateVideo">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Update Video</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <form id="update_frm" method="post" action="{{url('update-video')}}">
                         @csrf
                        <div class="modal-body">
                         
                         <div class="col-sm-12">
                        <div class="form-group">
                          <label for="video_link">Video Link</label>
                          <input type="hidden" id="id" name="id" value="">
                          <input type="text" class="form-control" id="video_link" name="video_link" value="">
                        </div>
                    </div>

                     <div class="col-sm-12">
                        <div class="form-group">
                          <label for="video_title">Video Title</label>
                          <input type="text" class="form-control" id="video_title" name="video_title" placeholder="Video Title" required="">
                        </div>
                         </div>
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

    <script type="text/javascript">

   $('#video_info').delegate('#edit', 'click', function(){
            var id = $(this).data('id');

            $.get('{{ url('video-edit') }}/' + id, function(data) {

              $('#update_frm').find('#video_link').val(data.video_link);
              $('#update_frm').find('#video_title').val(data.video_title);
              $('#update_frm').find('#id').val(data.id);
              $('#UpdateVideo').modal('show');

                });
        
             
    
        
        });

    </script>

@endpush

