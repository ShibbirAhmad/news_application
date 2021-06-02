@extends('admin.base')

@section('content')

          <div class="row">
              <div class="col-md-4"> </div>
              <div class="col-md-4">
                   <div style="background:#ffff" class="box">
                    <div class="box-body">
                <form id="update_frm" method="post" action="{{url('advertisement/update/'.$advertise->id)}} " enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                      <div class="form-group">
                                <label for="url">url</label>
                                <input type="text" class="form-control" required name="url" value="{{ $advertise->url }}" placeholder="Advertise Link">
                          </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required >
                                    <option value="" >-- Select Status --</option>
                                    <option value="1" @if ($advertise->status==1)
                                       selected
                                    @endif>Active</option>

                                    <option value="0" @if ($advertise->status==0)
                                       selected
                                    @endif>De-Active</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                           <div class="form-group">
                                <label for="image">advertise Banner</label>
                                 <input class="form-control" type="file" name="image" >
                          </div>
                                </div>
                                <div class="col-md-6">
                                    <img class="banner_img" src="{{ asset('storage/'.$advertise->image) }}" alt="">
                                </div>
                            </div>
                          <div class="form-group text-center">
                                 <button type="submit" class="btn btn-info">Update</button>
                          </div>
                </div>

            </form>
                     </div>
                   </div>

                   <div class="box-body">

                   </div>
             </div>
              <div class="col-md-4"> </div>
          </div>



          @endsection



@push('scripts')

    <script type="text/javascript">



@endpush