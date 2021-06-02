<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class WelcomeController extends Controller
{


    public function index()
    {


    	$nationals = DB::table('categorys')
    				->select('categorys.category_id', 'categorys.category_name')
                    ->where('cat_status', 1)
    				->where('category_id', 1)
    				->first();


    	$politics = DB::table('categorys')
    				->select('categorys.category_id', 'categorys.category_name')
    				->where('category_id', 2)
    				->first();

        $internationalbyid = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    ->where('category_id', 3)
                    ->first();


        $exclusivebyid = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    ->where('category_id', 4)
                    ->first();

        $all_bangladesh = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 5)
                    ->first();

        $job_newsbyid = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 6)
                    ->first();

        $sportsbyid = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 7)
                    ->first();


        $featured_news  = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 8)
                    ->first();

        $entertainment =  DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 9)
                    ->first();

         $lifestyle =  DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 10)
                    ->first();

        $features =  DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 11)
                    ->first();


       $diverse_news = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 12)
                    ->first();

        $crimecorruption = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 13)
                    ->first();

        $information = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 14)
                    ->first();

         $health = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 15)
                    ->first();

        $topcat = DB::table('categorys')
                    ->select('categorys.category_id', 'categorys.category_name')
                    // ->where('cat_status', 1)
                    ->where('category_id', 16)
                    ->first();



         /*************  nationals Head ********************/


    	$nationals_head = DB::table('posts')
    			 ->select('*')
    			 ->where('cat_id', 1)
    			 ->where('position', 1)
    			 ->where('post_status', 1)
    			 ->take(1)
    			 ->orderBy('post_id', 'DESC')
    			 ->get();

        $national_position =  [2, 3, 4, 5];

        $nationals_sub = DB::table('posts')
                  ->select('*')
                 ->where('cat_id', 1)
                 ->whereIn('position', $national_position)
                 ->where('post_status', 1)
                 ->take(4)
                 ->orderBy('post_id', 'DESC')
                 ->get();



      /************* 	politics Head ********************/

    	$politics_head = DB::table('posts')
    			 ->select('*')
    			 ->where('cat_id', 2)
    			 ->where('position', 1)
    			 ->where('post_status', 1)
    			 ->take(1)
    			 ->orderBy('post_id', 'DESC')
    			 ->get();

    	$political_position =  [2, 3, 4, 5];

    	$politics_sub = DB::table('posts')
    			 ->select('*')
    			 ->where('cat_id', 2)
    			 ->whereIn('position', $political_position)
    			 ->where('post_status', 1)
    			 ->take(4)
    			 ->orderBy('post_id', 'DESC')
    			 ->get();

    /************* 	politics End ********************/


    /**************** International ********************/

    $international_head = DB::table('posts')
    			 ->select('*')
    			 ->where('cat_id', 3)
    			 ->where('position', 1)
    			 ->where('post_status', 1)
    			 ->take(1)
    			 ->orderBy('post_id', 'DESC')
    			 ->get();


    $international_sub = DB::table('posts')
    			 ->select('*')
    			 ->where('cat_id', 3)
    			 ->whereIn('position', $political_position)
    			 ->where('post_status', 1)
    			 ->take(4)
    			 ->orderBy('post_id', 'DESC')
    			 ->get();

  /**************** International End ********************/





     /************************ excluive ***************************/


        $excluive_head = DB::table('posts')
                 ->select('*')
                 ->where('cat_id', 4)
                 ->where('post_status', 1)
                 ->take(7)
                 ->orderBy('post_id', 'DESC')
                 ->get();


     /************************ All Bangladesh  ***************************/

         $allbangladesh_head = DB::table('posts')
                 ->select('*')
                 ->where('cat_id', 5)
                 ->where('position', 1)
                 ->where('post_status', 1)
                 ->take(1)
                 ->orderBy('post_id', 'DESC')
                 ->get();

    $bangladesh_position =  [2, 3, 4, 5];

    $allbangladesh_sub =DB::table('posts')
                  ->select('*')
                 ->where('cat_id', 5)
                 ->whereIn('position', $bangladesh_position)
                 ->where('post_status', 1)
                 ->take(4)
                 ->orderBy('post_id', 'DESC')
                 ->get();


/************************ Jobs News  ***************************/

 $jobnews_head =DB::table('posts')
                  ->select('*')
                 ->where('cat_id', 6)
                 ->where('post_status', 1)
                 ->take(5)
                 ->orderBy('post_id', 'DESC')
                 ->get();

