@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-error" >

                    <div style="text-align: center;">
                        <img src="ups.jpg" width="185" height="259" >

                    <h1 style="background-color: white"> <b> Uuups da ist was schief gelaufen…</b> </h1>
                    <h4 style="background-color: white">Diese Seite wurde leider nicht gefunden.</h4>

                        <div style="text-align: center">
                            <a href="{{ url('dashboard') }}" class="btn btn-success" role="button">Zurück zum Dashboard</a>


                        </div>
                    </div>

                </div>
        </div>
    </div>
@endsection
