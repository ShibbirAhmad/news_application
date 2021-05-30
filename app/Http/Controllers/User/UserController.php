<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
class UserController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function User_list()
    {	
    	$users = DB::table('users')->orderBy('name')->get();
    	return view('admin.auth.user_list', compact('users'));
    }

    public function Store_user(Request $request)
    {
    	 $validatedData = $request->validate([
	    'name' => 'required|min:3|max:50',
	    'email' => 'email',
	    'password' => 'required|confirmed|min:6',
        ]);

    	$data = array();
    	$data = array(
    			'name' => $request->name,
    			'email' => $request->email,
    			'password' => Hash::make($request->password),
    			'user_status' => $request->user_status,
    			'user_type' => $request->user_type,
    			);
       $insert = DB::table('users')->insert($data);
        if ($insert) {
            $notification = array(
                    'message' => 'New User Added Successfully !', 
                    'alert-type' => 'success'
                );

        return Redirect()->route('user-list')->with($notification);    
        }else{
               return back();
         }
    }

    public function Edit_edit($id)
    {
        $editbyid = DB::table('users')->where('id', $id)->first();
       return view('admin.auth.edit_user', compact('editbyid'));
    }

    public function Update_user(Request $request, $id)
    {
        $data = array();
        $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_status' => $request->user_status,
                'user_type' => $request->user_type,
                );
       $update = DB::table('users')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                    'message' => 'User Updated Successfully !', 
                    'alert-type' => 'info'
                );

        return Redirect()->route('user-list')->with($notification);    
        }else{
               return back();
         }
    }

    public function Delete_user($id)
    {
    	$del = DB::table('users')->where('id', $id)->delete();
    	  if ($del) {
            $notification = array(
                    'message' => 'User Deleted Successfully !', 
                    'alert-type' => 'warning'
                );

        return Redirect()->route('user-list')->with($notification);    
        }else{
               return back();
         }
    }
    
}
