<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
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
        $posts = $this->getPostByPostType(30);
    }

    public function getPostByCategory($alias) {
        $posts = DB::table('posts')
                    ->leftJoin('categories','posts.category_id','=','categories.id')
                    ->leftJoin('posttypes','posts.posttype_id','=','posttypes.id')
                    ->leftJoin('users','users.id','=','posts.user_id')
                    ->select('posts.id','posts.name','posts.intro','posts.alias','posts.title','posts.description','posts.keyword','posts.image','posts.created_at','categories.name as cname','users.name as username')
                    ->where('categories.alias','=',$alias)
                    ->where('posts.status','=',1)
                    ->orderBy('id','DESC')
                    ->paginate(30);
        return view('frontend.pages.category',compact('posts'));
    }
}
