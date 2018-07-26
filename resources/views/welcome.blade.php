<!doctype html>
@extends('layouts.app')
@section('content')

    <body>
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
            <div class="container-fluid bg-3 text-center">

                <div>
                    <img src="/FastTrack/resources/assets/img/LogoFT.png">

                </div>

                <div class="container-fluid bg-3 text-center">

                    <div class="row">
                        <div class="col-sm-13">
                            <h1>FLEXIBEL <br> </h1>

                            <p> Du kannst deine Fahrstunden bis 12 Stunden vorher kostenlos umbuchen</p>
                        </div>
                        <div class="col-sm-13-w">
                            <h1>KOMPETENT</h1>
                            <p class="card-text">Du fährst nur mit von uns geprüften und zertifizierten Fahrlehrern </p>
                        </div>
                        <div class="col-sm-13">
                            <h1>GÜNSTIG</h1>
                            <p class="card-text">Du kannst zwischen verschiedenen Paketen wählen und hast die Kosten immer voll unter Kontrolle </p>
                        </div>
                        <div class="col-sm-13-w">
                            <h1>UNABHÄNGIG</h1>
                            <p class="card-text">Absolviere deine Theorie wann und wo du willst, ganz einfach am Laptop oder Smartphone </p>
                        </div>
                    </div>

                </div><br>
            </div>

    </article>
        </div>
    </body>

@endsection