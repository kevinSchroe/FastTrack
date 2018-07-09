@extends('layouts.app')

@section('header')
    <h2>Benutzerverwaltung</h2>
@stop

@section('content')

    <a href="stammdaten/create" class="btn btn-primary">Neuer Benutzer</a>
    <div class="container_index">
        <table class="table table-bordered table-responsive" style="margin-top: 10px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>e-Mail</th>
                <th>Rolle</th>


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


            @foreach($benutzers as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->role }}</td>


                    <td>{{ $user->Vorname}}</td>
                    <td>{{ $user->Nachname}}</td>
                    <td>{{ $user->Strasse}}</td>
                    <td>{{ $user->Hausnummer }}</td>
                    <td>{{ $user->Postleitzahl}}</td>
                    <td>{{ $user->Ort}}</td>
                    <td>{{ $user->Geburtsdatum}}</td>
                    <td>{{ $user->IBAN}}</td>
                    <td>{{ $user->BIC}}</td>
                    <td>

                        <a href="{{ route('stammdaten.edit', $user->id) }}" class="btn btn-success">Edit</a>

                    <td> {!! Form::open(['method'=>'delete', 'route'=>['stammdaten.destroy', $user->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Do you want to delete this record?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>


@stop
