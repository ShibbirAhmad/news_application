<?php

namespace App\Http\Controllers\Other;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
class OtherController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Breaking_news()
    {
    	$breakings = DB::table('breakingnews')
    				->leftJoin('users', 'breakingnews.ber_user_id', '=', 'users.id')
    				->select('breakingnews.*', 'users.name')
    				->orderBy('breakingnew_id', 'DESC')
    				->get();
    	return view('admin.others.breaking_news', compact('breakings'));
    }

    public function Store_breakingnews(Request $request)
    {
    	$data = array();
    	$data = array(
    			'breaking_news_name'=>$request->breaking_news_name,
    			'ber_status'=>$request->ber_status,
    			'ber_cur_date' => Carbon::now(),
 	   			'ber_user_id' => Auth::user()->id

    			);

    	$insert = DB::table('breakingnews')->insert($data);
    	if ($insert) {
                $notification = array(
                        'message' => 'Breaking News Added Successfully !', 
                        'alert-type' => 'success'
                    );

            return Redirect()->route('breaking-news')->with($notification);    
            }else{
                   return back();
             }
    }

     public function Edit_breakingnews($id)
     {
     	$editbyid = DB::table('breakingnews')
     				->where('breakingnew_id', $id)
     				->first();
     	return response()->json($editbyid); 
     }

     public function Update_breakingnews(Request $request)
     {
     		
        $data = array();
    	$data = array(
    			'breaking_news_name'=>$request->breaking_news_name,
    			'ber_status'=>$request->ber_status,
    			'ber_cur_date' => Carbon::now(),
 	   			'ber_user_id' => Auth::user()->id
    			);

    		$update = DB::table('breakingnews')
    				 ->where('breakingnew_id', $request->breakingnew_id)
    				 ->update($data);

    		if ($update) {
                $notification = array(
                        'message' => 'Breaking News Updated Successfully !', 
                        'alert-type' => 'info'
                    );

            return Redirect()->route('breaking-news')->with($notification);    
            }else{
                   return back();
             }

	     }

	public function Delete_breakingnews($id)
	    {
	    	
	    	$del = DB::table('breakingnews')
	    		  ->where('breakingnew_id', $id)
	    		  ->delete();

	    	if ($del) {
                $notification = array(
                        'message' => 'Breaking News Deleted Successfully !', 
                        'alert-type' => 'warning'
                    );

            return Redirect()->route('breaking-news')->with($notification);    
            }else{
                   return back();
             }
	    }


	  public function Off_breakingnews($id)
	   {
	   		$offber = DB::table('breakingnews')
	   				  ->where('breakingnew_id', $id)
	   				  ->update(['ber_status' => 2]);

	   		if ($offber) {
                $notification = array(
                        'message' => 'Breaking News Off Successfully !', 
                        'alert-type' => 'warning'
                    );

            return Redirect()->route('breaking-news')->with($notification);    
            }else{
                   return back();
             }

	   }

	   public function On_breakingnews($id)
	   {
	   		
	   	  $onber = DB::table('breakingnews')
	   				  ->where('breakingnew_id', $id)
	   				  ->update(['ber_status' => 1]);

	   		if ($onber) {
                $notification = array(
                        'message' => 'Breaking News ON Successfully !', 
                        'alert-type' => 'success'
                    );

            return Redirect()->route('breaking-news')->with($notification);    
            }else{
                   return back();
             }

	   }


}
