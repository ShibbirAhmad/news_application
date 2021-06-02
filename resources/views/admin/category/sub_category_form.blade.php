  <div class="form-group">
    <label for="name"> Name</label>
    <input type="text" class="form-control" id="category_name" name="name" placeholder="Sub Category Name">
  </div>
   <?php
    $categories=DB::table('categorys')->where('cat_status',1)->get();
   ?>
   <div class="form-group">
    <label for="status">Select Category </label>
     <select class="form-control" name="c_id" required >
          <option value="">-- Select Category --</option>
          @foreach ($categories as $item)
              <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
          @endforeach
     </select>
  </div>

      <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="cat_status" name="status" required >
                <option value="" >-- Select Status --</option>
                <option value="1">Active</option>
                <option value="0">De-Active</option>
            </select>
        </div>