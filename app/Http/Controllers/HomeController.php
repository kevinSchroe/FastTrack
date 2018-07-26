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
    //prüft, ob der Benutzer eingeloggt ist
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
    public function kalender()
    {
        return view('kalender');
    }
    public function error()
    {
        return view('error');
    }

    public function home()
    {
        return view('welcome');
    }

    public function dashboard()
    {

       /**prüft, Admins bekommen ein anderes Dashoard angezeigt wie Fahrschüeler und Fahrlehrer*/
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

    public function livestream()
    {

        return view('livestream');

    }

    public function testfragen()
    {


            return view('testfragen');


    }

}
