<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Comment extends Model
{
    protected $table = 'posts_comments';

    protected $fillable = ['post_id','comment_id'];

    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
    public function comment()
    {
        return $this->hasOne('App\Comment','id');
    }
}
