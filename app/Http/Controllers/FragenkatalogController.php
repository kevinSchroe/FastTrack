<?php

namespace App\Http\Controllers;

use App\fragenkatalog;
use Illuminate\Http\Request;
use App\stammdaten;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Validator;
use Gate;
use Form;


class FragenkatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fragenkatalogs = fragenkatalog::all();
        return view('Fragen.index', compact('fragenkatalogs'));

         $user = Auth::user();

       if (Gate::allows('isadmin')) {
           return view('Fragen.index', compact('fragenkatalogs'));
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
        return view('Fragen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = Fragenkatalog::create([
                'Kategorie' => $request['Kategorie'],
                'frage' => $request['frage'],
                'richtige_antwort' => $request['richtige_antwort'],
                'erste_falsche_antwort' => $request['erste_falsche_antwort'],
                'zweite_falsche_antwort' => $request['zweite_falsche_antwort'],

            ]);

            /* $data = $request -> validate([
                 'Kategorie' => 'required',
                 'frage' => 'required',
                 'richtige_antwort' => 'required',
                 'erste_falsche_antwort' => 'required',
                 'zweite_falsche_antwort' => 'required',

             ]);*/
        return redirect('fragenkatalog');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\fragenkatalog  $fragenkatalog
     * @return \Illuminate\Http\Response
     */
    public function show(fragenkatalog $fragenkatalog)
    {
        $data = Fragenkatalog::select("select * from fragenkatalog");
        print_r($data);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fragenkatalog  $fragenkatalog
     * @return \Illuminate\Http\Response
     */
    public function edit($fragen_id)
    {
        $fragenkatalog = Fragenkatalog::find($fragen_id);
        return view('fragen.edit', compact('fragen_id', 'fragenkatalog'));
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
        $fragenkatalog = Fragenkatalog::where('fragen_id', '=', $fragen_id)->get()[0];
        $this->validate($request, [


            'Kategorie' => 'required',
            'frage' => 'required',
            'richtige_antwort' => 'required',
            'erste_falsche_antwort' => 'required',
            'zweite_falsche_antwot' => 'required',

        ]);

        $fragenkatalog->update($request->all());


        return redirect('fragenkatalog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fragenkatalog  $fragenkatalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($fragen_id)
    {
        $fragenkatalog = fragenkatalog::find($fragen_id);
        $fragenkatalog->delete();

        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('fragenkatalog');
    }
}
