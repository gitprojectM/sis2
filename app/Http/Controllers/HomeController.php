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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolyears=DB::select('SELECT Year from school__years where status=1');
        $sems=DB::select('SELECT sem from sems where status=1');
        return view('home')>with('schoolyears',$schoolyears)->with('sems',$sems)->with('semes',$semes);
    }
}
