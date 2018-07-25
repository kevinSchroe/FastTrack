@extends('layouts.app')

@section('content')

    <?php
    //Hier der DB Insert Code für die Statistiken (Siehe fragebogen_generator.js)
    if (isset($_POST['kategorie'])) {
        $uid = Auth::user()->id;
        $kategorie = $_POST['kategorie'];
        $anzahl_antworten = $_POST['antworten'];
        $anzahl_richtig = $_POST['richtig'];

        echo $kategorie, '  ', $anzahl_antworten, ' ', $anzahl_richtig;
    }

    ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <?php
                $uid = Auth::user()->id;
                $stats = DB::table('statistiken')->select('kategorie', 'anzahl_test', 'anzahl_antworten', 'anzahl_richtig')->where('user_id', $uid)->get();
                if (sizeof($stats) !== 0) echo $stats;
                else echo 'Bisher noch keine Fragen absolviert!'
                ?>
                <!-- Statistiken hier -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
