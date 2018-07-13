<?php

namespace App\Http\Controllers;

use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Gate;


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

        if (Gate::allows('isadmin')) {
            return view(  'admin.admin_dashboard');
        }else {
            abort(401, 'This action is unauthorized.');
        }



    }

}
