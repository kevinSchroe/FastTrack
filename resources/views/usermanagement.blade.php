@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usermanagement</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                   <ul>

                       @foreach ($stammdatens as $stammdaten)
                           <li>{{$stammdaten}}</li>
                           <li>{{$stammdaten-> Vorname}}</li>
                           <li>{{$stammdaten-> Vorname}}</li>
                           @endforeach
                           @foreach ($benutzers as $user)
                               <li>{{$user}}</li>
                               <li>{{$user-> id}}</li>

                           @endforeach

                   </ul>

                </div>
                <div>
                    Das ist das Dashboard
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
