@extends('layouts.app')


@section('content')
    <div class="container">
        <h3>Fahrlehrer bearbeiten</h3>
    {!! Form::model($fahrlehrer, ['route'=>['fahrlehrerVerwaltung.update', $fahrlehrer->user_id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
    <!--Vorname, Nachname, Geburtsdatum nur über Stammdaten veränderbar-->
        <div class="form-group">
            {!! Form::label('Vorname', 'Vorname', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::label ('Vorname', $fahrlehrer->Vorname, ['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Nachname', 'Nachname', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::label('Nachname', $fahrlehrer->Nachname, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Geburtsdatum', 'Geburtsdatum', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::label('Geburtsdatum', $fahrlehrer->Geburtsdatum, ['class'=>'form-control']) !!}
                {!! $errors->has('Geburtsdatum')?$errors->first('Geburtsdatum'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('einsatzgebiet', 'Einsatzgebiet', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('einsatzgebiet', $fahrlehrer->fahrlehrerVerwaltung->einsatzgebiet, ['class'=>'form-control']) !!}
                {!! $errors->has('einsatzgebiet')?$errors->first('einsatzgebiet'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fahrlehrer_seit', 'Fahrlehrer seit...', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('fahrlehrer_seit', $fahrlehrer->fahrlehrer_seit, ['class'=>'form-control']) !!}
                {!! $errors->has('fahrlehrer_seit')?$errors->first('fahrlehrer_seit'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('automarke', 'Automarke', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('automarke', $fahrlehrer->automarke, ['class'=>'form-control']) !!}
                {!! $errors->has('automarke')?$errors->first('automarke'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('auto_baujahr', 'Auto Baujahr', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('auto_baujahr', $fahrlehrer->auto_baujahr, ['class'=>'form-control']) !!}
                {!! $errors->has('auto_baujahr')?$errors->first('auto_baujahr'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('kennzeichen', 'Kennzeichen', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('kennzeichen', $fahrlehrer->kennzeichen, ['class'=>'form-control']) !!}
                {!! $errors->has('kennzeichen')?$errors->first('kennzeichen'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('beschreibung', 'Beschreibung', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('beschreibung', $fahrlehrer->beschreibung, ['class'=>'form-control']) !!}
                {!! $errors->has('beschreibung')?$errors->first('beschreibung'):'' !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Speichern', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

