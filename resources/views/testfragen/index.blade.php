
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
                                <img src = "https://image.flaticon.com/icons/svg/190/190293.svg" width="200px" height="200">
                            </div>
                            <div class="box2">
                                <h4> Testfragen Vorfahrt</h4><br>
                                <p> Score: -- von 3 Fragen richtig</p><br>
                                <input type="button" onClick="parent.location='http://localhost/FastTrack/public/testfragen/vorfahrt'" value="Testbogen starten"><br>
                            </div>
                        </div>

                        <!--Übersicht Fragebogen Technik-->
                        <div class="Fragebogen">
                            <div class="box1">
                                <img src = "https://image.flaticon.com/icons/svg/535/535522.svg" width="200px" height="200">
                            </div>
                            <div class="box2">
                                <h4> Testfragen Technik</h4><br>
                                <p> Score: -- von 3 Fragen richtig</p><br>
                                <input type="button" onClick="parent.location='http://localhost/FastTrack/public/testfragen/technik'" value="Testbogen starten"><br>
                            </div>
                        </div>

                        <!--Übersicht Fragebogen Umwelt-->
                        <div class="Fragebogen">
                            <div class="box1">
                                <img src = "https://image.flaticon.com/icons/svg/861/861120.svg" width="200px" height="200">
                            </div>
                            <div class="box2">
                                <h4> Testfragen Umwelt</h4><br>
                                <p> Score: -- von 3 Fragen richtig</p><br>
                                <input type="button" onClick="parent.location='http://localhost/FastTrack/public/testfragen/umwelt'" value="Testbogen starten"><br>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

