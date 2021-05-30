@extends('admin.base')

@section('content')
    
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">

<div class="ibox-body">
            <h3 class="text-uppercase text-center">top <span class="text-danger">20</span> news
                <br/>
                            <span style="font-size: 12px;">base on hit count</span>

            </h3>
 
                      <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Post Title</th>
                                     <th>Date</th>
                                    <th>
                                        <i class="fa fa-eye"></i>
                                    </th>
                                  

                                </tr>
                            </thead>

                            <tbody id="post_info">

                              	<?php $count = 1;?>
                              	@foreach($top_20_posts as $v_post)

              								 <tr>
              								 	<td>{{$count++}}</td>
                                                   <td>
                                                       <a target="_blank" href="{{url('/moshadesh/news/'.$v_post->post_id)}}">
                                                         {{$v_post->post_title}}
                                                    </a>
                                                      
                                                    </td>
                                                   <td>
                                                       {{$v_post->post_cur_date ?? ""}}
                                                      
                                                    
                                                    </td>
              								 	
                                
                                <td>
                                    <span class="badge badge-danger shadow">{{$v_post->popular_news}}</span>
                                </td>
                               

                                  

                                 

                               
              								 </tr>
                              	@endforeach

                            </tbody>
                        </table>
                     
                     
                       

                    </div>

        

    </div>
</div>
<style>
    .ibox-body {
    background: #fff;
    padding: 20px 20px;
    box-shadow: 5px 5px 5px #ddd;
}
</style>
 @endsection