<!-- Übersicht über alle Fahrlehrer für die Fahrschüler -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Fahrlehrer</div>

                    <div class="card-body">
                        @foreach($fahrlehrer as $fahrlehrer)
                            <table id="anzeige">
                                <!-- Tabellen-Überschrift, um Namen abzuheben -->
                                <tr id="überschrift">
                                    <th>{{$fahrlehrer->Vorname}} {{$fahrlehrer->Nachname}}</th>
                                    <td></td>
                                </tr>
                                <!-- Tabelle mit linker Spalte als Tabellenkopf -->
                                <tr>
                                    <th>Geburtsdatum:</th>
                                    <td>{{$fahrlehrer->Geburtsdatum}}</td>
                                </tr>
                                <tr>
                                    <th>Einsatzgebiet:</th>
                                    <td>{{ $fahrlehrer->einsatzgebiet }}</td>
                                </tr>
                                <tr>
                                    <th>Fahrlehrer seit:</th>
                                    <td>{{ $fahrlehrer->fahrlehrer_seit }}</td>
                                </tr>
                                <tr>
                                    <th>Automarke:</th>
                                    <td>{{ $fahrlehrer->automarke }}</td>
                                </tr>
                                <tr>
                                    <th>Baujahr des Autos:</th>
                                    <td>{{ $fahrlehrer->auto_baujahr }}</td>
                                </tr>
                                <tr>
                                    <th>Kennzeichen:</th>
                                    <td>{{ $fahrlehrer->kennzeichen }}</td>
                                </tr>
                                <tr>
                                    <th>Beschreibung:</th>
                                    <td>{{ $fahrlehrer->beschreibung }}</td>
                                </tr>
                            </table></br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

