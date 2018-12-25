<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Events\DemoPusherEvent;
use App\Post;
use App\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPusher() {
        return view("demo-pusher");
    }

    public function fireEvent() {
        broadcast(new DemoPusherEvent("Hi, I'm Minh. Thanks for reading my article!"));
        return "Message has been sent.";
    }

    public function index()
    {
        $posts = $this->getPostByPostType(10);
        return view('frontend.pages.home',compact('posts'));
    }

    public function getPostByPostType($limit) {
        $posts = DB::table('posts')
                    ->leftJoin('categories','posts.category_id','=','categories.id')
                    ->leftJoin('posttypes','posts.posttype_id','=','posttypes.id')
                    ->leftJoin('users','users.id','=','posts.user_id')
                    ->select('posts.id','posts.name','posts.intro','posts.alias','posts.title','posts.description','posts.keyword','posts.image','posts.view','posts.created_at','categories.name as cname','users.name as username')
                    //->where('posttypes.name','=',$posttype)
                    ->where('posts.status','=',1)
                    ->orderBy('id','DESC')
                    ->paginate($limit);
        return $posts;
    }
}
