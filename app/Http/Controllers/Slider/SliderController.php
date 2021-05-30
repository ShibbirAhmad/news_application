<?php

namespace App\Http\Controllers\Slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function slider_list()
    {	
    	$sliders = DB::table('slider')->orderBy('id', 'DESC')->get();
    	return view('admin.slider.slider_list', compact('sliders'));
    }

    public function Store_slider(Request $request)
    {
    	$data = array();
    	$data = array(
    			'title'=>$request->title,
    			'slider_cur_date' => Carbon::now(),
 	   		    'slider_user_id' => Auth::user()->id
    			);

   		   if ($request->hasFile('slider_image')) {
        	  $files = $request->file('slider_image');
	          $extension = $files->getClientOriginalExtension();
	          $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
	          $folderpath = 'public/news/slider/'.date('Y').'/';
	          $image_url = $folderpath.$fileName;
	          $files->move($folderpath , $fileName);
	          $data['slider_image'] = $image_url; 

         }

         $insert = DB::table('slider')->insert($data);
     	 if ($insert) {
            $notification = array(
                    'message' => 'New Slider Added Successfully !', 
                    'alert-type' => 'success'
                );

        return Redirect()->route('slider-list')->with($notification);    
        }else{
               return back();
         }
    }


    public function Editslider($id)
    {
       $editbyid = DB::table('slider')
                    ->where('id', $id)
                    ->first();

        return view('admin.slider.edit_slider', compact('editbyid'));
    }


    public function Update_slider(Request $request, $id)
    {
       $data = array();
        $data = array(
                'title'=>$request->title,
                );

              $image_path = DB::table('slider')
               ->select('slider_image')
               ->where('id', $id)
               ->first();


              if ($request->hasFile('slider_image')) {
              $files = $request->file('slider_image');
              $extension = $files->getClientOriginalExtension();
              $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
              $folderpath = 'public/news/slider/'.date('Y').'/';
              $image_url = $folderpath.$fileName;
              $success = $files->move($folderpath , $fileName);

              if ($success) {
                  $data['slider_image'] = $image_url;
                   $update =  DB::table('slider')
                     ->where('id', $id)
                     ->update($data);
                     $file_path = $image_path->slider_image;
                     if (file_exists($file_path)) {
                         unlink($file_path);

                      } 

                   if ($update) {
            $notification = array(
                    'message' => 'Slider Updated Successfully !', 
                    'alert-type' => 'info'
                );

        return Redirect()->route('slider-list')->with($notification);    
        }else{
               return back();
         }
         

             }else{
               $data['slider_image'] = $image_url;
              $update = DB::table('slider')
                     ->where('id', $id)
                     ->update($data);
               if ($update) {
            $notification = array(
                    'message' => 'Slider Updated Successfully !', 
                    'alert-type' => 'info'
                );

        return Redirect()->route('slider-list')->with($notification);    
        }else{
               return back();
         }
          
          }
      }

          $update = DB::table('slider')
                     ->where('id', $id)
                     ->update($data);

             if ($update) {
            $notification = array(
                    'message' => 'Slider Updated Successfully !', 
                    'alert-type' => 'info'
                );

        return Redirect()->route('slider-list')->with($notification);    
        }else{
               return back();
         }
        
         



    }
    public function Delete_slider($id)
    {
       $image_path = DB::table('slider')
               ->select('slider_image')
               ->where('id', $id)
               ->first();

        $file_path = $image_path->slider_image;
       if (file_exists($file_path)) {
           unlink($file_path);

        $del = DB::table('slider')->where('id', $id)->delete();
         if ($del) {
            $notification = array(
                    'message' => 'Slider Deleted Successfully !', 
                    'alert-type' => 'warning'
                );

        return Redirect()->route('slider-list')->with($notification);    
        }else{
               return back();
         }

       } else {
               $del = DB::table('slider')->where('id', $id)->delete();
         if ($del) {
            $notification = array(
                    'message' => 'Slider Deleted Successfully !', 
                    'alert-type' => 'warning'
                );

        return Redirect()->route('slider-list')->with($notification);    
        }else{
               return back();
         } 
       }

   
    }
}
