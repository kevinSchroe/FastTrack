<!doctype html>
@extends('layouts.app')
@section('content')

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">

            </div>
                // Anbindung des Google-Kalenders  vorerst nur für Testzwecke
                <p dir="ltr">&nbsp;<iframe align="left" frameborder="0" height="600" sandbox="allow-same-origin allow-scripts" scrolling="no" src="https://calendar.google.com/calendar/embed?src=b7in3rlvlg09etmlc50nvskt8g%40group.calendar.google.com&amp;ctz=Europe/Berlin" width="845"></iframe></p>
        </div>
    </body>
</html>
@endsection