<?php

namespace App\Http\Controllers;

use App\stammdaten;
use App\User;
use Illuminate\Http\Request;



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
        $stammdatens =Stammdaten::all();
        $benutzers = User::all();

        return view('benutzerverwaltung.index', compact('stammdatens', 'benutzers'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'role'=> $request['role'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);


        Stammdaten::create([
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
     * @param  \App\stammdaten  $stammdaten
     * @return \Illuminate\Http\Response
     */
    public function show(stammdaten $stammdaten)
    {
        $data=Stammdaten::select("select * from stammdaten");
    print_r($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stammdaten  $stammdaten
     * @return \Illuminate\Http\Response
     */


        public function edit($id)
    {
        // get the nerd
        $aktuelleStammdaten= Stammdaten::find($id);
        $aktuellerUser = User::find($id);
        // show the edit form and pass the nerd
        return View::make('stammdaten.edit')
            ->with('User', $aktuellerUser, $aktuelleStammdaten, $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stammdaten  $stammdaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stammdaten $stammdaten)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stammdaten  $stammdaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $benutzers = Benutzer::find($id);
        $benutzers->delete();
        $users = User::find($id);
        $users->delete();
        return redirect('stammdaten');
    }
}
