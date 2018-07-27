@extends('layouts.app')

@section('content')

    <?php
    //Hier der DB Insert Code für die Statistiken (Siehe fragebogen_generator.js)
    if (isset($_POST['kategorie'])) {
        $uid = Auth::user()->id;
        $kategorie = $_POST['kategorie'];
        $anzahl_antworten = $_POST['antworten'];
        $anzahl_richtig = $_POST['richtig'];
        //Nun eine query zusammensetzen die evtl Einträge schon berücksichtigt
        //Abfragen ob evtl schon einträge vorhanden sind
        $stats = DB::table('statistiken')
            ->select('kategorie', 'anzahl_test', 'anzahl_antworten', 'anzahl_richtig')
            ->where('user_id', $uid)
            ->where('kategorie', $kategorie)
            ->get();
        //Wenn ja, dann aufaddieren ansonsten anlegen
        if (sizeof($stats) !== 0) { //Vorhanden also ein update
            DB::table('statistiken')
                ->where('user_id', $uid)
                ->where('kategorie', $kategorie)
                ->update(
                    ['anzahl_test' => $stats[0]->anzahl_test + 1,
                        'anzahl_antworten' => $stats[0]->anzahl_antworten + $anzahl_antworten,
                        'anzahl_richtig' => $stats[0]->anzahl_richtig + $anzahl_richtig]
                );
        } else { //Nicht Vorhanden also ein insert
            DB::table('statistiken')->insert(
                ['user_id' => $uid, 'kategorie' => $kategorie, 'anzahl_test' => 1, 'anzahl_antworten' => $anzahl_antworten, 'anzahl_richtig' => $anzahl_richtig]
            );
        }
    }

    ?>

    <head>
        <!-- Import google charts and the Script for Chart Creating -->
        <script src="{{URL::asset('js/charts/loader.js')}}"></script>
        <script src="{{URL::asset('js/charts/charts.js')}}"></script>
        <script src="{{URL::asset('js/dashboard_stats.js')}}"></script>
    </head>


    <div class="container">
        <div class="row justify-content-center">
            <div style="width: 88%">
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

                    ?>
                    <!-- Statistiken hier -->
                        <div class="container flex-column" style="display: flex">
                                <span class="text-md-left">Hallo <?php $query = DB::table('stammdatens')
                                                                                ->select('vorname')
                                                                                ->where('user_id', Auth::user()->id)->get();
                                    echo $query[0]->vorname?>!
                                <br>
                                <br>Hier siehst du deine bisherigen Statistiken:</span>
                            <?php  if (sizeof($stats) === 0) echo '<span style="margin-top: 3em; margin-bottom: 6em">Bisher noch keine Fragen absolviert!</span>'?>

                        @if (sizeof($stats)>=1)
                            </div>
                        <script>getData(<?php echo $stats?>)</script>
                        <div id="bar-chart-div">
                        </div>
                        <div id="pie-chart-div">
                        </div>
                        <table class="table">
                            <thead>
                            <th>Kategorie</th>
                            <th>Richtige Antworten</th>
                            <th>Falsche Antworten</th>
                            <th>Antworten Gesamt</th>

                            </thead>
                            <tbody>
                            @foreach($stats as $stat)
                                <tr>
                                    <td><?php
                                        $kat = $stat->kategorie;
                                        echo ucfirst($kat);
                                        ?></td>
                                    <td>{{$stat->anzahl_richtig}}</td>
                                    <td><?php echo $stat->anzahl_antworten - $stat->anzahl_richtig?></td>
                                    <td>{{$stat->anzahl_antworten}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            @endif
                    <div/>
                </div>
            </div>
        </div>
    </div>
@endsection