/************************ Sports  ***************************/

 $sports_head = DB::table('posts')
                 ->select('*')
                 ->where('cat_id', 7)
                 ->where('position', 1)
                 ->where('post_status', 1)
                 ->take(1)
                 ->orderBy('post_id', 'DESC')
                 ->get();

        $sport_position =  [2, 3, 4, 5, 6, 7];

        $sports_sub = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 7)
                    ->whereIn('position', $sport_position)
                     ->where('post_status', 1)
                     ->take(6)
                     ->orderBy('post_id', 'DESC')
                     ->get();


  /******************* Featured  News ************************************/

    $featured_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 8)
                     ->where('post_status', 1)
                     ->take(6)
                     ->orderBy('post_id', 'DESC')
                     ->get();

/******************* Entertainment News ************************************/

   $entertainment_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 9)
                      ->where('position', 1)
                     ->where('post_status', 1)
                     ->take(6)
                     ->orderBy('post_id', 'DESC')
                     ->get();

    $entertainment_position =  [2, 3, 4, 5, 6, 7];

    $entertainment_sub = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 9)
                     ->whereIn('position', $entertainment_position)
                     ->where('post_status', 1)
                     ->take(6)
                     ->orderBy('post_id', 'DESC')
                     ->get();


/******************* Lifestyle News ************************************/

       $lifestyle_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 10)
                     ->where('post_status', 1)
                     ->take(6)
                     ->orderBy('post_id', 'DESC')
                     ->get();


 /******************* Features News ************************************/

       $features_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 11)
                     ->where('post_status', 1)
                     ->take(4)
                     ->orderBy('post_id', 'DESC')
                     ->get();


