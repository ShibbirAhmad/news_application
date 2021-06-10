<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{

     public function index(){

        $sub_categories=SubCategory::orderby('id','desc')->get();
        return view('admin.category.sub_category',compact('sub_categories'));

     }

     public function store(Request $request){
        //   return $request->all();
           $validatedData = $request->validate([
                'name' => 'required|unique:sub_categories',
                'c_id' => 'required',
                'status' => 'required',

            ]);

            $sub_category= new SubCategory();
            $sub_category->category_id=$request->c_id ;
            $sub_category->name=$request->name ;
            $sub_category->status=$request->status ;
            $sub_category->save();
            if ($sub_category) {
             $notification = array(
                    'message' => 'New Sub Category Added !',
                    'alert-type' => 'success'
                );

            return Redirect()->route('sub_category_list')->with($notification);
            }else{
                   return back();
             }
     }


     public function editItem($id){
         $sub_category=SubCategory::findOrFail($id);
         return response()->json($sub_category);
        // return view('admin.SubCategory.edit',compact('advertise'));
     }



      public function deleteItem($id){
         $sub_category=SubCategory::findOrFail($id);
          if ($sub_category->delete()) {
            $notification = array(
                    'message' => 'Deleted!',
                    'alert-type' => 'success'
                );

            return Redirect()->route('sub_category_list')->with($notification);
            }else{
                   return back();
             }
     }



     public function udpate(Request $request){

        $validatedData = $request->validate([
                'c_id' => 'required',
                'status' => 'required',
            ]);

            $sub_category= SubCategory::where('id',$request->sub_category_id)->first();
            $sub_category->category_id=$request->c_id ;
            $sub_category->name=$request->name ;
            $sub_category->status=$request->status ;
            if($sub_category->save()) {
             $notification = array(
                    'message' => ' updated successfully !',
                    'alert-type' => 'success'
                );

            return Redirect()->route('sub_category_list')->with($notification);
            }else{
                   return back();
             }


     }

}
