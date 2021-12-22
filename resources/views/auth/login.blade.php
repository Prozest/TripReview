@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="header-text">
            Login
        </div>
        <div class="line-big"></div>
    </div>
    <div class="login-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="form-entry">
                    <label for="email" class="form-login-title">Email</label>

                    <div>
                        <input id="email" type="text" class="form-login-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-entry">
                    <label for="password" class="form-login-title">Password</label>

                    <div>
                        <input id="password" type="password"
                            class="form-login-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <!--<div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>  -->

                <div style="clear:both"></div>

                <div class="form-submit">
                    <button type="submit" class="form-submit-button">
                        {{ __('Login') }}
                    </button>

                    <!--@if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif-->
                </div>
            </div>
        </form>
    </div>
@endsection
