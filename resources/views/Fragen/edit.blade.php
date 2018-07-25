@extends('layouts.app')


@section('content')
    <div class="container">
        <h3>Frage bearbeiten</h3>
        {!! Form::model($fragen_id, ['route'=>['fragenkatalog.update', $fragen_id->fragen_id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}

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
            {!! Form::label('antworten', 'antworten', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('antworten', $fragenkatalog->richtige_antwort, ['class'=>'form-control']) !!}
                {!! $errors->has('antworten')?$errors->first('antworten'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('richtig', 'richtig', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('richtig', $fragenkatalog->erste_falsche_antwort, ['class'=>'form-control']) !!}
                {!! $errors->has('richtig')?$errors->first('richtig'):'' !!}
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

