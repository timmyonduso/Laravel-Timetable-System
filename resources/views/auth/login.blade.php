@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h1>{{ trans('panel.site_title') }}</h1>
            <p class="text-muted">{{ trans('global.login') }}</p>

            @if(session('message'))
                <div class="alert alert-info" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ trans('global.login_email') }}</label>
                    <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus value="{{ old('email', null) }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">{{ trans('global.login_password') }}</label>
                    <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" name="remember" type="checkbox" id="remember" />
                    <label class="form-check-label" for="remember">
                        {{ trans('global.remember_me') }}
                    </label>
                </div>

                <div class="form-group login-buttons">
                    <button type="submit" class="btn btn-primary">{{ trans('global.login') }}</button>
                    <a href="{{ route('password.request') }}" class="btn btn-link">{{ trans('global.forgot_password') }}</a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .login-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endsection
