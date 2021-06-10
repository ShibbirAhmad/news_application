  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
       <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

  </div>

  <div class="form-group">
    <label for="password">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
     <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
  </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
     <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
  </div>

   <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Your Confirm Password">
     <span id='message'></span>
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

  <script type="text/javascript">
    $('#password, #password_confirmation').on('keyup', function () {
  if ($('#password').val() == $('#password_confirmation').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Password Not Matching').css('color', 'red');
});
  </script>