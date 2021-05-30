@extends('admin.base')

@section('content')
               <div class="ibox">
                   <div class="container">
                   <div class="row">
                       <div class="col-lg-12">
                    <div class="ibox-head">
                        <div class="col-lg-3">
                        <div class="ibox-title">Post List</div>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-4">
                            <form method="get" action="{{ url('filterbycategory') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <select class="form-control" name="category_id" id="category_id" required="" style="padding:inherit;">
                                            <option value="">--Select Category --</option>
                                            @foreach($categorys as $v_data)
                                                <option value="{{$v_data->category_id}}">{{$v_data->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                      <div class="col-lg-4">
                                <input type="submit" class="btn btn-success" value="Filter" style="margin-left: -20px;">
                                    </div>
                                </div>
                              </form>
                           </div>
                         <div class="col-lg-2">
                        <button class="btn btn-info" data-toggle="modal" data-target="#newCategory">Create New Post</button>
                      </div>
                    </div>

                    </div>
                       </div>
                   </div>
                   </div>

                  <div class="modal" id="newCategory">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Create New Post</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form method="post" action="{{url('insert-post')}}" enctype="multipart/form-data">
                         @csrf
                        <div class="modal-body">

                         @include('admin.post.post_form')
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
                                    <th>SL</th>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <!--<th>Short Description</th>-->
                                    <!--<th>Long Description</th>-->
                                    <th>Image</th>
                                    <th>Position</th>
                                    <th>Hitcount</th>
                                    <th>L.News</th>
                                    <th>C.News</th>
                                    <th>B.News</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody id="post_info">

                              	<?php $count = 1;?>
                              	@foreach($posts as $v_post)

              								 <tr>
              								 	<td>{{$count++}}</td>
              								 	<td>{{$v_post->post_title}}</td>
              								 	<td>{{$v_post->category_name}}</td>
              								 	<!--<td>{{str_limit($v_post->short_description,30)}}</td>-->
              								 	<!--<td>{{str_limit($v_post->long_description, 30)}}</td>-->
              								 	<td><img src="{{asset($v_post->post_image)}}" alt="" width="100" height="50"></td>
                                <td>{{$v_post->position}}</td>
                                <td>{{$v_post->popular_news}}</td>
                                <td>

                                   <?php
                                    if($v_post->latest_news){ ?>
                                    <a title="Latest News No" href="{{url('latest-news-no/'.$v_post->post_id)}}"><span class="btn btn-success btn-sm">Yes</span></a>
                                   <?php  }elseif($v_post->latest_news == NULL){ ?>
                                    <a title="Latest News Yes" href="{{url('latest-news-yes/'.$v_post->post_id)}}"><span class="btn btn-warning btn-sm">No</span></a>
                                    <?php } ?>

                                </td>

                                   <td>

                                   <?php
                                    if($v_post->cover_news){ ?>
                                   <a title="Cover News No" href="{{url('cover-news-no/'.$v_post->post_id)}}"><span class="btn btn-success btn-sm">Yes</span></a>
                                   <?php  }elseif($v_post->cover_news == NULL){ ?>
                                    <a title="Cover News Yes" href="{{url('cover-news-yes/'.$v_post->post_id)}}"><span class="btn btn-danger btn-sm">No</span></a>
                                    <?php } ?>

                                </td>

                                   <td>

                                   <?php
                                    if($v_post->breaking_news){ ?>
                                     <a title="Breaking News No" href="{{url('breaking-news-no/'.$v_post->post_id)}}"><span class="btn btn-success btn-sm">Yes</span></a>
                                   <?php  }elseif($v_post->breaking_news == NULL){ ?>
                                   <a title="Breaking News Yes" href="{{url('breaking-news-yes/'.$v_post->post_id)}}"> <span class="btn btn-warning btn-sm">No</span></a>
                                    <?php } ?>

                                </td>

                                <td>
                                 
                                
                                  <a title="Update Post" href="{{url('post_edit/'.$v_post->post_id)}}"><i class="fa fa-edit"></i></a>
                                   @if(auth()->user()->user_type==1)
                                  <a href="{{url('/delete-post/'.$v_post->post_id)}}"><i class="fa fa-trash"></i></a>
                                  @endif
                                </td>
              								 </tr>
                              	@endforeach

                            </tbody>
                        </table>
                     
                        {{ 
                        $posts->links()
                           
                        }}
                       

                    </div>
                </div>

@endsection

