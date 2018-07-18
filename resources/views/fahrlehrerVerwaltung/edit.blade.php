@extends('layouts.app')


@section('content')
    <div class="container">
        <h3>Fahrlehrer-Übersicht bearbeiten</h3>
        {!! Form::model($fahrlehrer_verwaltungs, ['route'=>['fahrlehrerVerwaltung.update', $fahrlehrer_verwaltung->fahrlehrer_id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                {!! $errors->has('frage')?$errors->first('frage'):'' !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('fahrlehrer_vorname', 'fahrlehrer_vorname', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('fahrlehrer_vorname', $fahrlehrer_verwaltung->fahrlehrer_vorname, ['class'=>'form-control']) !!}
                {!! $errors->has('fahrlehrer_vorname')?$errors->first('fahrlehrer_vorname'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fahrlehrer_nachname', 'fahrlehrer_nachname', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('fahrlehrer_nachname', $fahrlehrer_verwaltung->fahrlehrer_nachname, ['class'=>'form-control']) !!}
                {!! $errors->has('fahrlehrer_nachname')?$errors->first('fahrlehrer_nachname'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fahrlehrer_geburtsjahr', 'fahrlehrer_geburtsjahr', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('fahrlehrer_geburtsjahr', $fahrlehrer_verwaltung->fahrlehrer_geburtsjahr, ['class'=>'form-control']) !!}
                {!! $errors->has('fahrlehrer_geburtsjahr')?$errors->first('fahrlehrer_geburtsjahr'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('auto_marke', 'auto_marke', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('auto_marke', $fahrlehrer_verwaltung->auto_marke, ['class'=>'form-control']) !!}
                {!! $errors->has('auto_marke')?$errors->first('auto_marke'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('auto_baujahr', 'auto_baujahr', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('auto_baujahr', $fahrlehrer_verwaltung->auto_baujahr, ['class'=>'form-control']) !!}
                {!! $errors->has('auto_baujahr')?$errors->first('auto_baujahr'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('kennzeichen', 'kennzeichen', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('kennzeichen', $fahrlehrer_verwaltung->kennzeichen, ['class'=>'form-control']) !!}
                {!! $errors->has('kennzeichen')?$errors->first('kennzeichen'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fahrlehrer_seit', 'fahrlehrer_seit', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('fahrlehrer_seit', $fahrlehrer_verwaltung->fahrlehrer_seit, ['class'=>'form-control']) !!}
                {!! $errors->has('fahrlehrer_seit')?$errors->first('fahrlehrer_seit'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('beschreibung', 'beschreibung', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('beschreibung', $fahrlehrer_verwaltung->beschreibung, ['class'=>'form-control']) !!}
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

