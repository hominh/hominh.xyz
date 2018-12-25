<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Config;
use DB;
use Auth;
use App\Http\Controllers\Controller;


class ConfigController extends Controller
{
    public function __construct(Config $config)
    {
        $config = new Config;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('configs')
                    ->select(DB::raw("configs.id,configs.title,configs.created_at,users.name as uname"))
                    ->leftJoin('users','configs.user_id','=','users.id')
                    ->get();

        return view('admin/config/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.add');
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
            'title' => 'required|min:3',
        ]);
        $config = new Config;
        $config->title = $request->title;
        $config->description = $request->title;
        $config->keyword = $request->keyword;
        $config->address = $request->address;
        $config->email = $request->email;
        $config->skype = $request->skype;
        $config->phone = $request->phone;
        $config->user_id = Auth::user()->id;
        if($request->image != "") {
            $config->logo = $request->image;
        }
        if($request->image == "" || $request->image == NULL) {
            $config->logo = "/photos/1/Test/post-default.jpg";
        }

        if($request->logo_footer != "") {
            $config->logo_footer = $request->logo_footer;
        }
        if($request->logo_footer == "" || $request->logo_footer == NULL) {
            $config->logo_footer = "/photos/1/Test/logo_footer.png";
        }
        if($request->favicon != "") {
            $config->favicon = $request->favicon;
        }
        if($request->favicon == "" || $request->favicon == NULL) {
            $config->logo_footer = "/photos/1/Test/logo_footer.png";
        }
        $config->save();
        return redirect()->route('admin.config.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Config::findOrFail($id)->toArray();
        return view('admin.config.edit',compact('data','id'));
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
          'title' => 'required|min:5',
      ]);
      $config = Config::find($id);
      $config->title = $request->title;
      $config->description = $request->title;
      $config->keyword = $request->keyword;
      $config->address = $request->address;
      $config->email = $request->email;
      $config->skype = $request->skype;
      $config->phone = $request->phone;
      $config->user_id = Auth::user()->id;
      if($request->image != "") {
          $config->logo = $request->image;
      }
      if($request->image == "" || $request->image == NULL) {
          $config->logo = "/photos/1/Test/post-default.jpg";
      }
      $config->save();
      return redirect()->route('admin.config.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Category::where('parent_id',$id)->count();
        if($parent == 0) {
          $config = Category::find($id);
          $config->delete();
          return redirect()->route('admin.category.list')->with(['flash_level'=>'success','flash_message'=>'Delete success']);
        }
        else {
          echo "<script type='text/javascript'>
          alert('Can't delete cateogry);
          window.location = '";
          echo route('admin.category.list');
          echo "'
          </script>";
        }

    }
}
