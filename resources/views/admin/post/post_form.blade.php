<div class="row">
	<div class="col-sm-12">
		  <div class="form-group">
		    <label for="post_title">Post Title</label>
		    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Post Title" required="">
		  </div>
	</div>
      <?php
	       $sub_categories = DB::table('sub_categories')->where('status',1)->get();
	   ?>
		<div class="col-sm-6">
		  <div class="form-group">
		    <label for="category_id">Category Name</label>
		    <select  class="form-control" name="category_id" id="category_id" required="">
		    	<option value="">--Select Category --</option>
		    	@foreach($categorys as $v_data)
		    	<option value="{{$v_data->category_id}}">{{$v_data->category_name}}</option>
		    	@endforeach
		    </select>
		  </div>
	     </div>

		<div class="col-sm-6">
		  <div class="form-group">
		    <label for="category_id">Sub Category </label>
		    <select class="form-control" name="sub_category_id" id="sub_category_id" >
		    	<option value="">--Select Sub Category --</option>
		    	@foreach($sub_categories as $sub_category)
		    	<option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
		    	@endforeach
		    </select>
		  </div>
	     </div>

			<div class="col-sm-12">
		  <div class="form-group">
		    <label for="post_title">Short Description</label>
		    <textarea class="form-control" id="short_description" name="short_description" rows="3" required=""></textarea>
		  </div>
	</div>

		<div class="col-sm-12">
		  <div class="form-group">
		    <label for="post_title">Long Description</label>
		    <textarea class="form-control" id="long_description" name="long_description" rows="3" required=""></textarea>
		  </div>
	   </div>

	   <div class="col-sm-6">
		  <div class="form-group">
		    <label for="post_title">Post Image</label>
		    <input type="file" class="form-control" name="post_image" required="">


		  </div>
	  </div>

		<div class="col-sm-6">
		  <div class="form-group">
		    <label for="position">Position</label>
		    <select class="form-control" name="position" id="position">
		    	<option value="">--Select Position --</option>
		    	<option value="1">1</option>
		    	<option value="2">2</option>
		    	<option value="3">3</option>
		    	<option value="4">4</option>
		    	<option value="5">5</option>
		    	<option value="6">6</option>
		    	<option value="7">7</option>
		    	<option value="8">8</option>
		    	<option value="9">9</option>
		    	<option value="10">10</option>
		    	<option value="11">11</option>
		    	<option value="12">12</option>
		    	<option value="13">13</option>
		    	<option value="14">14</option>
		    	<option value="15">15</option>
		    	<option value="16">16</option>
		    	<option value="17">17</option>
		    </select>
		  </div>
	     </div>

			<div class="col-sm-3">
		  <div class="form-group">
		    <label for="post_status">Status</label>
		    <select class="form-control" name="post_status" id="post_status" required="">
		    	<option value="">--Select Status --</option>
		    	<option value="1">Published</option>
		    	<option value="2">Un-Published</option>
		    </select>
		  </div>
	     </div>

	        <div class="col-sm-3">
		  <div class="form-group">
		    <label for="post_status">breaking News</label><br>
		 	<div class="form-check-inline">
		  <label class="form-check-label">
		    <input type="checkbox" class="form-check-input" name="breaking_news" value="1"> breaking News
		  </label>
		</div>
		  </div>
	     </div>

	     	<div class="col-sm-2">
		  <div class="form-group">
		    <label for="post_status">Latest News</label><br>
		 	<div class="form-check-inline">
		  <label class="form-check-label">
		    <input type="checkbox" class="form-check-input" id="latest_news" name="latest_news" value="1"> Latest News
		  </label>
		</div>
		  </div>
	     </div>

	     	<div class="col-sm-2">
		  <div class="form-group">
		    <label for="post_status">Cover News</label><br>
		 	<div class="form-check-inline">
		  <label class="form-check-label">
		    <input type="checkbox" class="form-check-input" name="cover_news" value="1"> Cover News
		  </label>
		</div>
		  </div>
	     </div>



</div>