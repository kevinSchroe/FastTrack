<!-- Diesse Seite dient dem Bearbeiten bereits exisitierender Fragen in der Fragenrverwaltung im Admin-Dashboard -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Frage bearbeiten</div>

                    <div class="card-body">

                    {{ Form::model($frage, array('route' => array('fragenkatalog.update', $frage->fragen_id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('frage', 'Frage') }}
                        {{ Form::text('frage', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('antworten', 'Antworten') }}
                        {{ Form::text('antworten', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('richtig', 'Richtige Antwort') }}
                        {{ Form::text('richtig', null, array('class' => 'form-control')) }}
                    </div>


                    {{ Form::submit('Übernehmen', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

