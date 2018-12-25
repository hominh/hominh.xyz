<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TagController extends Controller
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
    public function index()
    {

    }

    public function getPostByTag($alias) {
        $posts = DB::table('posts')
                    ->leftJoin('posts_tags','posts.id','=','posts_tags.post_id')
                    ->leftJoin('tags','posts_tags.tag_id','=','tags.id')
                    ->leftJoin('users','users.id','=','posts.user_id')
                    ->select('posts.id','posts.name','posts.intro','posts.alias','posts.title','posts.description','posts.keyword','posts.image','posts.created_at','posts.view','tags.name as tname','users.name as username')
                    ->where('tags.alias','=',$alias)
                    ->where('posts.status','=',1)
                    ->orderBy('posts.id','DESC')
                    ->paginate(30);
        //dd($posts);
        return view('frontend.pages.tag',compact('posts'));
    }
}
