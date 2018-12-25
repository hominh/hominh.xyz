<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contact;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
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
        return view('frontend.pages.contact');
    }

    public function storeMessage(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'content' => 'required|min:5',
            'g-recaptcha-response' => 'required'
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->status = 0;
        //dd($contact);
        $contact->save();
        //Log::info($contact);
        // if ($this->validate->fails()) {
        // //    Log::info($validator);
        //     return Redirect::to('/')->withErrors($this->validate);
        // }
        // else {
        // //    Log::info($contact);
        //     return redirect()->back()->with('success', ['Sent message successfully']);    
        // }
        //dd($contact);
        return redirect()->back()->with('success', ['Sent message successfully']);
    }
}
