<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function getLogout()
    {
    	Auth::logout();
    	$request->session()->flush();
    	return redirect('/login');
    }
}