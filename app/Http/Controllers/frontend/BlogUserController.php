<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogUser;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Support\Facades\Session;

class BlogUserController extends Controller
{

          public function  register(Request $request){
         $validatedData = $request->validate([
            'name'  => 'required',
            'email'  => 'required|unique:blog_users',
            'password' => 'required | min:6 ',
        ]);

                $user = new BlogUser();
                $user->name=$request->name ;
                $user->email=$request->email ;
                $user->password=Hash::make($request->password);
                if ($user->save()) {
                Session::put('blog_user', Auth::guard('blog_user')->user() );

                  return redirect('/')->with('message', 'registered successfully !');
            }else{
                  return redirect()->back()->with('message', 'registration failed  !');
             }
    }




        //function for login blog_user
    public  function login(Request $request){
        //   return $request->all() ;
           $validateData = $request->validate([
                    'email' => 'required' ,
                    'password' => 'required' ,
           ]);

           $credential = [ 'email' => $request->email , 'password' => $request->password ] ;

           if (Auth::guard('blog_user')->attempt($credential)) {
               Session::put('blog_user', Auth::guard('blog_user')->user() );

               $notification = array(
                'message' => ' login successfully !',
                'alert-type' => 'success'
                );
                 return redirect('/')->with('message', 'registered successfully !');
           }else{
                  return redirect()->back()->with('message', 'in-valid login info.  !');
           }

    }



    public  function logout(){

          Auth::guard('blog_user')->logout();
          session()->forget('blog_user');

            return redirect()->route('end_user_login')->with('message', 'session out.  !');


    }









}
