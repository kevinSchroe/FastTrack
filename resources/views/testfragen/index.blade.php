<!-- Übersicht über die Testbögen für die Fahrschüler -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Testfragen - Teste dein Wissen!</div>

                    <div class="card-body">

                        <!-- Übersicht Fragebogen Vorfahrt-->
                        <div class="Fragebogen">
                            <div class="box1">
                                <img src = "/FastTrack/resources/assets/img/traffic-sign.png" width="200px" height="200">
                            </div>
                            <div class="box2">
                                <h4> Testfragen Vorfahrt</h4><br>
                                <a href="testfragen/vorfahrt" class="btn btn-dark">Testbogen starten</a>
                            </div>
                        </div>

                        <!--Übersicht Fragebogen Technik-->
                        <div class="Fragebogen">
                            <div class="box1">
                                <img src = "/FastTrack/resources/assets/img/technics.png" width="200px" height="200">
                            </div>
                            <div class="box2">
                                <h4> Testfragen Technik</h4><br>
                                <a href="testfragen/technik" class="btn btn-dark">Testbogen starten</a>
                            </div>
                        </div>

                        <!--Übersicht Fragebogen Umwelt-->
                        <div class="Fragebogen">
                            <div class="box1">
                                <img src = "/FastTrack/resources/assets/img/ecology.png" width="200px" height="200">
                            </div>
                            <div class="box2">
                                <h4> Testfragen Umwelt</h4><br>
                                <a href="testfragen/umwelt" class="btn btn-dark">Testbogen starten</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

