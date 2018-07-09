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
            'user_id'=>$user->id,
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


        public function edit( $user)
    {
        return view('benutzerverwaltung.edit',compact( 'user', $user));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stammdaten  $stammdaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'role'=> 'role',
            'name' => 'name',
            'email' => 'email',
            'password' => bcrypt('password'),

            'Vorname'=> 'Vorname',
            'Nachname' => 'Nachname',
            'Strasse' => 'Strasse',
            'Hausnummer' => 'Hausnummer',
            'Postleitzahl' => 'Postleitzahl',
            'Ort' => 'Ort',
            'Geburtsdatum' => 'Geburtsdatum',
            'Telefonnummer' => 'Telefonnummer',
            'IBAN' => 'IBAN',
            'BIC' => 'BIC',
        ]);

        $benutzers = User::find($id);
        $benutzersUpdate = $request->all();
        $benutzers->update($benutzersUpdate);

        $users = User::find($id);
        $usersUpdate = $request->all();
        $users->update($usersUpdate);



        return redirect('stammdaten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stammdaten  $stammdaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User:: where('id', $id);
        $users->delete();
        $users = Stammdaten::where('user_id', $id);
        $users->delete();

        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('stammdaten');
    }
}
