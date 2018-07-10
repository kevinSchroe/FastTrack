@extends('layouts.app')


@section('content')
    <div class="container">
    <h3>Benutzer bearbeiten</h3>
    {!! Form::model($user, ['route'=>['stammdaten.update', $user->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            {!! $errors->has('name')?$errors->first('name'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('role', 'Rolle', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('role', null, ['class'=>'form-control']) !!}
            {!! $errors->has('role')?$errors->first('role'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Vorname', 'Vorname', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Vorname', $user->stammdaten->Vorname, ['class'=>'form-control']) !!}
            {!! $errors->has('Vorname')?$errors->first('Vorname'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Nachname', 'Nachname', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Nachname', $user->stammdaten->Nachname, ['class'=>'form-control']) !!}
            {!! $errors->has('Nachname')?$errors->first('Nachname'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Strasse', 'Strasse', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Strasse', $user->stammdaten->Strasse, ['class'=>'form-control']) !!}
            {!! $errors->has('Strasse')?$errors->first('Strasse'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Hausnummer', 'Hausnummer', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Hausnummer', $user->stammdaten->Hausnummer, ['class'=>'form-control']) !!}
            {!! $errors->has('Hausnummer')?$errors->first('Hausnummer'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Postleitzahl', 'Postleitzahl', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Postleitzahl', $user->stammdaten->Postleitzahl, ['class'=>'form-control']) !!}
            {!! $errors->has('Postleitzahl')?$errors->first('Postleitzahl'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Ort', 'Ort', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Ort', $user->stammdaten->Ort, ['class'=>'form-control']) !!}
            {!! $errors->has('Ort')?$errors->first('Ort'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Telefonnummer', 'Telefonnummer', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Telefonnummer', $user->stammdaten->Telefonnummer, ['class'=>'form-control']) !!}
            {!! $errors->has('Telefonnummer')?$errors->first('Telefonnummer'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Geburtsdatum', 'Geburtsdatum', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('Geburtsdatum', $user->stammdaten->Geburtsdatum, ['class'=>'form-control']) !!}
            {!! $errors->has('Geburtsdatum')?$errors->first('Geburtsdatum'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('IBAN', 'IBAN', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('IBAN', $user->stammdaten->IBAN, ['class'=>'form-control']) !!}
            {!! $errors->has('IBAN')?$errors->first('IBAN'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('BIC', 'BIC', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('BIC', $user->stammdaten->BIC, ['class'=>'form-control']) !!}
            {!! $errors->has('BIC')?$errors->first('BIC'):'' !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            {!! Form::submit('Speichern', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>
    {!! Form::close() !!}
@stop
