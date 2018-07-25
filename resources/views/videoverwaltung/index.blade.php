@extends('layouts.app')

@section('header')
    <h2>Fragenverwaltung</h2>
@stop

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-info">
            {{Session::get('message')}}
        </div>
    @endif

    <div class="card" style="width: 80%; margin: auto">
        <div class="card-header">Videoverwaltung</div>
        <div class="card-body">
            <div class="container">
                <table class="table table-responsive" style="margin-top: 10px;">
                    <thead>
                    <tr>
                        <th>Video-ID</th>
                        <th>Video URL</th>
                        <th>Video Titel</th>
                        <th>Funktionen</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($videos as $video)

                        <tr>
                            <td>{{ $video->video_id }}</td>
                            <td>{{ $video->video_url}}</td>
                            <td>{{ $video->video_title}}</td>
                            <td><a href="{{ route('videoverwaltung.edit', $video->video_id) }}" class="btn btn-success">Bearbeiten</a>
                            </td>
                            <td> {!! Form::open(['method'=>'delete', 'route'=>['videoverwaltung.destroy', $video->video_id]]) !!}
                                {!! Form::submit('Löschen', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Do you want to delete this record?")']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        <div style="width: 7em; margin: auto;padding-bottom: 2em"><a href="videoverwaltung/create"
                                                                     class="btn btn-primary">Neues Video hinzufügen</a>
        </div>

    </div>

@endsection
