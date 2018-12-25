<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $table = 'comments';
    //protected $with=['childs'];

    protected $fillable = ['email','name','content'];

	public function posts() {
		 return $this->belongsToMany('App\Post');
	}

    public function replies() {
        return $this->hasMany('App\Comment', 'parent_id','id');
    }
}
