<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mac;
use App\Active;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $macs = Mac::get();
        $on = Active::first()->value('switch');
	return view('home')
            ->with('macs', $macs)
            ->with('on', $on);
    }
}
