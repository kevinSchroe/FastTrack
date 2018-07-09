@extends('layouts.app')

<!-- Diesse Seite dient zur Registrierung der Fahrschüler und erfasst die Daten, welche in der Datenbank gespeichert werden -->

@section('content')
    <h1>Edit Task</h1>
    <hr>
    <form action="{{url('stammdaten', [$user->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" value="{{$user->name}}" class="form-control" id="name"  name="name" >
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" value="{{$user->email}}" class="form-control" id="email" name="description" >
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
