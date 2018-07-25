<!-- Hier soll der Fragenkatalog-Umwelt hin-->
@extends('layouts.app')

@section('content')

    <!--Fragen aus der Datenbank in die Variable $Fragen laden -->
    <?php $fragen = DB::table('fragenkatalogs')->select('frage', 'fragen_id', 'antworten', 'richtig')->where('Kategorie', 'umwelt')->get() ?>

    <!-- JavaScript import zum evaluieren und generieren der Fragen und auch jQuery wird hier importiert (Evtl. Global machen?) -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{URL::asset('js/testfragen_generator.js')}}"></script>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <!--Der eigentliche HTML code beginnt hier, das meiste wird aus der JS Datei generiert-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Testfragen - Umwelt</div>
                    <div class="card-body" id="cardBody">
                        <script>generateQuestions(<?php echo $fragen ?>, 'umwelt')</script>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
