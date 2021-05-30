<?php

namespace App\Http\Controllers\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
class VideoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function Video_list()
    {	
    	$video_list = DB::table('videos')->orderBy('id', 'DESC')->get();
    	return view('admin.video.video_list', compact('video_list'));
    }

    public function Store_link(Request $res)
    {
    	$data = array();
    	$data = array(
                    'video_link' =>$res->video_link,
    				'video_title' =>$res->video_title,
    				);
      $insert  = DB::table('videos')->insert($data);
      	 if ($insert) {
                $notification = array(
                        'message' => 'New Video Added Successfully !', 
                        'alert-type' => 'success'
                    );

            return Redirect()->route('video-list')->with($notification);    
            }else{
                   return back();
             }
    }

    public function Edit_video($id)
    {
    	$editbyid = DB::table('videos')->where('id', $id)->first();
    	return response()->json($editbyid); 
    }

    public function Update_video(Request $res)
    {
    	$data = array();
    	$data = array(
                    'video_link' =>$res->video_link,
    				'video_title' =>$res->video_title
    				);
      $update  = DB::table('videos')->where('id', $res->id)->update($data);;
      	 if ($update) {
                $notification = array(
                        'message' => 'Video Updated Successfully !', 
                        'alert-type' => 'info'
                    );

            return Redirect()->route('video-list')->with($notification);    
            }else{
                   return back();
             }
    }


    public function Delete_video($id)
    {
    	$del = DB::table('videos')->where('id', $id)->delete();
    		 if ($del) {
                $notification = array(
                        'message' => 'Video Deleted Successfully !', 
                        'alert-type' => 'warning'
                    );

            return Redirect()->route('video-list')->with($notification);    
            }else{
                   return back();
             }
    }

    


}
