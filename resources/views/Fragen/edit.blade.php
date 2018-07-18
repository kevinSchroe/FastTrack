@extends('layouts.app')


@section('content')
    <div class="container">
        <h3>Frage bearbeiten</h3>
        {!! Form::model($fragenkatalogs, ['route'=>['fragenkatalog.update', $fragenkatalog->fragen_id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
       <!-- Was machen ersten beiden divs? -->
        <div class="form-group">
            {!! Form::label('frage', 'Frage', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('frage', null, ['class'=>'form-control']) !!}
                {!! $errors->has('frage')?$errors->first('frage'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Kategorie', 'Kategorie', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('Kategorie', null, ['class'=>'form-control']) !!}
                {!! $errors->has('Kategorie')?$errors->first('Kategorie'):'' !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('frage', 'frage', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('frage', $fragenkatalog->frage, ['class'=>'form-control']) !!}
                {!! $errors->has('frage')?$errors->first('frage'):'' !!}
            </div>
        </div>
        <!-- Wie richtige Auswahlmöglichkeit für Select-Felder -->
        <div class="form-group">
            {!! Form::label('Kategorie', 'Kategorie', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::select('Kategorie', $fragenkatalog->Kategorie, ['class'=>'form-control']) !!}
                {!! $errors->has('Kategorie')?$errors->first('Kategorie'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('richtige_antwort', 'richtige_antwort', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('richtige_antwort', $fragenkatalog->richtige_antwort, ['class'=>'form-control']) !!}
                {!! $errors->has('richtige_antwort')?$errors->first('richtige_antwort'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('erste_falsche_antwort', 'erste_falsche_antwort', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('erste_falsche_antwort', $fragenkatalog->erste_falsche_antwort, ['class'=>'form-control']) !!}
                {!! $errors->has('erste_falsche_antwort')?$errors->first('erste_falsche_antwort'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('zweite_falsche_antwort', 'zweite_falsche_antwort', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('zweite_falsche_antwort', $fragenkatalog->zweite_falsche_antwort, ['class'=>'form-control']) !!}
                {!! $errors->has('zweite_falsche_antwort')?$errors->first('zweite_falsche_antwort'):'' !!}
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

