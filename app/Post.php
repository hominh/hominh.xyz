<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'alias', 'category_id','posttype_id','intro','content','title','keyword','description','image','status','view','user_id','created_at','updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Category'); //Inverse
    }
    public function user()
    {
        return $this->belongsTo('App\User'); //Inverse
    }
    public function tag()
    {
         return $this->belongsToMany('App\Tag','posts_tags');
    }
    public function comments()
    {
         return $this->belongsToMany('App\Comment','posts_comments');
    }
}
