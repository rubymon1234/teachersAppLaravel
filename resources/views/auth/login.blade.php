@extends('layouts.public')
@section('title', 'Login')
@section('content')
    <div class="login-box">
    <div class="login-logo">
        <a href="">{{-- <img src="{{ asset('assets/images/logoMain.png ') }}" alt="Shop"> --}} <b>Teachers</b>App</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">{{ __('Login') }}</p>
        @if ($errors->has('email'))
            <div class="alert alert-danger" role="alert">
                <p><strong>{{ $errors->first('email') }}</strong></p>
            </div>
        @endif
        <form action="{{ route('login') }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            {{-- <a href="{% url 'adminforgotPassword' %}">I forgot my password</a> --}}
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    .login-page, .register-page {
        height: auto;
        background: #f3f4f9 ! important;
    }
    .btn-primary {
        background-color: #f97437;
        border-color: #f97437;
    }
    .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover {

            color: #fff;
            background-color: #ec4f09;
            border-color: #ec5022;
    }
    .btn-primary:hover, .btn-primary:active, .btn-primary.hover {
        background-color: #f99037d6;
        border-color: #f99037d6;
    }
</style>
@endsection
