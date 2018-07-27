<?php

namespace App\Http\Controllers;

use App\stammdaten;
use App\User;
use App\fahrlehrerVerwaltung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Validator;
use Gate;


class StammdatenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * die Variable benutzer wird anstelle von user genommen (das user eine Systemvariable ist)
     */
    public function index()
    {



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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('benutzerverwaltung.create');
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
        ]);else{}

        return redirect('stammdaten');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stammdaten $stammdaten
     * @return \Illuminate\Http\Response
     */
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
        $user = User::find($id);
        return view('benutzerverwaltung.edit', compact('user', 'stammdaten'));
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
     * Remove the specified resource from storage.
     *
     * @param  \App\stammdaten $stammdaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->stammdaten->delete();
        if (Gate::allows('isfahrlehrer')){
            $user->fahrlehrerVerwaltung->delete();
        }

        $user->delete();

        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('stammdaten');
    }
}
