@extends('admin.base')

@section('content')

 <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Slider List</div>

            <div class="float-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#newCategory">New Slider</button>
                    </div>
                    </div>

                    <div class="modal" id="newCategory">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Slider</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <form method="post" action="{{url('insert-slider')}}" enctype="multipart/form-data">
                         @csrf
                        <div class="modal-body">
                         
                          @include('admin.slider.slider_form')
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
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                    
                            <tbody id="slider_info">
                              <?php $count = 1;?>
                              	@foreach($sliders as $v_sliders)
                              	<tr>
                                  <td>{{$count++}}</td>
                                  <td>{{$v_sliders->title}}</td>
                                  <td><img src="{{asset($v_sliders->slider_image)}}" alt="" width="100px" height="40px"></td>

                                   <td>
                                      <a title="Update Slider" href="{{url('edit-slider/'.$v_sliders->id)}}"><i class="fa fa-edit"></i></a>

                                     <a onclick="return confirm('Are You Sure To Delete')" href="{{url('delete/'.$v_sliders->id.'/slider')}}"><i class="fa fa-trash"></i></a>
                                   </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

  <!--   Update Category Modal Form -->

    </div>

                            
@endsection



