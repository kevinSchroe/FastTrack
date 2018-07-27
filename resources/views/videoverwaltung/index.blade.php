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


    <div>
        <a href="videoverwaltung/create" class="btn btn-primary">Neues Video hinzufügen</a>
    </div>

            <div class="container_index">
                <table class="table">
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
                                {!! Form::submit('Löschen', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Soll das Video wirklich gelöscht werden?")']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
