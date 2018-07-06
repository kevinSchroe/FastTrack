<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AdminController extends Controller
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
     *ll
     * @return \Illuminate\Http\Response
*/
    public function index()
    {


        $user = Auth::user();
        $user ->authorizeRoles(['admin']);
        return view(  'admin.admin_dashboard');
    }

}
