@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-between mb-5">
        <div class="col-md-6 col-lg-8">
            <h1 class="fw-bold">Affitta con <span class="primary-color">Boolbnb</span></h1>
            <h5 class="text-secondary mb-4">Inizia a guadagnare ora.</h5>
            <img src="{{ Vite::asset("resources/images/house-login.png") }}" alt="" class="w-75  d-none d-md-block">
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card my-login-card">
                <div class="card-header my-login-header"><i class="fa-solid fa-user me-2 primary-color"></i>{{ __('Accedi al tuo account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row flex-column">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row flex-column">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row ">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn my-btn-primary text-white w-100">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link p-0 mt-3 forgot-password" href="{{ route('password.request') }}">
                                    {{ __('Hai dimenticato la password?') }}
                                </a>
                                @endif
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
@endsection
