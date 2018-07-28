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
use find;

class fahrlehrerVerwaltungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Kontrolle, ob Benutzer Adminrechte hat
        if (Gate::allows('isadmin')) {
            // Abfrage der DB fahrlehrer_verwaltungs, stammdatens, users über JOIN der drei Tabellen mit der Bedingung, dass role = fahrlehrer
            $fahrlehrer = DB::table('fahrlehrer_verwaltungs')
                ->join('stammdatens', 'fahrlehrer_verwaltungs.user_id', '=', 'stammdatens.user_id')
                ->join('users', 'fahrlehrer_verwaltungs.user_id', '=', 'users.id')
                ->select('fahrlehrer_verwaltungs.*', 'stammdatens.Vorname', 'stammdatens.Nachname', 'stammdatens.Geburtsdatum', 'users.role')
                -> where('users.role', '=', 'fahrlehrer')
                ->get();
            return view('fahrlehrerVerwaltung.index', compact('fahrlehrer_verwaltungs', 'stammdatens', 'benutzers', 'fahrlehrer'));
        }else {
            //abort(401, 'This action is unauthorized.');
            return view ('error');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fahrlehrerVerwaltung  $fahrlehrerVerwaltung
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        //Kontrolle, ob User Adminrechte hat
        if (Gate::allows('isadmin')) {
            //Zugriff auf die Datenbanken Stammdatens und fahrlehrer_verwaltungs, geschlüsselt über die user_id
            $daten = stammdaten::find($user_id);
            $fahrlehrer = DB::table('fahrlehrer_verwaltungs')
                ->where('fahrlehrer_verwaltungs.user_id', '=', $user_id)
                ->select('fahrlehrer_verwaltungs.*')
                ->first();
          //  $fahrlehrer = fahrlehrerVerwaltung::find($daten);


            return view('fahrlehrerVerwaltung.edit', compact( 'stammdaten', 'fahrlehrerVerwaltung', 'fahrlehrer', 'daten'));
        } else {
            // abort(401, 'This action is unauthorized.');
            return view('error');

        }
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

        //Validieren, ob alle erforderlichen Felder ausgefüllt sind
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

    // Stellt die Daten für die "normale" Ansicht der Fahrlehrer
    public function ansicht(fahrlehrerVerwaltung $fahrlehrerVeraltung)
    {
        // Abfrage der DB fahrlehrer_verwaltungs, stammdatens, users über JOIN der drei Tabellen mit der Bedingung, dass role = fahrlehrer
        $fahrlehrer = DB::table('fahrlehrer_verwaltungs')
            ->join('stammdatens', 'fahrlehrer_verwaltungs.user_id', '=', 'stammdatens.user_id')
            ->join('users', 'fahrlehrer_verwaltungs.user_id', '=', 'users.id')
            ->select('fahrlehrer_verwaltungs.*', 'stammdatens.Vorname', 'stammdatens.Nachname', 'stammdatens.Geburtsdatum', 'users.role')
            -> where('users.role', '=', 'fahrlehrer')
            ->get();
        return view('fahrlehrerVerwaltung.ansicht', compact('fahrlehrer_verwaltungs', 'stammdatens', 'benutzers', 'fahrlehrer'));
    }
}
