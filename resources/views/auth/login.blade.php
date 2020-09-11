@extends('layouts.app')

@section('content')
<div class="auth-box" style="border-radius: 10px;">
    <div id="loginform">
        <div class="logo">
            <span class="db"><img src="{{asset('files/assets/images/logo-icon.png')}}" alt="logo" style="padding-bottom: 30px;" /></span>
        </div>
        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('login') }}" class="md-float-material form-material"
                    id="loginform">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                        </div>
                        <input id="email" type="email" name="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail"
                            aria-label="E-mail" aria-describedby="basic-addon1" autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('EL CORREO ES ERRONEO') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                        </div>
                        <input id="password" type="password" name="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="password" aria-label="password" aria-describedby="basic-addon1" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('PASSWORD INCORRECTO') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck1">{{ __('Recuerdame') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">

                            <button type="submit"
                                class="btn btn-secondary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                {{ __('INGRESA AHORA') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
