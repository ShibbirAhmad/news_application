@extends('admin.base')

@section('content')

    <div class="row">
        <div class="col-sm-12">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"> Sub Category List</div>

            <div class="float-right">
                <button class="btn btn-info" style="cursor: pointer" data-toggle="modal" data-target="#newCategory">New Sub Category</button>
                    </div>
                    </div>

                    <div class="modal" id="newCategory">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">New Sub Category</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form method="post" action="{{ route('sub_category_store') }}">
                        @csrf
                        <div class="modal-body">

                         @include('admin.category.sub_category_form')

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
                       @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>


                                </tr>
                            </thead>

                            <tbody id="category_info">

                                 @foreach($sub_categories as $key=>$sub_category)
                                <tr>

                                    <td>{{$key+1}}</td>
                                    <td>{{$sub_category->name}}</td>
                                    <td>{{$sub_category->category->category_name }}</td>

                                    <td>
                                        <?php
                                          if ($sub_category->status == 1) {

                                            echo "<span class='btn btn-success btn-xs'>active</span>";
                                          }elseif ($sub_category->cat_status == 2) {

                                             echo "<span class='btn btn-danger btn-xs'>de-active</span>";
                                          }?>
                                    </td>

                                    <td>

                                     <a class="btn btn-sm btn-success" title="Update Category" href="" data-toggle="modal" id="edit" data-category_id="{{$sub_category->id}}"><i class="fa fa-edit"></i></a>

                                <a class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure To Delete This !')" href="{{url('sub_category/delete/item/'.$sub_category->id.'/delete')}}"><span class="fa fa-trash"></span>
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
                <h4 class="modal-title">Update  Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="update_frm" method="post" action="{{url('update-category')}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="category_id" value="">
                    @include('admin.category.sub_category_form')
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
            var category_id = $(this).data('category_id');

           $.get('{{ url('sub_category/edit/item') }}/' + category_id, function(data) {

           $('#update_frm').find('#category_name').val(data.category_name);
           $('#update_frm').find('#cat_status').val(data.cat_status);
           $('#update_frm').find('#category_id').val(data.category_id);
           $('#update_frm').find('#category_position').val(data.category_position);

             $('#UpdateCategory').modal('show');
        });

        });

    </script>

@endpush