@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card" style="width: 50%">
            <div class="card-header">
                Video Bearbeiten
            </div>
            <div class="card-body">
                <div class="container">

                    <!-- if there are creation errors, they will show here -->


                    {{ Form::model($video, array('route' => array('videoverwaltung.update', $video->video_id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('video_title', 'Titel') }}
                        {{ Form::text('video_title', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('video_url', 'Video URL') }}
                        {{ Form::text('video_url', null, array('class' => 'form-control')) }}
                    </div>


                    {{ Form::submit('Übernehmen', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>

@endsection

