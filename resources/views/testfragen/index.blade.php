@extends('layouts.app')

@section('header')
    <h2>Testfragen</h2>
@stop

@section('content')
    <main>
        <!-- Haupt-Div; Hier sollen die verschiedenen Fragebögen angezeigt werden -->
        <h1> Teste dein Wissen</h1>

        <!-- Übersicht Fragebogen Vorfahrt-->
        <div class = "Fragebogen">
            <img src = "https://image.gala.de/21462000/uncropped-0-0/79316c272bff76433a49fd074523e51b/Bo/vorfahrtsquiz.jpg"/>
            <h3> Testfragen Vorfahrt</h3>
            <p> Score: -- von 3 Fragen richtig</p>
            <!--Buttom zum starten der fragenkatalog, Weiterleitung zu testfragen1.blade.php (Über link)-->
            <!-- Warum Parent Location?-->
            <input type="button" onClick="parent.location='http://localhost/FastTrack/public/testfragen/vorfahrt'" value="Testbogen starten">
        </div>

        <!--Übersicht Fragebogen Verkehrszeichen-->
        <div class = "Fragebogen">
            <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_Qjkfjsbxd2r0dFUsVAY3mejlANgqHYR73zuvZTueI7VgcbXacw"/>
            <h3> Testfragen Technik</h3>
            <p> Score: -- von 3 Fragen richtig</p>
            <!--Buttom zum starten der fragenkatalog, Weiterleitung zu testfragen1.blade.php (Über link, ANPASSEN?)-->
            <input type="button" onClick="parent.location='http://localhost/FastTrack/public/testfragen/technik'" value="Testbogen starten">
        </div>

        <!--Übersicht Fragebogen Umwelt-->
        <div class = "Fragebogen">
            <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_Qjkfjsbxd2r0dFUsVAY3mejlANgqHYR73zuvZTueI7VgcbXacw"/>
            <h3> Testfragen Umwelt</h3>
            <p> Score: -- von 3 Fragen richtig</p>
            <!--Buttom zum starten der fragenkatalog, Weiterleitung zu testfragen1.blade.php (ANPASSEN?)-->
            <!-- Warum Parent Location?-->
            <input type="button" onClick="parent.location='http://localhost/FastTrack/public/testfragen/umwelt'" value="Testbogen starten">

        </div>
    </main>
@endsection
