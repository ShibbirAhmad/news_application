<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
class PostController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function post_list()
    {
    	$categorys = DB::table('categorys')
    			->select('categorys.category_id', 'categorys.category_name')
    			->get();

    	$posts = DB::table('posts')
    			 ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
    			 ->select('*', 'categorys.category_name')
    			->orderBy('post_id', 'DESC')
    			->paginate(20);
    	return view('admin.post.post_list', compact('categorys', 'posts'));
    }

    public function Store_post(Request $request)
    {

    	$data = array();

    	$data = array(
    		'post_title' => $request->post_title,
    		'cat_id' => $request->category_id,
    		'sub_category_id' => $request->sub_category_id ?? null,
    		'short_description' => $request->short_description,
    		'long_description' => $request->long_description,
            'position' => $request->position,
             'latest_news' => $request->latest_news,
             'cover_news' => $request->cover_news,
    		'breaking_news' => $request->breaking_news,
    		'post_status' => $request->post_status,
    		'post_cur_date' => bn_date(date('d M Y, H:i')),
 	   		'post_user_id' => Auth::user()->id

    		);

    	   if ($request->hasFile('post_image')) {
        	  $files = $request->file('post_image');
	          $extension = $files->getClientOriginalExtension();
	          $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
	          $folderpath = 'public/news/post/'.date('Y').'/';
	          $image_url = $folderpath.$fileName;
	          $files->move($folderpath , $fileName);
	          $data['post_image'] = $image_url;

         }
         $insert = DB::table('posts')->insert($data);
     	 if ($insert) {
            $notification = array(
                    'message' => 'New Post Added Successfully !',
                    'alert-type' => 'success'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }
    }


    public function Edit_post($id)
    {
        $categorys = DB::table('categorys')
                ->where('cat_status',1)
                ->get();

       $editbypost = DB::table('posts')
                    ->where('post_id', $id)
                    ->first();
       return view('admin.post.edit_post', compact('categorys', 'editbypost'));
    }

    public function Update_post(Request $request, $id)
    {
        $data = array();
        $data = array(
            'post_title' => $request->post_title,
            'cat_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id ?? null,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'position' => $request->position,
            'latest_news' => $request->latest_news,
            'cover_news' => $request->cover_news,
            'breaking_news' => $request->breaking_news,
            'post_status' => $request->post_status,
            'post_cur_date' => Carbon::now(),
            'post_user_id' => Auth::user()->id

            );

         $image_path = DB::table('posts')
               ->select('post_image')
               ->where('post_id', $id)
               ->first();

                if($request->hasFile('add_image')){
                    $add_image_files = $request->file('add_image');
                    $extensions = $add_image_files->getClientOriginalExtension();
                    $fName = str_random(5)."-".date('his')."-".str_random(3).".".$extensions;
                    $fPath = 'public/news/post/add/';
                    $im_url = $fPath.$fName;
                   $add_image_files->move($fPath , $im_url);

                    $data['post_add_image'] = $im_url;
               }

         $data['add_image_url']=$request->post_add_image_url;

           if ($request->hasFile('post_image')) {
              $files = $request->file('post_image');
              $extension = $files->getClientOriginalExtension();
              $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
              $folderpath = 'public/news/post/'.date('Y').'/';
              $image_url = $folderpath.$fileName;
              $success = $files->move($folderpath , $fileName);

              if ($success) {
                  $data['post_image'] = $image_url;
                   $update =  DB::table('posts')
                     ->where('post_id', $id)
                     ->update($data);
                   $file_path = $image_path->post_image;
                   if (file_exists($file_path)) {
                   unlink($file_path);

              if ($update) {
            $notification = array(
                    'message' => 'Post Updated Successfully !',
                    'alert-type' => 'info'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }


          }else{
               $data['post_image'] = $image_url;
              $update = DB::table('posts')
                     ->where('post_id', $id)
                     ->update($data);
             if ($update) {
            $notification = array(
                    'message' => 'Post Updated Successfully !',
                    'alert-type' => 'info'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }

          }
        }

         }

         $update =  DB::table('posts')
                     ->where('post_id', $id)
                     ->update($data);
          if ($update) {
            $notification = array(
                    'message' => 'Post Updated Successfully !',
                    'alert-type' => 'info'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }

    }


    public function Delete_post($id)
    {

       $image_path = DB::table('posts')
               ->select('post_image')
               ->where('post_id', $id)
               ->first();

        $file_path = $image_path->post_image;
       if (file_exists($file_path)) {
           unlink($file_path);

              $delpost = DB::table('posts')
                    ->where('post_id', $id)
                    ->delete();
        if ($delpost) {
            $notification = array(
                    'message' => 'Post Deleted Successfully !',
                    'alert-type' => 'warning'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }

       } else {

        $delpost = DB::table('posts')
                    ->where('post_id', $id)
                    ->delete();
        if ($delpost) {
            $notification = array(
                    'message' => 'Post Deleted Successfully !',
                    'alert-type' => 'warning'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }
       }


    }


    public function Latestnews_no($id)
    {
      $nopost = DB::table('posts')
                ->where('post_id', $id)
                ->update(['latest_news' => NULL]);
        if ($nopost) {
            $notification = array(
                    'message' => 'Letest News No Successfully !',
                    'alert-type' => 'warning'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }

    }

    public function Latestnews_yes($id)
    {
      $nopost = DB::table('posts')
                ->where('post_id', $id)
                ->update(['latest_news' => 1]);
        if ($nopost) {
            $notification = array(
                    'message' => 'Letest News Yes Successfully !',
                    'alert-type' => 'success'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }
    }

    public function Covernews_no($id)
    {
       $cover = DB::table('posts')
                ->where('post_id', $id)
                ->update(['cover_news' => NULL]);
        if ($cover) {
            $notification = array(
                    'message' => 'Cover News No Successfully !',
                    'alert-type' => 'warning'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }
    }

    public function Covernews_yes($id)
    {
       $coveryes = DB::table('posts')
                ->where('post_id', $id)
                ->update(['cover_news' => 1]);
        if ($coveryes) {
            $notification = array(
                    'message' => 'Cover News Yes Successfully !',
                    'alert-type' => 'success'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }
    }


    public function Breakingnews_no($id)
    {
      $cover = DB::table('posts')
                ->where('post_id', $id)
                ->update(['breaking_news' => NULL]);
        if ($cover) {
            $notification = array(
                    'message' => 'Breaking News No Successfully !',
                    'alert-type' => 'warning'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }
    }

    public function Breakingnews_yes($id)
    {
      $coveryes = DB::table('posts')
                ->where('post_id', $id)
                ->update(['breaking_news' => 1]);
        if ($coveryes) {
            $notification = array(
                    'message' => 'Breaking News Yes Successfully !',
                    'alert-type' => 'success'
                );

        return Redirect()->route('posts')->with($notification);
        }else{
               return back();
         }
    }
        public function filterByCategory(Request $request)
    {
        $categorys = DB::table('categorys')
            ->select('categorys.category_id', 'categorys.category_name')
            ->get();

        $posts = DB::table('posts')
            ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
            ->select('*', 'categorys.category_name')
            ->where('cat_id',$request->category_id)
            ->orderBy('post_id', 'DESC')
           ->paginate(20);
        return view('admin.post.post_list', compact('categorys', 'posts'));
    }




}
