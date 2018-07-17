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
                <th>Richtige Antwort</th>
                <th>Falsche Antwort 1</th>
                <th>Falsche Antwort 2</th>
            </tr>
            </thead>
            <tbody>


            @foreach($fragenkatalogs as $fragenkatalog)

                <tr>

                    <td>{{ $fragenkatalog->fragen_id }}</td>
                    <td>{{ $fragenkatalog->Kategorie}}</td>
                    <td>{{ $fragenkatalog->frage}}</td>
                    <td>{{ $fragenkatalog->richtige_antwort }}</td>
                    <td>{{ $fragenkatalog->erste_falsche_antwort}}</td>
                    <td>{{ $fragenkatalog->zweite_falsche_antwort}}</td>

                    <td>

                        <a href="{{ route('fragenkatalog.edit', $fragenkatalog->fragen_id) }}" class="btn btn-success">Bearbeiten</a>
                    <td> {!! Form::open(['method'=>'delete', 'route'=>['fragenkatalog.destroy', $fragenkatalog->fragen_id]]) !!}
                        {!! Form::submit('Löschen', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Do you want to delete this record?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>

@endsection
