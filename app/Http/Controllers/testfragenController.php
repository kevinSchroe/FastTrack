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

    //Anzeigen der Vorfahrt-View mit den Daten aus der Datenbank-Tabelle "fragenkatalogs"
    public function vorfahrt(Fragenkatalog $fragenkatalogs)
    {
        return view('testfragen.vorfahrt', compact('fragenkatalogs'));
    }
    //Anzeigen der Technik-View mit den Daten aus der Datenbank-Tabelle "fragenkatalogs"
    public function technik(Fragenkatalog $fragenkatalogs)
    {
        return view('testfragen.technik', compact('fragenkatalogs'));
    }

    //Anzeigen der Vorfahrt-View mit den Daten aus der Datenbank-Tabelle "fragenkatalogs"
    public function umwelt(Fragenkatalog $fragenkatalogs)
    {
        return view('testfragen.umwelt', compact('fragenkatalogs'));
    }
}
