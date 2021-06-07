@extends('admin.base')

@section('content')
 <div class="row">
 	<div class="col-sm-6">
 		<form id="editform" method="post" action="{{url('update-user/'.$editbyid->id)}}">
 			@csrf
 		 <div class="form-group">
		 <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$editbyid->name}}">
       <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

  </div>

  <div class="form-group">
    <label for="password">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$editbyid->email}}">
     <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
  </div>
  
   <div class="form-group">
    <label for="user_status">Status</label>
     <select class="form-control" id="user_status" name="user_status" required="">
     	<option value="">-- Select Status --</option>
     	<option value="1">Active</option>
     	<option value="2">Inactive</option>
     </select>
  </div>


   <div class="form-group">
    <label for="user_type">User Type</label>
     <select class="form-control" id="user_type" name="user_type" required="">
      <option value="">-- Select User Type --</option>
      <option value="1">Admin</option>
      <option value="2">Editor</option>
      <option value="3">Author</option>
     </select>
  </div>
     <button class="btn btn-info" type="submit">Update</button>
     </form>
 	</div>
      
 </div>

 <script>
    document.forms['editform'].elements['user_status'].value={{$editbyid->user_status}}
    document.forms['editform'].elements['user_type'].value={{$editbyid->user_type}}
</script>



@endsection