@extends('layouts.general')
@section('css')
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="">
                    <div class="text-center mb-4">
                        <a href="index.html" class="">
                            <img src="{{ env('RES_HMMOVIL') }}logo-color.png" alt="" height="50" class="auth-logo logo-dark mx-auto">
                            <img src="{{ env('RES_HMMOVIL') }}logo-color.png" alt="" height="50" class="auth-logo logo-light mx-auto">
                        </a>
                    </div>
                    <!-- end row -->
                    <form method="POST" class="form-horizontal" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @include("layouts.errors")
                                <div class="mb-3">
                                    <label class="form-label" for="email" >{{ __('Correo Electrónico') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password" >{{ __('Contraseña') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <!--<div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-label" class="form-check-label" for="remember">{{ __('Recordarme') }}</label>
                                        </div>
                                    </div>-->
                                    <div class="col-7">
                                        <div class="text-md-end mt-3 mt-md-0">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> {{ __('¿Olvide su contraseña?') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">{{ __('Iniciar Sesión') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center">
            @if (Route::has('register'))
            <p class="text-white-50">¿No tiene una cuenta? <a href="{{ route('register') }}" class="fw-medium text-primary">{{ __('Registrarse') }}</a> </p>
            @endif
            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script>Todos los Derechos Reservados para <strong>SEGURO Carseg S.A.</strong></p>
        </div>
    </div>
</div>
<!-- end row -->
    
@endsection     