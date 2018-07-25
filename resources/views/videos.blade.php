@extends('layouts.app')

@section('content')
    <script>
        function getId(url) { //Diese Funktion wird verwendet um normal youtube video URL's in 'embed urls' umzuwandeln
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/; //Regular Expression
            var match = url.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }
    </script>
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

                    <!-- Query auf die Video DB -->
                        <?php $videos = DB::table('videos')
                            ->select('video_url', 'video_title')
                            ->get();
                        ?>
                        <div class="container">

                            @foreach($videos as $video)
                                <div><h3>{{$video->video_title}}</h3></div>
                                <div id="iFrame{{$video->video_title}}"
                                     style="margin-left: auto;margin-right: auto"></div>
                                <script>
                                    var videoId = getId('{{$video->video_url}}');
                                    var iframeMarkup = '<iframe width="600" height="400" src="//www.youtube.com/embed/'
                                        + videoId + '" frameborder="0" allowfullscreen></iframe>';
                                    document.getElementById("iFrame{{$video->video_title}}").innerHTML = iframeMarkup;
                                </script>
                            @endforeach

                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
