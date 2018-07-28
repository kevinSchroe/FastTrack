<?php

namespace App\Http\Controllers;

use App\fragenkatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


class FragenkatalogController extends Controller
{
    //Kontrolle ob eingeloggt --> falls nein: Zugriff verweigert
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
        //Kontrolle, ob User Adminrechte hat
        if (Gate::allows('isadmin')) {
            $fragenkatalogs = fragenkatalog::all();
            return view('Fragen.index', compact('fragenkatalogs'));
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
        //Kontrolle, ob User Adminrechte hat
        if (Gate::allows('isadmin')) {
            return view('Fragen.create');
        }else {
            // abort(401, 'This action is unauthorized.');
            return view ('error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Speichern der eingegebenen Daten in der Datenbank
    public function store(Request $request)
    {
        Fragenkatalog::create([
            'Kategorie' => $request['Kategorie'],
            'frage' => $request['frage'],
            'antworten' => $request['antworten'],
            'richtig' => $request['richtig'],
        ]);

        return redirect('fragenkatalog');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fragenkatalog  $fragenkatalog
     * @return \Illuminate\Http\Response
     */
//Bearbeiten der Fragen unter der Vorraussetzung, dass User = Admin)
    public function edit($fragen_id)
    {
        if (Gate::allows('isadmin')) {
            $frage = DB::table('fragenkatalogs')
                ->where('fragen_id', $fragen_id)
                ->first();
            return view('Fragen.edit', compact('frage'));
        } else {
            abort(401, 'This action is unauthorized.');
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fragenkatalog  $fragenkatalog
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, int $fragen_id)
    {
        $this->validate($request, [
            'frage' => 'required',
            'antworten' => 'required',
            'richtig' => 'required',
        ]);

        DB::table('fragenkatalogs')
            ->where('fragen_id', '=', $fragen_id)
            ->update(['frage' => $request['frage'],
                'antworten' => $request['antworten'],
                'richtig' => $request['richtig']]);

        return redirect('fragenkatalog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fragenkatalog  $fragenkatalog
     * @return \Illuminate\Http\Response
     */
    //Löschen der gewünschten Datensätze in DB
    public function destroy($fragen_id)
    {
        if (Gate::allows('isadmin')) {

            $fragenkatalog = fragenkatalog::where('fragen_id', '=', $fragen_id);
            $fragenkatalog->delete();

            return redirect('fragenkatalog');
        }else {
            // abort(401, 'This action is unauthorized.');
            return view ('error');
        }

    }
}
