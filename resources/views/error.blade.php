@extends('layouts.app')

<!-- Errorseite, falls Fehler auftreten -->

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-error" >

                    <div style="text-align: center;">
                        <img src="/FastTrack/resources/assets/img/ups.jpg">

                    <h1 style="background-color: white"> <b> Uuups, da ist wohl etwas schiefgelaufen…</b> </h1>
                    <h4 style="background-color: white">Diese Seite wurde leider nicht gefunden.</h4>

                        <div style="text-align: center">
                            <a href="{{ url('dashboard') }}" class="btn btn-success" role="button">Zurück zum Dashboard</a>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
@endsection
