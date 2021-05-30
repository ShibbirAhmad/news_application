@extends('admin.base')

@section('content')
	
    <div class="row">
        <div class="col-sm-6">
           
           <form name="editform" method="POST" action="{{url('update-gallery/'.$editbyid->id)}}" enctype="multipart/form-data">
           	@csrf
			  <div class="form-group">
    <label for="gallery_title">Title</label>
    <input type="text" class="form-control" id="gallery_title" name="gallery_title" value="{{$editbyid->gallery_title}}">
  </div>

   <div class="form-group">
    <label for="gallery_title">Gallery Image</label>
    <input type="file" class="form-control" name="gallery_image">
    <input type="hidden" name="old_image" value="{{$editbyid->gallery_image}}">
    <img src="{{asset($editbyid->gallery_image)}}" alt="" height="100" width="250">
  </div>

   <div class="form-group">
    <label for="status">Status</label>
     <select class="form-control" id="gallery_status" name="gallery_status" required="">
     	<option value="">-- Select Status --</option>
     	<option value="1">Published</option>
     	<option value="2">Un-Published</option>
     </select>
  </div>

   <button class="btn btn-info" type="submit">Update</button>
         </form>

	</div>
</div>
 <script>
    document.forms['editform'].elements['gallery_status'].value={{$editbyid->gallery_status}}
</script>
 @endsection