@extends('layouts.app')

@section('header')
    <h2>Benutzerverwaltung</h2>
@stop

@section('content')

    <a href="stammdaten/create" class="btn btn-primary">Neuen Benutzer anlegen</a>
    <div class="container_index">
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>ID</th>
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
                <th colspan="2">Funktionen</th>
            </tr>
            </thead>
            <tbody>


            @foreach($benutzers as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->stammdaten->Vorname}}</td>
                    <td>{{ $user->stammdaten->Nachname}}</td>
                    <td>{{ $user->stammdaten->Strasse}}</td>
                    <td>{{ $user->stammdaten->Hausnummer }}</td>
                    <td>{{ $user->stammdaten->Postleitzahl}}</td>
                    <td>{{ $user->stammdaten->Ort}}</td>
                    <td>{{ $user->stammdaten->Geburtsdatum}}</td>
                    <td>{{ $user->stammdaten->IBAN}}</td>
                    <td>{{ $user->stammdaten->BIC}}</td>
                    <td>

                        <a href="{{ route('stammdaten.edit', $user->id) }}" class="btn btn-success">Bearbeiten</a>

                    <td> {!! Form::open(['method'=>'delete', 'route'=>['stammdaten.destroy', $user->id]]) !!}
                        {!! Form::submit('Löschen', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Möchten Sie wirklich den Benutzer löschen?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>


@endsection
