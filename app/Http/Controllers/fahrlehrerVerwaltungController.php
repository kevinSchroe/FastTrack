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
use Illuminate\Support\Facades\DB;

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


        $fahrlehrer = DB::table('fahrlehrer_verwaltungs')
            ->join('stammdatens', 'fahrlehrer_verwaltungs.user_id', '=', 'stammdatens.user_id')
            ->join('users', 'fahrlehrer_verwaltungs.user_id', '=', 'users.id')
            ->select('fahrlehrer_verwaltungs.*', 'stammdatens.Vorname', 'stammdatens.Nachname', 'stammdatens.Geburtsdatum', 'users.role')
            -> where('users.role', '=', 'fahrlehrer')
            ->get();

        $user = Auth::user();

        if (Gate::allows('isadmin')) {
            return view('fahrlehrerVerwaltung.index', compact('fahrlehrer_verwaltungs', 'stammdatens', 'benutzers', 'fahrlehrer'));
        }else {
            //abort(401, 'This action is unauthorized.');
            return view ('error');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function show(fahrlehrerVerwaltung $fahrlehrerVerwaltung)
        // Einschränken, dass Rolle = Fahrlehrer
    {
        //$data = Stammdaten::select("select * from fahrlehrer_verwaltungs, stammdatens, users where role ='fahrlehrer'");

        $data =DB::table('fahrlehrer_verwaltungs')
            ->join('stammdatens', 'fahrlehrer_verwaltungs.user_id', '=', 'stammdatens.user_id')
            ->join('users', 'fahrlehrer_verwaltungs.user_id', '=', 'users.id')
            ->select('fahrlehrer_verwaltungs.*', 'stammdatens.Vorname', 'stammdatens.Nachname', 'stammdatens.Geburtsdatum', 'users.role')
            -> where('users.role', '=', 'fahrlehrer')
            ->get();

        print_r($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        // Einschränken, dass Rolle = Fahrlehrer
        $daten = Stammdaten::find($user_id);
        $fahrlehrer = fahrlehrerVerwaltung::find($user_id);

        return view('fahrlehrerVerwaltung.edit', compact( 'stammdaten', 'fahrlehrer_verwaltung', 'fahrlehrer', 'daten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $user_id)
    {
        $fahrlehrerVerwaltung = fahrlehrerVerwaltung::where('user_id', '=', $user_id)->get()[0];

        $this->validate($request, [

            'einsatzgebiet' => 'required',
            'fahrlehrer_seit' => 'required',
            'automarke' => 'required',
            'auto_baujahr' => 'required',
            'kennzeichen' => 'required',
            'beschreibung' => 'required',
        ]);

        $fahrlehrerVerwaltung->update($request->all());


        return redirect('fahrlehrerVerwaltung');
    }

    public function ansicht(fahrlehrerVerwaltung $fahrlehrerVeraltung)
    {
        $fahrlehrer = DB::table('fahrlehrer_verwaltungs')
            ->join('stammdatens', 'fahrlehrer_verwaltungs.user_id', '=', 'stammdatens.user_id')
            ->join('users', 'fahrlehrer_verwaltungs.user_id', '=', 'users.id')
            ->select('fahrlehrer_verwaltungs.*', 'stammdatens.Vorname', 'stammdatens.Nachname', 'stammdatens.Geburtsdatum', 'users.role')
            -> where('users.role', '=', 'fahrlehrer')
            ->get();
        return view('fahrlehrerVerwaltung.ansicht', compact('fahrlehrer_verwaltungs', 'stammdatens', 'benutzers', 'fahrlehrer'));
    }
}
