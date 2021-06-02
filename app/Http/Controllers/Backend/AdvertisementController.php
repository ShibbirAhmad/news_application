<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    //

     public function index(){

        $advertisements=Advertisement::orderby('id','desc')->get();
        return view('admin.advertisement.index',compact('advertisements'));

     }

     public function store(Request $request){

           $validatedData = $request->validate([
                'status' => 'required',
                'image' => 'required|file'
            ]);

            $ad= new Advertisement();
            $ad->url=$request->url ;
            $ad->status=$request->status ;
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/ad_banner','public');
                $ad->image=$path;
            }

            if ($ad->save()) {
            $notification = array(
                    'message' => 'New Advertise Added !',
                    'alert-type' => 'success'
                );

            return Redirect()->route('advertisement_list')->with($notification);
            }else{
                   return back();
             }
     }


     public function editItem($id){
         $advertise=Advertisement::findOrFail($id);
         return view('admin.advertisement.edit',compact('advertise'));
     }



      public function deleteItem($id){
         $advertise=Advertisement::findOrFail($id);
          if ($advertise->delete()) {
            $notification = array(
                    'message' => 'Deleted!',
                    'alert-type' => 'success'
                );

            return Redirect()->route('advertisement_list')->with($notification);
            }else{
                   return back();
             }
     }



     public function udpate(Request $request, $id){

        $validatedData = $request->validate([
                'status' => 'required',
            ]);

            $ad= Advertisement::findOrFail($id);
            $ad->url=$request->url ;
            $ad->status=$request->status ;
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/ad_banner','public');
                $ad->image=$path;
            }

            if ($ad->save()) {
            $notification = array(
                    'message' => 'Advertise updated !',
                    'alert-type' => 'success'
                );

            return Redirect()->route('advertisement_list')->with($notification);
            }else{
                   return back();
             }


     }



}
