<?php

namespace App\Http\Controllers;

use App\fragenkatalog;
use Illuminate\Http\Request;
use DB;
use mapWithKeys;

class testfragenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

            return view(  'testfragen.index');

    }

    public function vorfahrt(Fragenkatalog $fragenkatalogs)
    {
        return view('testfragen.vorfahrt', compact('fragenkatalogs'));
    }

    public function technik(Fragenkatalog $fragenkatalogs)
    {
        return view('testfragen.technik', compact('fragenkatalogs'));
    }

    public function umwelt(Fragenkatalog $fragenkatalogs)
    {
        return view('testfragen.umwelt', compact('fragenkatalogs'));
    }


    public function subpage(Request $request, Fragenkatalog $fragenkatalogs)
    {
        dd($request->all());
        //dd($request->get(1)==='richtige_antwort');

    }
}
