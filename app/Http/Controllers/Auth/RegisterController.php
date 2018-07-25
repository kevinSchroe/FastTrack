<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Stammdaten;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     *
     * Funktion zum Anlegen eines Users, inkl. vergabe der Default-Rolle fahrschueler
     */


    protected function create(array $data)
    {
        $user = User::create([
            'role' => 'fahrschueler',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);


         Stammdaten::create([
            'user_id' => $user->id,
            'Vorname' => $data['Vorname'],
            'Nachname' => $data['Nachname'],
            'Strasse' => $data['Strasse'],
            'Hausnummer' => $data['Hausnummer'],
            'Postleitzahl' => $data['Postleitzahl'],
            'Ort' => $data['Ort'],
            'Geburtsdatum' => $data['Geburtsdatum'],
            'Telefonnummer' => $data['Telefonnummer'],
            'IBAN' => $data['IBAN'],
            'BIC' => $data['BIC'],

        ]);


        return $user;
    }


}
