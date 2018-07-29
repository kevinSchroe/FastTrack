<?php

namespace App\Http\Controllers;

use App\stammdaten;
use App\User;
use App\fahrlehrerVerwaltung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Validator;
use Gate;


class StammdatenController extends Controller
{
    /**Prüfung, ob der Benutzer eingeloggt ist, um Zugriff von Unbefugten zu verhindern*/
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /**Erstellung einer Liste mit allen Benutzern für die Übersicht*/


        $user = Auth::user();

        if (Gate::allows('isadmin')) {

            $stammdatens = Stammdaten::all();
            $benutzers = User::all();

            return view('benutzerverwaltung.index', compact('stammdatens', 'benutzers'));
        }else {
           // abort(401, 'This action is unauthorized.');
            return view ('error');
        }


    }


    public function create()
    {
        //Kontrolle, ob User Adminrechte hat
        if (Gate::allows('isadmin')) {
            return view('benutzerverwaltung.create');
        }else {
            // abort(401, 'This action is unauthorized.');
            return view('error');
        }
    }

    /**Verweis zum User und zu denn Stammdaten, um die Benutzer anzulegen*/
    public function store(Request $request)


    {
        $user = User::create([
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);


        Stammdaten::create([
            'user_id' => $user->id,
            'Vorname' => $request['Vorname'],
            'Nachname' => $request['Nachname'],
            'Strasse' => $request['Strasse'],
            'Hausnummer' => $request['Hausnummer'],
            'Postleitzahl' => $request['Postleitzahl'],
            'Ort' => $request['Ort'],
            'Geburtsdatum' => $request['Geburtsdatum'],
            'Telefonnummer' => $request['Telefonnummer'],
            'IBAN' => $request['IBAN'],
            'BIC' => $request['BIC'],

        ]);

        if($request['role'] == 'fahrlehrer')
        fahrlehrerVerwaltung::create([
            'user_id' => $user->id,
        ]);

        return redirect('stammdaten');


    }


    public function show(stammdaten $stammdaten)
    {
        $data = Stammdaten::select("select * from stammdaten");
        print_r($data);
    }

    /**
     * Dient zur Vorblendung der Stammdaten bei der Editierfunktion
     *
     * @param  \App\stammdaten $stammdaten
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        //Kontrolle, ob User Adminrechte hat
        if (Gate::allows('isadmin')) {
            $user = User::find($id);
            return view('benutzerverwaltung.edit', compact('user', 'stammdaten'));
        }else {
            // abort(401, 'This action is unauthorized.');
            return view('error');
        }
    }

    /**
     * Zum Bearbeiten / Update der User- / Stammdaten in der Datenbank
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $stammdaten = Stammdaten::where('user_id', '=', $id)->get()[0];
        $this->validate($request, [


            'role' => 'required',

            'Vorname' => 'required',
            'Nachname' => 'required',
            'Strasse' => 'required',
            'Hausnummer' => 'required',
            'Postleitzahl' => 'required',
            'Ort' => 'required',
            'Geburtsdatum' => 'required',
            'Telefonnummer' => 'required',
            'IBAN' => 'required',
            'BIC' => 'required',
        ]);

        $stammdaten->update($request->all());
        $stammdaten->user->update($request->all());

        return redirect('stammdaten');

    }

    /**
     * Updaten von einzelnen Änderungen
     *
     * @param  \App\stammdaten $stammdaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $role = $user->role;

        /*
        if($role == 'fahrlehrer'){
            $user->fahrlehrerVerwaltung->delete();
            $user->stammdaten->delete();
            $user->delete();
        }elseif($role == 'fahrschueler'){
            $user->stammdaten->delete();
            $user->delete();
            $user->statistiken->delete();
            //$user->DB::table("select * from statistiken")->delete();
        }
        else{
            $user->stammdaten->delete();
            $user->delete();
        }*/
        $user->stammdaten->delete();
        $user->delete();
        if($role == 'fahrlehrer'){
            $user->fahrlehrerVerwaltung->delete();
        }elseif($role == 'fahrschueler'){
            DB::table("statistiken")->where('user_id', '=', $id)->delete();
        }


        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('stammdaten');
    }
}
