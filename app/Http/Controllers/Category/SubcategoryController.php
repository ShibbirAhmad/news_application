<?php

namespace App\Http\Controllers\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function Sub_category()
    {
    	
    	return view('admin.category.sub_category');
    }

}
