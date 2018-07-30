@extends('layouts.admin')

@section('title', 'Clients')

@section('content')
    <div class="col-md-12">

        @if($errors->any())
            <div class="alert alert-danger col-sm-12" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success col-sm-12" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('update_user') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Adresse e-mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">Prénom</label>

                <div class="col-md-6">
                    <input id="first_name" type="text" value="{{ $user->first_name }}" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" required>

                    @if ($errors->has('fist_name'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('fist_name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">Nom</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" value="{{ $user->last_name }}" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" required>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Téléphone</label>

                <div class="col-md-6">
                    <input id="phone" type="text" value="{{ $user->phone }}" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="phone" required>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <br />
            <br />

            <div class="card">
                <div class="card-header">
                    Modifier le mot de passe
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="old_password" class="col-md-4 col-form-label text-md-right">Mot de passe actuel</label>

                        <div class="col-md-6">
                            <input id="old_password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmer le mot de passe</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection