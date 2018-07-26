<?php

namespace App\Http\Controllers;

use App\fragenkatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


class FragenkatalogController extends Controller
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
        $fragenkatalogs = fragenkatalog::all();
        return view('Fragen.index', compact('fragenkatalogs'));

        $user = Auth::user();

        if (Gate::allows('isadmin')) {
            return view('Fragen.index', compact('fragenkatalogs'));
        }else {
            abort(401, 'This action is unauthorized.');
            return view('auth.login');
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
        Fragenkatalog::create([
            'Kategorie' => $request['Kategorie'],
            'frage' => $request['frage'],
            'antworten' => $request['antworten'],
            'richtig' => $request['richtig'],
        ]);

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
    public function destroy($fragen_id)
    {
        $fragenkatalog = fragenkatalog::where('fragen_id', '=', $fragen_id);
        $fragenkatalog->delete();

        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('fragenkatalog');
    }
}
