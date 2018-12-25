<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Comment;
use App\Post_Comment;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
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

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:3',
           'content' => 'required|min:5',
        ]);

        /*$comment = Comment::create($request->all());
        return response()->json(
            [
                "comment" => $comment,
                'message' => "Create comment successfully"
            ]
        );*/

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        if(isset($request->paid)) {
            $parent_id = $request->paid;
        }
        else  {
            $parent_id = 0;
        }
        $comment->parent_id = $parent_id;
        $comment->save();

        $comment_id = $comment->id;
        $post_id = $request->pid;
        $post_comment = new Post_Comment;
        $post_comment->post_id = $post_id;
        $post_comment->comment_id = $comment_id;
        $post_comment->save();

        //store replies


        return redirect()->back()->with('success', ['Comment successfully']);
    }
}
