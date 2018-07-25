@extends('layouts.app')


@section('content')
    <div class="container">
        <h3>Fahrlehrer bearbeiten</h3>
        {!! Form::model($user, ['route'=>['fahrlehrerVerwaltung.update', $user->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('Vorname', 'Vorname', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('Vorname', null, ['class'=>'form-control']) !!}
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
            {!! Form::label('Geburtsdatum', 'Geburtsdatume', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('Geburtsdatum', $user->stammdaten->Geburtsdatum, ['class'=>'form-control']) !!}
                {!! $errors->has('Geburtsdatum')?$errors->first('Geburtsdatum'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('einsatzgebiet', 'einsatzgebiet', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('einsatzgebiet', $user->fahrlehrer_verwaltungs->einsatzgebiet, ['class'=>'form-control']) !!}
                {!! $errors->has('einsatzgebiet')?$errors->first('einsatzgebiet'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fahrlehrer_seit', 'fahrlehrer_seit', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('fahrlehrer_seit', $user->fahrlehrer_verwaltungs->fahrlehrer_seit, ['class'=>'form-control']) !!}
                {!! $errors->has('fahrlehrer_seit')?$errors->first('fahrlehrer_seit'):'' !!}
            </div>
        <div class="form-group">
            {!! Form::label('automarke', 'automarke', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('automarke', $user->fahrlehrer_verwaltungs->automarke, ['class'=>'form-control']) !!}
                {!! $errors->has('automarke')?$errors->first('automarke'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('auto_baujahr', 'auto_baujahr', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('auto_baujahr', $user->fahrlehrer_verwaltungs->auto_baujahr, ['class'=>'form-control']) !!}
                {!! $errors->has('auto_baujahr')?$errors->first('auto_baujahr'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('kennzeichen', 'kennzeichen', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('kennzeichen', $user->fahrlehrer_verwaltungs->kennzeichen, ['class'=>'form-control']) !!}
                {!! $errors->has('kennzeichen')?$errors->first('kennzeichen'):'' !!}
            </div>
        </div>

        </div>
        <div class="form-group">
            {!! Form::label('beschreibung', 'beschreibung', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('beschreibung', $user->fahrlehrer_verwaltungs->beschreibung, ['class'=>'form-control']) !!}
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

