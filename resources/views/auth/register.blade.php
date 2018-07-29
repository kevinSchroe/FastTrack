@extends('layouts.app')

<!-- Diese Seite dient zur Registrierung der Fahrschüler und erfasst die Daten, welche in der Datenbank gespeichert werden -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Als Fahrschüler Registrieren') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vorname') }}</label>

                                <div class="col-md-6">
                                    <input id="Vorname" type="text" class="form-control{{ $errors->has('Vorname') ? ' is-invalid' : '' }}" name="Vorname"  required >

                                    @if ($errors->has('Vorname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Vorname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nachname') }}</label>

                                <div class="col-md-6">
                                    <input id="Nachname" type="text" class="form-control{{ $errors->has('Nachname') ? ' is-invalid' : '' }}" name="Nachname"  required >

                                    @if ($errors->has('nachname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nachname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Straße') }}</label>

                                <div class="col-md-6">
                                    <input id="Strasse" type="text" class="form-control{{ $errors->has('Strasse') ? ' is-invalid' : '' }}" name="Strasse"  required >

                                    @if ($errors->has('Strasse'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Strasse') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hausnummer') }}</label>

                                <div class="col-md-6">
                                    <input id="Hausnummer" type="text" class="form-control{{ $errors->has('Hausnummer') ? ' is-invalid' : '' }}" name="Hausnummer"  required >

                                    @if ($errors->has('Hausnummer'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Hausnummer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Postleitzahl') }}</label>

                                <div class="col-md-6">
                                    <input id="Postleitzahl" type="text" class="form-control{{ $errors->has('Postleitzahl') ? ' is-invalid' : '' }}" name="Postleitzahl"  required >

                                    @if ($errors->has('Postleitzahl'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Postleitzahl') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ort') }}</label>

                                <div class="col-md-6">
                                    <input id="Ort" type="text" class="form-control{{ $errors->has('Ort') ? ' is-invalid' : '' }}" name="Ort"  required >

                                    @if ($errors->has('Ort'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Ort') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Geburtsdatum') }}</label>

                                <div class="col-md-6">
                                    <input id="Geburtsdatum" type="text" class="form-control{{ $errors->has('Geburtsdatum') ? ' is-invalid' : '' }}" name="Geburtsdatum"  required placeholder="YYYY-MM-DD" >

                                    @if ($errors->has('Geburtsdatum'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Geburtsdatum') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Telefonnummer') }}</label>

                                <div class="col-md-6">
                                    <input id="Telefonnummer" type="text" class="form-control{{ $errors->has('Telefonnummer') ? ' is-invalid' : '' }}" name="Telefonnummer"  required >

                                    @if ($errors->has('Telefonnummer'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Telefonnummer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('IBAN') }}</label>

                                <div class="col-md-6">
                                    <input id="IBAN" type="text" class="form-control{{ $errors->has('IBAN') ? ' is-invalid' : '' }}" name="IBAN"  required >

                                    @if ($errors->has('IBAN'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('IBAN') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('BIC') }}</label>

                                <div class="col-md-6">
                                    <input id="BIC" type="text" class="form-control{{ $errors->has('BIC') ? ' is-invalid' : '' }}" name="BIC"  required  >

                                    @if ($errors->has('BIC'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('BIC') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
