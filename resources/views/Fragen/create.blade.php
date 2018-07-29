<!-- Diesse Seite dient dem Erstellen neuer Fragen in der Fragenverwaltung im Admin-Dashboard  -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Neue Frage erstellen') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ action('FragenkatalogController@store') }}" aria-label="{{ __('create') }}">
                           <!--Schutz vor Cross-Site-Request-Forgery- Angriffen (CSRF)-->
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
                                <label for="antworten">Mögliche Antworten (maximal drei)</label><br>
                                <textarea class="form-control" id="antworten" name="antworten" rows="3" required placeholder="Antwort 1, Antwort 2, Antwort 3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="richtig">Richtige Antwort (maximal eine)</label><br>
                                <input type="text" class="form-control" id="richtig" name="richtig" required placeholder="Antwort 2">
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
