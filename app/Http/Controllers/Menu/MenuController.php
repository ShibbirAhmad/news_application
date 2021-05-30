<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;

class MenuController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function menu_list()
    {	
    	$menus = DB::table('menus')->orderBy('menu_name')->get();
    	return view('admin.menu.menu_list', compact('menus'));

    }

    public function Store_menu(Request $request)
    {
    	
    	$data = array();
    	$data = array(
    			'menu_name' => $request->menu_name,
    			'news_title' => $request->news_title,
    			'description' => $request->description,
    			'menu_status' => $request->menu_status,
    			'menu_cur_date' => Carbon::now(),
    			);

    	  if ($request->hasFile('menu_image')) {
        	  $files = $request->file('menu_image');
	          $extension = $files->getClientOriginalExtension();
	          $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
	          $folderpath = 'public/news/menu/'.date('Y').'/';
	          $image_url = $folderpath.$fileName;
	          $files->move($folderpath , $fileName);
	          $data['menu_image'] = $image_url; 

         }

    	$insert = DB::table('menus')->insert($data);

				 if ($insert) {
                $notification = array(
                        'message' => 'New Menu Added Successfully !', 
                        'alert-type' => 'success'
                    );

            return Redirect()->route('menu-list')->with($notification);    
            }else{
                   return back();
             }

    }

    public function Delete_menu($id)
    {
        $delpost = DB::table('menus')
                    ->where('id', $id)
                    ->delete();
        if ($delpost) {
            $notification = array(
                    'message' => 'Menu Deleted Successfully !', 
                    'alert-type' => 'success'
                );

        return Redirect()->route('menu-list')->with($notification);    
        }else{
               return back();
         }
    }
}
