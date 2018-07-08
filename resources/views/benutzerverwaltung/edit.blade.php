@extends('layouts.app')

<!-- Diesse Seite dient zur Registrierung der Fahrschüler und erfasst die Daten, welche in der Datenbank gespeichert werden -->

@section('content')
    <!-- if there are creation errors, they will show here -->


    {{ Form::open(array('url' => 'stammdaten')) }}

    <div class="form-group">
        {{ Form::label('role', 'role') }}
        {{ Form::select('role', array('0' => 'Wähle eine Role', 'admin' => 'Admin', 'fahrlehrer' => 'Fahrlehrer', 'fahrschueler' => 'Fahrschueler'), old('stammdaten'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'name') }}
        {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'email') }}
        {{ Form::email('email', old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'password') }}
        {{ Form::text('password', old('password'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Vorname', 'Vorname') }}
        {{ Form::text('Vorname', old('Vorname'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Nachname', 'Nachname') }}
        {{ Form::text('Nachname', old('Nachname'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('Strasse', 'Strasse') }}
        {{ Form::text('Strasse', old('Strasse'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Hausnummer', 'Hausnummer') }}
        {{ Form::text('Hausnummer', old('Hausnummer'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Postleitzahl', 'Postleitzahl') }}
        {{ Form::text('Postleitzahl', old('Postleitzahl'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Ort', 'Ort') }}
        {{ Form::text('Ort', old('Ort'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Geburtsdatum', 'Geburtsdatum') }}
        {{ Form::text('Geburtsdatum', old('Geburtsdatum'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Telefonnummer', 'Telefonnummer') }}
        {{ Form::text('Telefonnummer', old('Telefonnummer'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('IBAN', 'IBAN') }}
        {{ Form::text('IBAN', old('IBAN'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('BIC', 'BIC') }}
        {{ Form::text('BIC', old('BIC'), array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Anlegen', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
