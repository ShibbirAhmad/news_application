<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NewsController extends Controller
{
    
    public function All_newspost($id)
    {	

    	$popular = DB::table('posts')
    			->where('post_id', $id)
    			->first();
        if (!isset($popular)) {
           return Redirect('/');
        }else{
    	$data = array();
    	$data['popular_news'] = $popular->popular_news+1;
    	DB::table('posts')->where('post_id', $id)->update($data);

		$newsbyid = DB::table('posts')
			 ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
			 ->select('*', 'categorys.category_name')
			 ->where('post_id', $id)
			 ->first();

			 
		$all_news = DB::table('posts')
			 ->leftJoin('categorys', 'posts.cat_id', '=', 'categorys.category_id')
			 ->select('*', 'categorys.category_name')
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

    	return view('frontend.news.news_page', compact('newsbyid', 'all_news', 'populars', 'latests'));
    }
    }


    
}
