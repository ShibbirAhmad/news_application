<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                   $top_20_posts=DB::table('posts')->select('popular_news','post_title','post_cur_date','post_id')->orderBy('popular_news','desc')->take(20)->get();


         return view('admin.home.home',compact('top_20_posts'));
    }

    public function Userprofile($id)
    {
       $profiles = Auth::user();
       return view('admin.home.userprofile', compact('profiles'));
    }


    public function Profile_update(Request $request, $id)
    {
       $validatedData = $request->validate([
        'oldpassword' => 'required|min:6|max:32',
        'newpassword' => 'required|min:6|max:32'

        ]);

       $id = $request->id;
       $name = $request->name;
       $email = $request->email;
       $oldpassword = $request->oldpassword;
       $newpassword = $request->newpassword;

       if (!Hash::check($oldpassword, Auth::user()->password)) {
           return redirect('/user-profile/'.$id)->with('warning', 'Old Password Not Mutch');
       }else{
        $request->user()->fill(['id'=>$id, 'name'=>$name, 'email'=>$email,'password'=>Hash::make($newpassword)])->save();
         return redirect('/user-profile/'.$id)->with('success', 'Profile Updated Successfully');
       }
    }


    public function ckEditorUpload(Request $request){
        $originName = $request->file('upload')->getClientOriginalName();
     $fileName = pathinfo($originName, PATHINFO_FILENAME);
     $extension = $request->file('upload')->getClientOriginalExtension();
     $fileName = $fileName.'_'.time().'.'.$extension;

     $request->file('upload')->move(public_path('images'), $fileName);

     $CKEditorFuncNum = $request->input('CKEditorFuncNum');
     $url = asset('public/images/'.$fileName);
     $msg = 'Image uploaded successfully';
     $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

     @header('Content-type: text/html; charset=utf-8');
     echo $response;
    }







}
