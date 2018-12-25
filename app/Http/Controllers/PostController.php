<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Post_Comment;
use App\BrowsingHistory;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        BrowsingHistory::createLog();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function getPostByAlias($alias)
    {
        $post = \App\Post::with('category')->with('user')->with('tag')->with('comments')->where('alias',$alias)->get();
        $comments = \App\Post_Comment::where(['post_id'=>$post[0]->id])->orderBy('created_at','asc')->with('comment')->with('replies')->get()->toArray();
        DB::table('posts')->where('alias',$alias)->increment('view');
        return view('frontend.pages.post',compact('post','comments'));
    }

    public function search(Request $request)
    {
        $param = $request->param;
        $posts = \App\Post::with('category')
                ->with('user')->with('tag')->with('comments')
                ->where('name','like','%' . $param . '%')
                ->orWhere('intro','like','%' . $param . '%')
                ->get();
        return view('frontend.pages.search',compact('posts'));
    }
}
