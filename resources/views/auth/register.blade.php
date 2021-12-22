@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="header-text">
            Register
        </div>
        <div class="line-big"></div>
    </div>
    <div class="login-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <div class="form-entry">
                    <label for="name" class="form-login-title">Username</label>

                    <div>
                        <input id="name" type="text" class="form-login-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-entry">
                    <label for="email" class="form-login-title">E-Mail Address</label>

                    <div>
                        <input id="email" type="email" class="form-login-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-entry">
                    <label for="password" class="form-login-title">Password</label>

                    <div class>
                        <input id="password" type="password"
                            class="form-login-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-entry">
                    <label for="password-confirm" class="form-login-title">Confirm Password</label>

                    <div class>
                        <input id="password-confirm" type="password" class="form-login-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div style="clear:both"></div>
                <div class="form-submit">
                    <button type="submit" class="form-submit-button">
                        Register
                    </button>
                </div>

            </div>
        </form>

    </div>
@endsection
