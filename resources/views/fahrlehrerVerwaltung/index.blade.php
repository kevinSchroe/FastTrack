<!-- Diesse Seite zeigt im Admin-Dashboard unter Fahrlehrerverwaltung alle existierenden Fahrlehrer mitsamt Informationen an-->
@extends('layouts.app')

@section('header')
    <h2>Verwaltung Fahrlehrer-Übersicht</h2>
@stop

@section('content')

    <div class="container_index">
        <table class="table table-bordered table-responsive" style="margin-top: 10px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Geburtsdatum</th>
                <th>Einsatzgebiet</th>
                <th>Fahrlehrer seit...</th>
                <th>Automarke</th>
                <th>Baujahr</th>
                <th>Kennzeichen</th>
                <th>Beschreibung</th>
            </tr>
            </thead>
            <tbody>

        <!-- Für jeden Fahrlehrer werden seine Daten ausgegeben-->
        @foreach($fahrlehrer as $fahrlehrer)
            <tr>
                <td>{{ $fahrlehrer->user_id }}</td>
                <td>{{ $fahrlehrer->Vorname }}</td>
                <td>{{ $fahrlehrer->Nachname }}</td>
                <td>{{ $fahrlehrer->Geburtsdatum }}</td>
                <td>{{ $fahrlehrer->einsatzgebiet }}</td>
                <td>{{ $fahrlehrer->fahrlehrer_seit }}</td>
                <td>{{ $fahrlehrer->automarke }}</td>
                <td>{{ $fahrlehrer->auto_baujahr }}</td>
                <td>{{ $fahrlehrer->kennzeichen }}</td>
                <td>{{ $fahrlehrer->beschreibung }}</td>
                <td>
                    <a href="{{ route('fahrlehrerVerwaltung.edit', $fahrlehrer->user_id) }}" class="btn btn-success">Bearbeiten</a>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
@endsection
