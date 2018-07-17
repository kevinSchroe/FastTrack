<?php

namespace App\Http\Controllers;

use App\fahrlehrerVerwaltung;
use Illuminate\Http\Request;
use App\stammdaten;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Validator;
use Gate;
use Form;

class fahrlehrerVerwaltungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fahrlehrer_verwaltungs = fahrlehrerVerwaltung::all();
        return view('fahrlehrerVerwaltung.index', compact('fahrlehrer_verwaltungs'));

         $user = Auth::user();

       if (Gate::allows('isadmin')) {
           return view('fahrlehrerVerwaltung.index', compact('fahrlehrer_verwaltungs'));
       }else {
           abort(401, 'This action is unauthorized.');
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fahrlehrerVerwaltung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = fahrlehrerVerwaltung::create([
            'fahrlehrer_vorname' => $request['fahrlehrer_vorname'],
            'fahrlehrer_nachname' => $request['fahrlehrer_nachname'],
            'fahrlehrer_geburtsjahr' => $request['fahrlehrer_geburtsjahr'],
            'auto_marke' => $request['auto_marke'],
            'auto_baujahr' => $request['auto_baujahr'],
            'kennzeichen' => $request['kennzeichen'],
            'fahrlehrer_seit' => $request['fahrlehrer_seit'],
            'beschreibung' => $request['beschreibung'],

        ]);

        return redirect('fahrlehrerVerwaltung');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function show(fahrlehrerVerwaltung $fahrlehrerVerwaltung)
    {
        $data = farhlehrerVerwaltung::select("select * from fahrlehrerVerwaltung");
        print_r($data);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function edit($fahrlehrer_id)
    {
        $fahrlehrerVerwaltung = fahrlehrerVerwaltung::find($fahrlehrer_id);
        return view('fahrlehrerVerwaltung.edit', compact('fahrlehrer_id', 'fahrlehrerVerwaltung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $fahrlehrer_id)
    {
        $fahrlehrerVerwaltung = fahrlehrerVerwaltung::where('fahrlehrer_id', '=', $fahrlehrer_id)->get()[0];
        $this->validate($request, [

            'fahrlehrer_vorname' => 'required',
            'fahrlehrer_nachname' => 'required',
            'fahrlehrer_geburtsjahr' => 'required',
            'auto_marke' => 'required',
            'auto_baujahr' => 'required',
            'auto_baujahr' => 'required',
            'kennzeichen' => 'required',
            'fahrlehrer_seit' => 'required',
            'beschreibung' => 'required',
        ]);

        $fahrlehrerVerwaltung->update($request->all());


        return redirect('fahrlehrerVerwaltung');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function destroy($fahrlehrer_id)
    {
        $fahrlehrerVerwaltung = fahrlehrerVerwaltung::find($fahrlehrer_id);
        $fahrlehrerVerwaltung->delete();

        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('fragenkatalog');
    }
}
