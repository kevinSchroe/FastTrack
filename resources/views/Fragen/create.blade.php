@extends('layouts.app')

<!-- Diesse Seite dient zur Registrierung der Fahrschüler und erfasst die Daten, welche in der Datenbank gespeichert werden -->

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Neue Frage erstellen') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ action('fragenkatalogController@store') }}" aria-label="{{ __('create') }}">
                            @csrf


                            <div class="form-group">
                                <label for="Kategorie">Fragebogen Kategorie</label><br>
                                <select class="form-control" id="Kategorie" name="Kategorie" required>
                                    <option> Vorfahrt</option>
                                    <option>Technik</option>
                                    <option>Umwelt</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="frage">Frage</label><br>
                                <textarea class="form-control" id="frage" name="frage" rows="2" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="richtige_antwort">Richtige Antwort </label><br>
                                <input type="text" class="form-control" id="richtige_antwort" name="richtige_antwort" required>
                            </div>

                            <div class="form-group">
                                <label for="erste_falsche_antwort">1. "Falsche" Antwort </label><br>
                                <input type="text" class="form-control" id="erste_falsche_antwort" name="erste_falsche_antwort" required>
                            </div>

                            <div class="form-group">
                                <label for="zweite_falsche_antwort">2. "Falsche" Antwort</label><br>
                                <input type="text" class="form-control" id="zweite_falsche_antwort" name="zweite_falsche_antwort" required>
                            </div><br>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('anlegen') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection