@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-error" >

                    <div style="text-align: center;">
                        <img src="ups.jpg" width="185" height="259" >

                    <h1> Uuups da ist was schief gelaufen…</h1>
                    <h4>Diese Seite wurde leider nicht gefunden.</h4>

                        <div style="text-align: center">
                            <a href="{{ url('dashboard') }}" class="btn btn-info" role="button">Zurück zum Dashboard</a>


                        </div>
                    </div>

                </div>
        </div>
    </div>
@endsection
