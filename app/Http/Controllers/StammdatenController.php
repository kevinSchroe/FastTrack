<?php

namespace App\Http\Controllers;

use App\stammdaten;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Validator;
use Gate;


class StammdatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * die Variable benutzer wird anstelle von user genommen (das user eine Systemvariable ist)
     */
    public function index()
    {
        $stammdatens = Stammdaten::all();
        $benutzers = User::all();

        $user = Auth::user();

        if (Gate::allows('isadmin')) {
            return view('benutzerverwaltung.index', compact('stammdatens', 'benutzers'));
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
        return view('benutzerverwaltung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {
        $user = User::create([
            'role' => $request['role'],
            'name' => $request['name'],
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
     * Show the for editing the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $stammdaten = Stammdaten::where('user_id', '=', $id)->get()[0];
        $this->validate($request, [


            'name' => 'required',
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
        $user->delete();

        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('stammdaten');
    }
}
