<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        return view('welcome');
    }
    public function error()
    {
        return view('error');
    }

    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {


        if (Gate::allows('isadmin')) {
            return view('admin.admin_dashboard');
        } else {
            return view('dashboard');
        }

    }

    public function videos()
    {

         return view('videos');

    }

    public function testfragen()
    {

        if (Gate::allows('isadmin')) {
            return view('testfragen.index');
        } else {
            return view('testfragen');
        }

    }

}
