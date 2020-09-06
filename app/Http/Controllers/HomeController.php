<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function aims(){
         return view('web.cms.aims');
    }

    public function aboutUs(){
        return view('web.cms.about');
    }

    public function contactUs(){
        return view('web.cms.contact');
    }
}
