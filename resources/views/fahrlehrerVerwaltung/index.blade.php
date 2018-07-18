@extends('layouts.app')

@section('header')
    <h2>Verwaltung Fahrlehrer-Übersicht</h2>
@stop

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-info">
            {{Session::get('message')}}
        </div>
    @endif
    <a href="fahrlehrerVerwaltung/create" class="btn btn-primary">Neuen Fahrlehrer der Übersicht hinzufügen</a>
    <div class="container_index">
        <table class="table table-bordered table-responsive" style="margin-top: 10px;">
            <thead>
            <tr>
                <th>Fahrlehrer-ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Auto-Marke</th>
            </tr>
            </thead>
            <tbody>


            @foreach($fahrlehrer_verwaltungs as $fahrlehrer_verwaltung)

                <tr>

                    <td>{{ $fahrlehrer_verwaltung->fahrlehrer_id }}</td>
                    <td>{{ $fahrlehrer_verwaltung->fahrlehrer_vorname }}</td>
                    <td>{{ $fahrlehrer_verwaltung->fahrlehrer_nachname }}</td>
                    <td>{{ $fahrlehrer_verwaltung->auto_marke }}</td>

                    <td>

                        <a href="{{ route('fahrlehrerVerwaltung.edit', $fahrlehrer_verwaltung->fahrlehrer_id) }}" class="btn btn-success">Bearbeiten</a>
                    <td> {!! Form::open(['method'=>'delete', 'route'=>['fahrlehrerVerwaltung.destroy', $fahrlehrer_verwaltung->fahrlehrer_id]]) !!}
                        {!! Form::submit('Löschen', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Do you want to delete this record?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>
    </div>

@endsection
