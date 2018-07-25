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
    <a href="fragenkatalog/create" class="btn btn-primary">Neue Frage anlegen</a>
    <div class="container_index">
        <table class="table table-bordered table-responsive" style="margin-top: 10px;">
            <thead>
            <tr>
                <th>Fragen-ID</th>
                <th>Kategorie</th>
                <th>Frage</th>
                <th>Antworten</th>
                <th>Richtige Antwort</th>
            </tr>
            </thead>
            <tbody>


            @foreach($fragenkatalogs as $fragenkatalog)

                <tr>

                    <td>{{ $fragenkatalog->fragen_id }}</td>
                    <td>{{ $fragenkatalog->Kategorie}}</td>
                    <td>{{ $fragenkatalog->frage}}</td>
                    <td>{{ $fragenkatalog->antworten }}</td>
                    <td>{{ $fragenkatalog->richtig}}</td>
                    <td><a href="{{ route('fragenkatalog.edit', $fragenkatalog->fragen_id) }}" class="btn btn-success">Bearbeiten</a>
                    </td>
                    <td> {!! Form::open(['method'=>'delete', 'route'=>['fragenkatalog.destroy', $fragenkatalog->fragen_id]]) !!}
                        {!! Form::submit('Löschen', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Möchten Sie wirklich diese Frage löschen?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>

@endsection
