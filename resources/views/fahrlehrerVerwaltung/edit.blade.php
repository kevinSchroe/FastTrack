@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fahrlehrer bearbeiten</div>

                    <div class="card-body">

    {!! Form::model($daten, ['route'=>['fahrlehrerVerwaltung.update', $daten->user_id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
    <!--Vorname, Nachname, Geburtsdatum nur über Stammdaten veränderbar-->
        <div class="form-group">
            {!! Form::label('Vorname', 'Vorname', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::label ('Vorname', $daten->Vorname, ['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Nachname', 'Nachname', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::label('Nachname', $daten->Nachname, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Geburtsdatum', 'Geburtsdatum', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::label('Geburtsdatum', $daten->Geburtsdatum, ['class'=>'form-control']) !!}
            </div>
        </div>

        {!! Form::model($fahrlehrer, ['route'=>['fahrlehrerVerwaltung.update', $fahrlehrer->user_id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('einsatzgebiet', 'Einsatzgebiet', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::text('einsatzgebiet', $fahrlehrer->einsatzgebiet, ['class'=>'form-control']) !!}
                {!! $errors->has('einsatzgebiet')?$errors->first('einsatzgebiet'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fahrlehrer_seit', 'Fahrlehrer seit...', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::text('fahrlehrer_seit', $fahrlehrer->fahrlehrer_seit, ['class'=>'form-control']) !!}
                {!! $errors->has('fahrlehrer_seit')?$errors->first('fahrlehrer_seit'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('automarke', 'Automarke', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::text('automarke', $fahrlehrer->automarke, ['class'=>'form-control']) !!}
                {!! $errors->has('automarke')?$errors->first('automarke'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('auto_baujahr', 'Auto Baujahr', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::text('auto_baujahr', $fahrlehrer->auto_baujahr, ['class'=>'form-control']) !!}
                {!! $errors->has('auto_baujahr')?$errors->first('auto_baujahr'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('kennzeichen', 'Kennzeichen', ['class'=>'control-label col-md-4']) !!}
            <div class="col-md-10">
                {!! Form::text('kennzeichen', $fahrlehrer->kennzeichen, ['class'=>'form-control']) !!}
                {!! $errors->has('kennzeichen')?$errors->first('kennzeichen'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('beschreibung', 'Beschreibung', ['class'=>'control-label col-md-4']) !!}
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

    {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

