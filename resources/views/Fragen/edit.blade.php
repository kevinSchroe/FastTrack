@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card" style="width: 50%">
            <div class="card-header">
                Fragen Bearbeiten
            </div>
            <div class="card-body">
                <div class="container">

                    <!-- if there are creation errors, they will show here -->


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

@endsection

