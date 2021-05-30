<?php

namespace App\Http\Controllers\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Gallery_list()
    {  
    	$gallerys = DB::table('gallerys')->orderBy('id', 'DESC')->get();
    	return view('admin.gallery.gallery_list', compact('gallerys'));
    }

    public function Store_gallery(Request $request)
    {
    	$data = array();
    	$data = array(
    				'gallery_title' => $request->gallery_title,
    				'gallery_status' => $request->gallery_status,
    				);
    			
    	if ($request->hasFile('gallery_image')) {
        	  $files = $request->file('gallery_image');
	          $extension = $files->getClientOriginalExtension();
	          $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
	          $folderpath = 'public/gallery/post/'.date('Y').'/';
	          $image_url = $folderpath.$fileName;
	          $files->move($folderpath , $fileName);
	          $data['gallery_image'] = $image_url; 

         }

           $insert = DB::table('gallerys')->insert($data);
     	 if ($insert) {
            $notification = array(
                    'message' => 'New Gallery Added Successfully !', 
                    'alert-type' => 'success'
                );

        return Redirect()->route('gallery-list')->with($notification);    
        }else{
               return back();
         }

    }


    public function Edit_gallery($id)
    {
        
        $editbyid = DB::table('gallerys')->where('id', $id)->first();
        return view('admin.gallery.editgallery', compact('editbyid'));

    }

    public function Update_gallery(Request $request, $id)
    {
       $data = array();
        $data = array(
                    'gallery_title' => $request->gallery_title,
                    'gallery_status' => $request->gallery_status,
                    );

        $image_path = DB::table('gallerys')
               ->select('gallery_image')
               ->where('id', $id)
               ->first();


         if ($request->hasFile('gallery_image')) {
          $files = $request->file('gallery_image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
          $folderpath = 'public/gallery/post/'.date('Y').'/';
          $image_url = $folderpath.$fileName;
          $success = $files->move($folderpath , $fileName);

          if ($success) {
              $data['gallery_image'] = $image_url;
               $update =  DB::table('gallerys')
                 ->where('id', $id)
                 ->update($data);
                $file_path = $image_path->gallery_image;
                 if (file_exists($file_path)) {
                     unlink($file_path);
                }

                  if ($update) {
            $notification = array(
                    'message' => 'Gallery Updated Successfully !', 
                    'alert-type' => 'success'
                );

        return Redirect()->route('gallery-list')->with($notification);    
        }else{
               return back();
         }


         }else{
           $data['gallery_image'] = $image_url;
         $update =  DB::table('gallerys')
                 ->where('id', $id)
                 ->update($data); 
              if ($update) {
            $notification = array(
                  'message' => 'Gallery Updated Successfully !', 
                    'alert-type' => 'success'
                );

        return Redirect()->route('gallery-list')->with($notification);    
        }else{
               return back();
         }
      
      }

     }

     $update =  DB::table('gallerys')
             ->where('id', $id)
             ->update($data);
        if ($update) {
            $notification = array(
                    'message' => 'Gallery Updated Successfully !', 
                    'alert-type' => 'success'
                );

        return Redirect()->route('gallery-list')->with($notification);    
        }else{
               return back();
         }

    }


    public function Delete_gallery($id)
    {
      $image_path = DB::table('gallerys')
               ->select('gallery_image')
               ->where('id', $id)
               ->first();

        $file_path = $image_path->gallery_image;
       if (file_exists($file_path)) {
           unlink($file_path);

            $del = DB::table('gallerys')->where('id', $id)->delete();
         if ($del) {
            $notification = array(
                    'message' => 'Gallery Deleted Successfully !', 
                    'alert-type' => 'warning'
                );

        return Redirect()->route('gallery-list')->with($notification);    
        }else{
               return back();
         }

       } else {
            $del = DB::table('gallerys')->where('id', $id)->delete();
         if ($del) {
            $notification = array(
                    'message' => 'Gallery Deleted Successfully !', 
                    'alert-type' => 'warning'
                );

        return Redirect()->route('gallery-list')->with($notification);    
        }else{
               return back();
         }
       }

       
    }
}




