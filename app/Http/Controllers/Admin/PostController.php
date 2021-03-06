<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Posttype;
use App\Category;
use Auth;
use App\Post;
use App\Tag;
use App\Post_Tag;

class PostController extends Controller
{

    public function __construct(Post $post)
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('posts')
                    ->select(DB::raw("posts.id,posts.name,(CASE WHEN (status = 1) THEN 'Actived' ELSE 'Disable' END) as status,posts.created_at,users.name as uname"))
                    ->leftJoin('users','posts.user_id','=','users.id')
                    ->get();

        return view('admin/post/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('name','id','parent_id')->get()->toArray();
        $posttype = Posttype::select('id','name')->get()->toArray();
        return view('admin/post/add',compact('category','posttype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:posts|min:5',
           'content' => 'required|min:5',
        ]);
        $post = new Post;
        $post->name = $request->name;
        $post->alias = changeTitle($request->name);
        $post->intro = $request->intro;
        $post->title = $request->title;
        $post->keyword = $request->keyword;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->posttype_id = $request->posttype;
        $post->status = $request->status;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;

        if($request->image != "") {
            $post->image = $request->image;
        }
        if($request->image == "" || $request->image == NULL) {
            $post->image = "/photos/1/Test/post-default.jpg";
        }
        $post->save();
        $post_id = $post->id;
        $tag = $request->tag;
        if($tag != "" || $tag != NULL) {
            $tags = explode(",", $tag);
            foreach ($tags as $t) {
                $checkExistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                if(count($checkExistTag) <= 0) {
                    $tagObj = new Tag;
                    $tagObj->name = $t;
                    $tagObj->alias = changeTitle($t);
                    $tagObj->user_id = Auth::user()->id;
                    $tagObj->save();
                    $idTag = $tagObj->id;

                }
                else {
                    $checkexistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                    $idTag = $checkexistTag[0]->id;
                }

                $post_tagObj = new Post_Tag;
                $post_tagObj->post_id = $post_id;
                $post_tagObj->tag_id = $idTag;
                $post_tagObj->save();
            }
        }
        return redirect()->route('admin.post.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = DB::table('tags')
                ->join('posts_tags','tags.id','=','posts_tags.tag_id')
                ->select('tags.name')
                ->where('posts_tags.post_id','=',$id)
                ->get();
        $strTag = "";
        foreach($tags as $tag) {
            $strTag.= $tag->name.",";

        }
        $strTag = substr($strTag,0,-1);
        $data = DB::table('posts')
                    ->leftJoin('categories','posts.category_id','=','categories.id')
                    ->leftJoin('posttypes','posts.posttype_id','=','posttypes.id')
                    ->select('posts.id as postid','posts.name','posts.intro','posts.title','posts.description','posts.keyword','posts.content','posts.keyword','posts.status','posts.image','categories.id as cid','categories.name as cname','posttypes.id as pid','posttypes.name as pname')
                    ->where('posts.id','=',$id)
                    ->get();
        $currentNameStatus = "";
        $otherNameStatus = "";
        $otherStatus = 0;
        $curentNumberOfStatus = $data[0]->status;
        if($curentNumberOfStatus == 1) {
            $otherStatus = 0;
            $currentNameStatus = "Actived";
            $otherNameStatus  = "Disable";
        }
        else {
            $otherStatus = 1;
            $currentNameStatus = "Disable";
            $otherNameStatus  = "Actived";
        }

        $otherPostType = DB::table('posttypes')
                        ->select('posttypes.id','posttypes.name')
                        ->where('id','<>',$data[0]->pid)
                        ->get();

        $otherCategory = DB::table('categories')
                        ->select('categories.id','categories.name')
                        ->where('id','<>',$data[0]->cid)
                        ->get();
        return view('admin.post.edit',compact('data','currentNameStatus','otherStatus','otherNameStatus','otherPostType','otherCategory','strTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|min:5',
           'content' => 'required|min:5'
        ]);
        DB::table('posts_tags')->where('post_id', '=', $id)->delete();
        $tag = $request->tag;
        if($tag != "" || $tag != NULL) {
            $tags = explode(",", $tag);
            foreach ($tags as $t) {
                $checkExistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                if(count($checkExistTag) <= 0) { //If don't have tag
                    $tagObj = new Tag;
                    $tagObj->name = $t;
                    $tagObj->alias = changeTitle($t);
                    $tagObj->user_id = Auth::user()->id;
                    $tagObj->save();
                    $idTag = $tagObj->id;
                }
                else { //If have tag
                    $checkexistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                    $idTag = $checkexistTag[0]->id;
                }
                $post_tagObj = new Post_Tag;
                $post_tagObj->post_id = $id;
                $post_tagObj->tag_id = $idTag;
                $post_tagObj->save();
            }
        }

        $post = Post::find($id);
        $post->name = $request->name;
        $post->alias = changeTitle($request->name);
        $post->intro = $request->intro;
        $post->title = $request->title;
        $post->keyword = $request->keyword;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->posttype_id = $request->posttype;
        $post->status = $request->status;
        $post->category_id = $request->category;
        if($request->image != "") {
            $post->image = $request->image;
        }
        if($request->image != "") {
            $post->image = $request->image;
        }
        if($request->image == "" || $request->image == NULL) {
            $post->image = "/photos/1/Test/post-default.jpg";
        }
        $post->save();
        return redirect()->route('admin.post.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.post.list');
    }
    public function getDelImg($id,Request $request) {
        if($request->ajax()) {
            $idPost = (int)$request->get('idPost');
            $postDetail = Post::find($idPost);
            if(!empty($postDetail)) {
                $img = public_path("");
                $img.= $postDetail->image;
                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $postDetail->image = "";
                $postDetail->save();

            }
            return "ok";
        }
    }
}
