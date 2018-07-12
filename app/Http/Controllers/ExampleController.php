<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index() {
        return view('example');
    }

    public function example(Request $request) {
       return $request->get('hallo');
       // bb($request);
    }
}
