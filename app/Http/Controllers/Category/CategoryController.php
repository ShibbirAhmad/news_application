<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
class CategoryController extends Controller
{
 
	  public function __construct()
    {
        $this->middleware('auth');
    }


 	public function Category_list()
 	  {
 	  	$categorys = DB::table('categorys')
 	  				->orderby('category_name')
 	  				->get();
 	  	return view('admin.category.category_list', compact('categorys'));
 	  } 


 	  public function Store_category(Request $request)
 	   {
 	   		$data = array();
 	   		$data = array(
 	   				'category_name' => $request->category_name,
 	   				'cat_status' => $request->cat_status,
 	   				'cat_cur_date' => Carbon::now(),
 	   				'cat_user_id' => Auth::user()->id,
 	   				'category_position'=>$request->category_position

 	   				);

 	   		$insert = DB::table('categorys')->insert($data);
 	   	
				 if ($insert) {
                $notification = array(
                        'message' => 'New Category Added Successfully !', 
                        'alert-type' => 'success'
                    );

            return Redirect()->route('categorys')->with($notification);    
            }else{
                   return back();
             }
 	   
   }


   public function Edit_category($id)
   {
   		$editbyid = DB::table('categorys')
   					->where('category_id', $id)
   					->first();

   		return response()->json($editbyid); 
   }

   public function Update_category(Request $request)
   {
   		
   		$data = array();
 	   	$data = array(
 	   				'category_name' => $request->category_name,
 	   				'cat_status' => $request->cat_status,
 	   				'cat_cur_date' => Carbon::now(),
 	   				'cat_user_id' => Auth::user()->id,
 	   				'category_position'=>$request->category_position

 	   				);
 	   	$update = DB::table('categorys')
 	   				->where('category_id', $request->category_id)
 	   				->update($data);
 	   	if ($update) {
				 if ($update) {
                $notification = array(
                        'message' => 'Category Updated Successfully !', 
                        'alert-type' => 'info'
                    );

            return Redirect()->route('categorys')->with($notification);    
            }else{
                   return back();
             }
 	   }

 	   

   }

   public function Delete_category($id)
   {
   		
   		$delcat = DB::table('categorys')
   					->where('category_id', $id)
   					->delete();
   		if ($delcat) {
				 if ($delcat) {
                $notification = array(
                        'message' => 'Category Deleted Successfully !', 
                        'alert-type' => 'warning'
                    );

            return Redirect()->route('categorys')->with($notification);    
            }else{
                   return back();
             }

   }


}

}
