@extends('layouts.app')

@section('header')
    <h2>Benutzerverwaltung</h2>
@stop

@section('content')
    <a href="blog/create" class="btn btn-primary">Add new</a>
    <table class="table table-bordered table-responsive" style="margin-top: 10px;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Ort</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stammdatens as $stammdaten)
            <tr>
                <td>{{ $stammdaten->id }}</td>
                <td>{{ $stammdaten->Vorname}}</td>
                <td>{{ $stammdaten->Nachname}}</td>
                <td>{{ $stammdaten->Ort}}</td>
                <td>
                    <a href="" class="btn btn-success">Edit</a>
                    <a href="" class="btn btn-success">Delete</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>


@stop