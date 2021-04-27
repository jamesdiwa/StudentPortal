@extends('layouts.app')

@section('content')

<style>
    .field-icon {
        float: right;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        color: #d11d27;
    }
    input[type=email]:required, input[type=password]:required, input[type=text]:required{
    border:#d11d27 solid thin;
    color: #d11d27;
}
}
</style>

<div class="container pb-3 w-50" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Login') }}</div> --}}

                {{-- <div class="card-body"> --}}
                        <div class="DivTemplate mt-3 pb-3 pt-4">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <img src="{{ asset('images/logo.jpg') }}" alt="" style="width: 130px; height: 130px">
                            </div>
                        </div>
                        <div class="form-group row mt-4">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Username">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mt-3">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password mr-1"></span>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mt-n2">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="font-size: 14px">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="save-button" style="width: 100%; background: #A90011">
                                    {{ __('Login') }}
                                </button>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-link mx-0 px-0" href="{{ route('password.request') }}" style="color: #d11d27; font-size: 11px">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>

<script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    });
</script>
@endsection
