@extends('admin.base')

@section('content')
	
    <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Breaking News List</div>

            <div class="float-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#newCategory">New Breaking News</button>
                    </div>
                    </div>

                    <div class="modal" id="newCategory">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Breaking News</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <form method="post" action="{{url('insert-breaking-news')}}">
                        @csrf
                        <div class="modal-body">
                         
                         @include('admin.others.breaking_news_form')
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
                                    <th>Breaking News</th>
                                    <th>Post Date</th>
                                    <th>Status</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    
                                    
                                </tr>
                            </thead>
                    
                            <tbody id="barkeing-news">
                                <?php $count = 1;?>
                                @foreach($breakings as $v_breaking)
                                 <tr>
                                   <td>{{$count++}}</td>
                                   <td>{{str_limit($v_breaking->breaking_news_name, 70)}}</td>
                                   <td>{{$v_breaking->ber_cur_date}}</td>
                                   <td>
                                     <?php
                                       if ($v_breaking->ber_status == 1) { ?>
                                         
                                     <a title="breaking news off" href="{{url('/breaking-news-off/'.$v_breaking->breakingnew_id)}}" class="btn btn-success btn-xs">ON</a>

                                      <?php }elseif ($v_breaking->ber_status == 2) { ?>
                                         <a title="breaking news on" href="{{url('/breaking-news-on/'.$v_breaking->breakingnew_id)}}" class="btn btn-danger btn-xs">OFF</a>
                                      <?php } ?>
                                      
                                   </td>
                                   <td>{{$v_breaking->name}}</td>
                                   <td>
                                     
                                    <a title="Update Barkeing News" href="{{url('breaking-news-edit/'.$v_breaking->breakingnew_id) }}" data-toggle="modal" id="editbreaking" data-breakingnew_id="{{$v_breaking->breakingnew_id}}"><i class="fa fa-edit"></i></a>
                                    
                                    <a title="Delete Barkeing News" onclick="return confirm('Are You Sure To Delete This !')" href="{{url('breaking-news/'.$v_breaking->breakingnew_id.'/delete') }}" {{$v_breaking->breakingnew_id}}"><i class="fa fa-trash"></i></a>

                                   </td>
                                 </tr>
                                 @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

  <!--   Update Category Modal Form -->

<div class="modal" id="UpdateBreaking">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Breaking News</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form id="update_frm" method="post" action="{{url('update-breaking-news')}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="breakingnew_id" id="breakingnew_id" value="">

                   @include('admin.others.breaking_news_form')

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

   $('#barkeing-news').delegate('#editbreaking', 'click', function(){
            var breakingnew_id = $(this).data('breakingnew_id');

           $.get('{{ url('breaking-news-edit') }}/' + breakingnew_id, function(data) {

           $('#update_frm').find('#breaking_news_name').val(data.breaking_news_name);
           $('#update_frm').find('#ber_status').val(data.ber_status);
           $('#update_frm').find('#breakingnew_id').val(data.breakingnew_id);
             $('#UpdateBreaking').modal('show');
        });
        
        });

    </script>

@endpush