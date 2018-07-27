@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-13">
                <div class="card">
                    <div class="card-header"><h3>Verwaltungstools</h3></div>

                    <!-- Auswahlliste zur Verwaltung -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="stammdaten">
                                <span data-feather="home"></span>
                                Benutzerverwaltung <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="fragenkatalog">
                                Fragenverwaltung
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="videoverwaltung">
                                Videoverwaltung
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="fahrlehrerVerwaltung">
                                Fahrlehrerverwaltung
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>


@endsection
