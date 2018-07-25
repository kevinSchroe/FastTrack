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
        $stammdatens = Stammdaten::all();
        $benutzers = User::all();

         $user = Auth::user();

       if (Gate::allows('isadmin')) {
           return view('fahrlehrerVerwaltung.index', compact('fahrlehrer_verwaltungs', 'stammdatens', 'benutzers'));
       }else {
           abort(401, 'This action is unauthorized.');
       }
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
    public function edit($id)
    {
        $user = fahrlehrerVerwaltung::find($id);
        return view('fahrlehrerVerwaltung.edit', compact('user', 'stammdaten', 'fahrlehrer_verwaltung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $fahrlehrerVerwaltung = fahrlehrerVerwaltung::where('user_id', '=', $id)->get()[0];
        $this->validate($request, [

            'Vorname' => 'required',
            'Nachname' => 'required',
            'Geburtsdatum' => 'required',
            'einsatzgebiet' => 'required',
            'fahrlehrer_seit' => 'required',
            'automarke' => 'required',
            'auto_baujahr' => 'required',
            'kennzeichen' => 'required',
            'beschreibung' => 'required',
        ]);

        $fahrlehrerVerwaltung->update($request->all());
        $fahrlehrerVerwaltung->stammdaten->update($request->all());

        return redirect('fahrlehrerVerwaltung');
    }
}
