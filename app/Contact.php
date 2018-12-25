<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = true;
    protected $table = 'contacts';
    //protected $with=['childs'];

    protected $fillable = ['email','name','title','content','status'];
}
