@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lernvideos</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container_index">


                            <div><h3>Verkehrszeichen und Verkehrseinrichtungen</h3></div>
                            <div><iframe width="670" height="380" src="https://www.youtube.com/embed/videoseries?list=PLjfE-6IL5cPRlISVjIhxFE2Z9GXfBJsGs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>

                            <div class ="video"><h3>Vorfahrtsregeln</h3></div>
                            <div><iframe width="670" height="380" src="https://www.youtube.com/embed/videoseries?list=PLjfE-6IL5cPSty0V83suvtLwBkPfHLE87" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>

                            <div class ="video"><h3>Besondere Situationen</h3></div>
                            <div><iframe width="670" height="380" src="https://www.youtube.com/embed/videoseries?list=PLjfE-6IL5cPSQVI1QRQm3l2x8RBNEP8z-" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>

                            <div class ="video"><h3>Technische Bedingungen</h3></div>
                            <div><iframe width="670" height="380" src="https://www.youtube.com/embed/videoseries?list=PLjfE-6IL5cPSBszBX8EQ4u1p3iqZRyoiD" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>

                            <div class ="video"><h3>Straßenverkehrsystem</h3></div>
                            <div><iframe width="670" height="380" src="https://www.youtube.com/embed/videoseries?list=PLjfE-6IL5cPTtMirFZxPJ2j49jrgxTibj" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>



                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
