<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;

class AdvertiseClickCountController extends Controller
{


      public function advertiseClickCount($id){

           $ad=Advertisement::findOrFail($id);
           $ad->click_count = $ad->click_count + 1 ;
           if ($ad->save()) {
            //    return redirect()->away($ad->url);
               echo "<script>window.open('".$ad->url."', '_blank')</script>";
           }
    }


}
