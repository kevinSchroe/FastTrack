@extends('layouts.app')


@section('content')
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
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
