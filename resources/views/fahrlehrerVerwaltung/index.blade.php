@extends('layouts.app')

@section('header')
    <h2>Verwaltung Fahrlehrer-Übersicht</h2>
@stop

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-info">
            {{Session::get('message')}}
        </div>
    @endif

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


            @foreach($fahrlehrer_verwaltungs as $benutzer)

                <tr>

                    <td>{{ $benutzer->id }}</td>
                    <td>{{ $benutzer->stammdaten->Vorname }}</td>
                    <td>{{ $benutzer->stammdaten->Nachname }}</td>
                    <td>{{ $benutzer->stammdaten->Geburtsdatum }}</td>

                    <td>{{ $user->fahrlehrer_verwaltungs->einsatzgebiet }}</td>
                    <td>{{ $user->fahrlehrer_verwaltungs->fahrlehrer_seit }}</td>
                    <td>{{ $user->fahrlehrer_verwaltungs->automarke }}</td>
                    <td>{{ $user->fahrlehrer_verwaltungs->auto_baujahr }}</td>
                    <td>{{ $user->fahrlehrer_verwaltungs->kennzeichen }}</td>
                    <td>{{ $user->fahrlehrer_verwaltungs->beschreibung }}</td>



                    <td>
                        <a href="{{ route('fahrlehrerVerwaltung.edit', $user->id) }}" class="btn btn-success">Bearbeiten</a>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>

@endsection
