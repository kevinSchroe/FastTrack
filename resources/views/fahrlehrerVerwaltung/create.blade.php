@extends('layouts.app')

<!-- Diese Seite dient dem Erstellen eines neuen Fahrlehrer-Profils für die Fahrlehrer-Übersicht -->

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fahrlehrer zur Übersicht hinzufügen') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ action('fahrlehrerVerwaltungController@store') }}" aria-label="{{ __('create') }}">
                            @csrf

                                     <!-- Vorname, Nachname, Geburtsjahr aus Stammdaten übernehmen??? Bzw. In eigene Fabellen splitten-->

                            <div class="form-group">
                                <label for="fahrlehrer_vorname">Vorname</label><br>
                                <input type ="text" class="form-control" id="fahrlehrer_vorname" name="fahrlehrer_vorname"  required>
                            </div>

                            <div class="form-group">
                                <label for="fahrlehrer_nachname">Nachname </label><br>
                                <input type="text" class="form-control" id="fahrlehrer_nachname" name="fahrlehrer_nachname" required>
                            </div>

                            <div class="form-group">
                                <label for="fahrlehrer_geburtsjahr">Geburtsjahr </label><br>
                                <input type="text" class="form-control" id="fahrlehrer_geburtsjahr" name="fahrlehrer_geburtsjahr" required>
                            </div>

                            <div class="form-group">
                                <label for="fahrlehrer_seit">Fahrlehrer seit...</label><br>
                                <input type="text" class="form-control" id="fahrlehrer_seit" name="fahrlehrer_seit" required>
                            </div>

                            <div class="form-group">
                                <label for="auto_marke">Marke des Autos</label><br>
                                <input type="text" class="form-control" id="auto_marke" name="auto_marke" required>
                            </div>

                            <div class="form-group">
                                <label for="auto_baujahr">Baujahr des Autos</label><br>
                                <input type="text" class="form-control" id="auto_baujahr" name="auto_baujahr" required>
                            </div>

                            <div class="form-group">
                                <label for="kennzeichen">Kennzeichen</label><br>
                                <input type="text" class="form-control" id="kennzeichen" name="kennzeichen" required>
                            </div>

                            <div class="form-group">
                                <label for="beschreibung"> Kurze Beschreibung zum Fahrlehrer </label><br>
                                <input type="text" class="form-control" id="beschreibung" name="beschreibung" required>
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
