@extends('admin.base')

@section('content')

<form name="editform" method="post" action="{{url('update-post/'.$editbypost->post_id)}}" enctype="multipart/form-data">
                         @csrf

<div class="row">
  <div class="col-sm-12">
      <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" value="{{$editbypost->post_title}}">
      </div>
  </div>
 <?php
	       $sub_categories = DB::table('sub_categories')->where('status',1)->get();
	   ?>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="category_id">Category Name</label>
        <select class="form-control" name="category_id" id="category_id" required="">
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
		    	<option value="{{$sub_category->id}}"
              @if ($sub_category->id==$editbypost->sub_category_id)
               selected
            @endif
            >{{$sub_category->name}}</option>
		    	@endforeach
		    </select>
		  </div>
	     </div>

      <div class="col-sm-12">
      <div class="form-group">
        <label for="post_title">Short Description</label>
        <textarea class="form-control" id="short_description" name="short_description" rows="3" required="">{{$editbypost->short_description}}</textarea>
      </div>
  </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="post_title">Long Description</label>
        <textarea class="form-control" id="long_description" name="long_description" rows="3" required="">{{$editbypost->long_description}}</textarea>
      </div>
     </div>

     <div class="col-sm-6">
      <div class="form-group">
        <label for="post_title">Post Image</label>
        <input type="file" class="form-control" name="post_image">
        <input type="hidden" name="old_image" accept="image/*" value="{{$editbypost->post_image}}">
        <img src="{{asset($editbypost->post_image)}}" alt="">
      </div>
    </div>

    <div class="col-sm-6" id="promotion_image">
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

      <div class="form-group">
       <div class="add-image">
          <label>Add Image</label>
           <input type="file"  name="add_image" class="form-control" id="add_image" />

           <br>
           @if(!empty($editbypost->post_add_image))
            <img src="{{ asset($editbypost->post_add_image) }}" id="p_add_image" />

           @endif
              @if(empty($editbypost->post_add_image))
            <img src="" id="p_add_image" />

           @endif

            <div class="form-group">
             <label>Url</label>
           <input name="post_add_image_url" value="{{ $editbypost->add_image_url }}" type="text" class="form-control"/>
           </div>



       </div>
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
        <?php
          if ($editbypost->breaking_news == 1) { ?>
        <input type="checkbox" class="form-check-input" name="breaking_news" checked="checked" value="1"> breaking News
        <?php }else{ ?>
 <input type="checkbox" class="form-check-input" name="breaking_news" value="1"> breaking News
          <?php  } ?>
      </label>
    </div>
      </div>
       </div>


        <div class="col-sm-2">
      <div class="form-group">
        <label for="post_status">Latest News</label><br>
      <div class="form-check-inline">
      <label class="form-check-label">
        <?php
          if ($editbypost->latest_news == 1) { ?>

    <input type="checkbox" class="form-check-input" id="latest_news" name="latest_news" checked="checked" value="1"> Latest News

    <?php }else{ ?>
      <input type="checkbox" class="form-check-input" id="latest_news" name="latest_news" value="1"> Latest News
   <?php  } ?>
      </label>
    </div>
      </div>
       </div>

        <div class="col-sm-2">
      <div class="form-group">
        <label for="post_status" id="clickk">Cover News</label><br>
      <div class="form-check-inline">
      <label class="form-check-label">
        <?php
          if ($editbypost->cover_news == 1) { ?>

        <input type="checkbox" class="form-check-input" name="cover_news" checked="checked" value="1"> Cover News
         <?php }else{ ?>
    <input type="checkbox" class="form-check-input" name="cover_news" value="1"> Cover News
          <?php  } ?>
      </label>
    </div>
      </div>
       </div>

</div>

  <button type="submit" class="btn btn-info" id="update_news">Update</button>
  </form>

  <script>
    document.forms['editform'].elements['category_id'].value={{$editbypost->cat_id}}
    document.forms['editform'].elements['position'].value={{$editbypost->position}}
    document.forms['editform'].elements['post_status'].value={{$editbypost->post_status}}

    $(document).ready(function() {

      let element=document.getElementById('cke_1_top')
      console.log($("#cke_short_description").html(''))
    // let element=document.getElementById('cke_211_uiElement')
    // console.log(element);

    $("#add_image").on('change',function(e){


      let file=e.target.files[0];
      if (!file.type.match("image.*")) {
         Swal.fire({
          type:'warning',
          text:'this is not any kind of image',
        });
        return;
      }
       let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = (evt) => {
        let img = new Image();
        img.onload = () => {

          if (img.width <= 350 && img.height <= 950) {
            $("#p_add_image").attr('src',evt.target.result)
             $("#update_news").attr('disabled',false)
            return
          } else {
            $("#update_news").attr('disabled',true)
            alert("image max size 350*950px");
            console.log('jkhgnb');
            return;
          }
        };
        img.src = evt.target.result;
      };
    })
});

</script>

@endsection
