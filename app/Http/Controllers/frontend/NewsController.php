<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Advertisement;
Use Carbon\Carbon;
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

        //storing date wise post visit start
         $vistit_data=array(
             'date' => date('Y-m-d'),
             'post_id' => $id,
         );
        DB::table('post_visit_dates')->insert($vistit_data);
      //storing date wise post visit end


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


         $latests = DB::table('posts')->orderBy('post_cur_date','desc')->inRandomOrder()->take(10)->get();


      /************************** Popular News *************************/

       //filtering latest top 3 news
          $lastWeek = Carbon::now()->subWeek()->format('Y-m-d');
          $last_seven_days_post=DB::table('post_visit_dates')->where('date','>=',$lastWeek)
                                     ->select('post_id',DB::raw('count(*) as id'))
                                     ->groupBy('post_id')->pluck('post_id');

        $populars=DB::table('posts')->whereIn('post_id',$last_seven_days_post)->inRandomOrder()->orderBy('popular_news','desc')->take(10)->get();



        //advertise ments
           $advertisements=Advertisement::where('status',1)->inRandomOrder()->get();
    	 return view('frontend.news.news_page', compact('newsbyid', 'all_news', 'populars', 'latests','advertisements'));

      }

    }



}
