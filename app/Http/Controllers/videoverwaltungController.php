<?php

namespace App\Http\Controllers;

use App\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class videoverwaltungController extends Controller
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
        if (Gate::allows('isadmin')) {
            $videos = video::all();
            return view('videoverwaltung.index', compact('videos'));
        } else {
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
        if (Gate::allows('isadmin')) {
            return view('videoverwaltung.create');
        } else {
            abort(401, 'This action is unauthorized.');
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        video::create([
            'video_title' => $request['video_title'],
            'video_url' => $request['video_url']
        ]);

        return redirect('videoverwaltung');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fragenkatalog $fragenkatalog
     * @return \Illuminate\Http\Response
     */
    public function edit($video_id)
    {
        if (Gate::allows('isadmin')) {
            $video = DB::table('videos')
                ->where('video_id', $video_id)
                ->first();
            return view('videoverwaltung.edit', compact('video'));
        } else {
            abort(401, 'This action is unauthorized.');
            return view('auth.login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\fragenkatalog $fragenkatalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $video_id)
    {
        //$video = DB::table('videos')
        //->where('video_id', $video_id)
        //->first();
        $this->validate($request, [
            'video_title' => 'required',
            'video_url' => 'required',
        ]);

        DB::table('videos')
            ->where('video_id', '=', $video_id)
            ->update(['video_title' => $request['video_title'],
                'video_url' => $request['video_url']]);

        return redirect('videoverwaltung');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fragenkatalog $fragenkatalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($video_id)
    {
        DB::table('videos')
            ->where('video_id', '=', $video_id)
            ->delete();

        /**
         * Stammdaten_User tabelle eintrag löschen
         */

        return redirect('videoverwaltung');
    }
}
