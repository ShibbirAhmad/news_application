@extends('admin.base')

@section('content')

    <div class="row">
        <div class="col-sm-6">
	<form method="post" action="{{url('update-slider/'.$editbyid->id)}}" enctype="multipart/form-data">
		@csrf
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name="title" value="{{$editbyid->title}}">
		  </div>
	
		  <div class="form-group">
		    <label for="image">Image</label>
		    <input type="file" class="form-control" id="slider_image" name="slider_image">
		    <input type="hidden" name="old_image" value="{{$editbyid->slider_image}}">
		    <img src="{{asset($editbyid->slider_image)}}" alt="" width="300" height="150">
		  </div>
	
	  <button type="submit" class="btn btn-info">Update</button>
</form>
</div>

</div>
@endsection