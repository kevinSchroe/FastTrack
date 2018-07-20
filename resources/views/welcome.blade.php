<!doctype html>
@extends('layouts.app')
@section('content')

    <body xmlns="http://www.w3.org/1999/html">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth

                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

    <article>
            <div class="container">

                <div class="container-fluid bg-3 text-center">

                    <div class="row">
                        <div class="col-sm-3">
                            <h1>FLEXIBEL <br> </h1>

                            <p> Du kannst deine Fahrstunden bis 12 Stunden vorher kostenlos umbuchen</p>
                        </div>
                        <div class="col-sm-3-w">
                            <h1>EXELLENTE AUSBILDUNG</h1>
                            <p class="card-text">Du fährst nur mit von uns geprüften und zertifizierten Fahrlehrern </p>
                        </div>
                        <div class="col-sm-3">
                            <h1>GÜNSTIG</h1>
                            <p class="card-text">Du kannst zwischen verschiedenen Paketen wählen und hast immer die Kosten immer voll unter Kontrolle </p>
                        </div>
                        <div class="col-sm-3-w">
                            <h1>Unabhängig</h1>
                            <p class="card-text">Absolviere deine Theoriewann und wo du willst,  ganz einfach am Laptop oder Smartphone </p>
                        </div>
                    </div>
                </div><br>
            </div>

    </article>
        </div>
    </body>

@endsection