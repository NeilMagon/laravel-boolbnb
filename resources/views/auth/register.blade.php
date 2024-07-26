@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center mb-5">
        <div class="col-md-6 col-lg-8">
            <h1 class="fw-bold">Affitta con <span class="primary-color">Boolbnb</span></h1>
            <h5 class="text-secondary mb-4">Inizia a guadagnare ora.</h5>
            <img src="{{ Vite::asset("resources/images/house-login.png") }}" alt="" class="w-75  d-none d-md-block">
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card my-login-card">
                <div class="card-header my-login-header"><i class="fa-solid fa-user me-2 primary-color"></i>{{ __('Crea un nuovo account') }}</div>

                <div class="card-body">
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3 row flex-column">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome *') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row flex-column">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome *') }}</label>

                            <div class="col-md-12">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row flex-column">
                            <label for="date_of_birth" class="col-md-12 col-form-label text-md-right">{{ __('Data di nascita *') }}</label>
                            <div class="col-md-12">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row flex-column">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email *') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row flex-column">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-12 input-control">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="error"></div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-5 row flex-column">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                            <div class="col-md-12 input-control">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="error"></div>
                            </div>
                        </div>

                        <div class="mb-3 row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn my-btn-primary text-white w-100">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <img src="{{ Vite::asset("resources/images/login.png") }}" alt="" srcset="" class="w-75 pt-5 d-none d-lg-block">
    </div>
</div>
<script src="{{ asset('js/register.js') }}" ></script>
@endsection
