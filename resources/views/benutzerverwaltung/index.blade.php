@extends('layouts.app')

@section('header')
    <h2>Benutzerverwaltung</h2>
@stop

@section('content')
    <a href="stammdaten/create" class="btn btn-primary">Add new</a>
    <table class="table table-bordered table-responsive" style="margin-top: 10px;">
        <thead>
        <tr>
            <th>ID</th>
            <th>e-Mail</th>
            <th>name</th>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Straße</th>
            <th>Haus Nr.</th>
            <th>PLZ</th>
            <th>Ort</th>
            <th>Geburtsdatum</th>
            <th>IBAN</th>
            <th>BIC</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($stammdatens as $stammdaten)
            <tr>
                @foreach($benutzers as $user)

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>

                <td>{{ $stammdaten->id }}</td>
                <td>{{ $stammdaten->Vorname}}</td>
                <td>{{ $stammdaten->Nachname}}</td>
                <td>{{ $stammdaten->Strasse}}</td>
                <td>{{ $stammdaten->Hausnummer }}</td>
                <td>{{ $stammdaten->Postleitzahl}}</td>
                <td>{{ $stammdaten->Ort}}</td>
                <td>{{ $stammdaten->Geburtsdatum}}</td>
                <td>{{ $stammdaten->IBAN}}</td>
                <td>{{ $stammdaten->BIC}}</td>
                <td>
                    <a href="" class="btn btn-success">Delete</a>
                    <a href="" class="btn btn-success">Edit</a>
                </td>

            </tr>

        @endforeach
             @endforeach
        </tbody>
    </table>


@stop