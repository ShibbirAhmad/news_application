@extends('admin.base')

@section('content')

    <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"> Advertisement List</div>

            <div class="float-right">
                <button class="btn btn-info" style="cursor: pointer" data-toggle="modal" data-target="#newAdvertise">New Addvertise</button>
                    </div>
                    </div>

                    <div class="modal" id="newAdvertise">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Advertise </h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form method="POST" action="{{route('advertisement_store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                          <div class="form-group">
                                <label for="url">url</label>
                                <input type="text" class="form-control" required name="url" placeholder="Advertise Link">
                          </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="cat_status" name="status" required >
                                    <option value="" >-- Select Status --</option>
                                    <option value="1">Active</option>
                                    <option value="0">De-Active</option>
                                </select>
                            </div>


                           <div class="form-group">
                                <label for="image">advertise Banner</label>
                                 <input required type="file" name="image" class="form-control" >
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
                                    <th>#</th>
                                    <th>URL</th>
                                    <th>Image</th>
                                    <th>Click</th>
                                    <th>Status</th>
                                    <th>Action</th>


                                </tr>
                            </thead>

                            <tbody id="category_info">
                                 @foreach($advertisements as $key=>$advertise)
                                <tr>

                                    <td>{{$key++}}</td>
                                    <td>{{$advertise->url}}</td>
                                    <td>
                                         <img src="{{ asset($advertise->image) }}" alt="add image"/>
                                    </td>
                                      <td>  {{ $advertise->click_count }} </td>
                                         <td>

                                        <?php
                                          if ($advertise->status == 1) {

                                            echo "<span class='btn btn-success btn-xs'>Active</span>";
                                          }elseif ($advertise->status == 0) {

                                             echo "<span class='btn btn-danger btn-xs'>DeActive</span>";
                                          }?>
                                    </td>

                                    <td>

                                     <a title="Update Category" href="{{ url('advertisement/edit/item/'.$advertise->id) }}" class="btn btn-success btn-sm"  ><i class="fa fa-edit"></i></a>

                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete This !')" href=" {{url('advertisement/delete/item/'.$advertise->id) }} "><span class="fa fa-trash"></span>

                                    </a>
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
                <h4 class="modal-title">Update Advertise</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="update_frm" method="post" action="{{url('update-category')}}">
                @csrf
                <div class="modal-body">
                      <div class="form-group">
                                <label for="url">url</label>
                                <input type="text" class="form-control" required name="url" id="url" placeholder="Advertise Link">
                          </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required >
                                    <option value="" >-- Select Status --</option>
                                    <option value="1">Active</option>
                                    <option value="0">De-Active</option>
                                </select>
                            </div>


                           <div class="form-group">
                                <label for="image">advertise Banner</label>
                                 <input required type="file" name="image" required>
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

   $('#category_info').delegate('#edit', 'click', function(){
            var id = $(this).data('id');


        });

    </script>

@endpush