/******************* Latest News ************************************/

         $latests = DB::table('posts')
                ->where('latest_news', 1)
                ->orderBy('latest_news', 'DESC')
                ->take(10)
                ->get();


 /******************* Diverse news ************************************/

   $diversenews_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 12)
                      ->where('position', 1)
                     ->where('post_status', 1)
                     ->take(1)
                     ->orderBy('post_id', 'DESC')
                     ->get();

    $diversenews_position = [2, 3, 4, 5];

   $diversenews_sub = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 12)
                    ->whereIn('position', $entertainment_position)
                     ->where('post_status', 1)
                     ->take(4)
                     ->orderBy('post_id', 'DESC')
                     ->get();


   /******************* Crime and corruption news ************************************/

   $crimecorruption_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 13)
                      ->where('position', 1)
                     ->where('post_status', 1)
                     ->take(1)
                     ->orderBy('post_id', 'DESC')
                     ->get();

 $crimecorruption_position = [2, 3, 4, 5];

 $crimecorruption_sub = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 13)
                     ->whereIn('position', $crimecorruption_position)
                     ->where('post_status', 1)
                     ->take(4)
                     ->orderBy('post_id', 'DESC')
                     ->get();


 /************************** Information News *************************/

        $information_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 14)
                      ->where('position', 1)
                     ->where('post_status', 1)
                     ->take(1)
                     ->orderBy('post_id', 'DESC')
                     ->get();

         $information_position = [2, 3, 4, 5];

         $information_sub = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 14)
                     ->whereIn('position', $information_position)
                     ->where('post_status', 1)
                     ->take(4)
                     ->orderBy('post_id', 'DESC')
                     ->get();

 /************************** Health News *************************/

        $health_head = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 15)
                      ->where('position', 1)
                     ->where('post_status', 1)
                     ->take(1)
                     ->orderBy('post_id', 'DESC')
                     ->get();

          //$health_position = [2, 3, 4, 5];

         $health_sub = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 15)
                     ->whereIn('position', [2, 3, 4, 5])
                     ->where('post_status', 1)
                     ->take(4)
                     ->orderBy('post_id', 'DESC')
                     ->get();




        //  echo "<pre>";
        // print_r($health_sub);

        $top_sub = DB::table('posts')
                     ->select('*')
                     ->where('cat_id', 16)
                     ->where('post_status', 1)
                     ->take(7)
                     ->orderBy('post_id', 'DESC')
                     ->get();

 /************************** Popular News *************************/

        $populars = DB::table('posts')
                ->orderBy('popular_news', 'DESC')
                ->take(10)
                ->get();


     $covernews = DB::table('posts')
                ->where('cover_news', 1)
                ->orderBy('cover_news', 'DESC')
                ->take(1)
                ->get();

    /******************** Slider Option *******************/

    $sliders = DB::table('slider')->take(5)->orderBy('id', 'DESC')->get();

    $gallerys = DB::table('gallerys')->take(6)->where('gallery_status', 1)->orderBy('id', 'DESC')->get();




      //filtering latest top 3 news
        $most_view_news=DB::table('posts')->orderBy('popular_news','desc')->take(3)->get();


    	 return view('frontend.home.home', compact(['nationals',
         'politics', 'nationals_head', 'nationals_sub', 'politics_head',
         'politics_sub', 'internationalbyid','international_head',
          'international_sub', 'exclusivebyid', 'excluive_head',
          'all_bangladesh', 'allbangladesh_head', 'allbangladesh_sub',
          'job_newsbyid', 'jobnews_head', 'sportsbyid', 'sports_head',
           'sports_sub', 'featured_news', 'featured_head', 'populars', 'latests',
           'entertainment', 'entertainment_head', 'entertainment_sub', 'lifestyle',
            'lifestyle_head', 'features', 'features_head', 'diverse_news', 'diversenews_head',
             'diversenews_sub', 'crimecorruption', 'crimecorruption_head',
              'crimecorruption_sub', 'information', 'information_head',
               'information_sub', 'health', 'health_head', 'health_sub',
               'topcat', 'top_sub', 'sliders', 'covernews', 'gallerys','most_view_news']));
    }

    public function AnyCategoryname($id, $category_name)
    {

    	$allposts = DB::table('posts')
    			 ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
    			 ->select('*', 'categorys.category_name')
    			 ->where('cat_id', $id)
    			 ->where('position', 1)
    			 ->orwhere('cat_id', $category_name)
    			 ->orderBy('post_id', 'DESC')
                 ->take(1)
    			 ->get();

            if (!isset($allposts)) {
                return Redirect('/');
            }else{

    	$national_position =  [2, 3, 4, 5];

    	$four_posts = DB::table('posts')
    			 ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
    			 ->select('*', 'categorys.category_name')
    			 ->where('cat_id', $id)
    			 ->whereIn('position', $national_position)
    			 ->orwhere('cat_id', $category_name)
    			 ->take(4)
    			 ->orderBy('post_id', 'DESC')
    			 ->get();





        /******************* Latest News ************************************/

         $latests = DB::table('posts')
                ->where('latest_news', 1)
                ->orderBy('latest_news', 'DESC')
                ->take(10)
                ->get();


        /************************** Popular News *************************/


        $populars = DB::table('posts')
                ->orderBy('popular_news', 'DESC')
                 ->take(10)
                ->get();



        $relative_position = [1, 2, 3, 4, 5];

      $all_news = DB::table('posts')
             ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
             ->select('*', 'categorys.category_name')
             ->where('cat_id', $id)
             ->whereNull('position')
             ->take(12)
             ->orderBy('post_id', 'DESC')
             ->get();
 	  return view('frontend.categorys.category_page', compact('allposts', 'four_posts', 'populars', 'latests', 'all_news'));
    }

    }






    public function News_search(Request $request)
    {
        $news = $request->news;
        if (empty($news)) {
            return redirect('/')->with("warning", "Filed Must Can't be Empty");
        }else{
            $search = DB::table('posts')
                        ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
                        ->where('post_title', 'LIKE', '%'.$news.'%')
                        ->orWhere('short_description', 'LIKE', '%'.$news.'%')
                        ->orWhere('long_description', 'LIKE', '%'.$news.'%')
                        ->select('*', 'categorys.category_name')
                        ->first();
                if ($search == false) {
                   return redirect('/')->with('warning', 'Data Not Found');
                }else{


            $all_news = DB::table('posts')
             ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
             ->select('*', 'categorys.category_name')
             ->where('post_status', 1)
             ->take(8)
             ->inRandomOrder()
             ->get();

  /******************* Latest News ************************************/

         $latests = DB::table('posts')
                ->where('latest_news', 1)
                ->orderBy('latest_news', 'DESC')
                ->take(10)
                ->get();


      /************************** Popular News *************************/

        $populars = DB::table('posts')
                ->orderBy('popular_news', 'DESC')
                ->take(10)
                ->get();

          return view('frontend.home.post_search', compact('search', 'all_news', 'latests', 'populars'));
      }
        }

    }

}
