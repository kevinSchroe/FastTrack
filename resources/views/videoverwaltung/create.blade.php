@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Neues Video hinzufügen') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ action('videoverwaltungController@store') }}"
                              aria-label="{{ __('create') }}">
                            @csrf

                            <div class="form-group">
                                <label for="video_title">Video Titel</label><br>
                                <input type="text" class="form-control" id="video_title" name="video_title" required/>
                            </div>

                            <div class="form-group">
                                <label for="video_url">Video URL</label><br>
                                <input type="text" class="form-control" id="video_url" name="video_url" required>
                            </div>


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
