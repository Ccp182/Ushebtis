@extends('layouts.general')
@section('css')
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="">
                    <div class="text-center">
                        <a href="index.html" class="">
                            <img src="{{ env('RES_HMMOVIL') }}logo-color.png" alt="" height="50" class="auth-logo logo-dark mx-auto">
                            <img src="{{ env('RES_HMMOVIL') }}logo-color.png" alt="" height="50" class="auth-logo logo-light mx-auto">
                        </a>
                    </div>
                    <!-- end row -->
                    <form method="POST" class="form-horizontal" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @include("layouts.errors")
                                <div class="mb-3">
                                    <label class="form-label" for="name" >{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">                               
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">                               
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    
                                </div>
                                



                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="term-conditionCheck">
                                            <label class="form-check-label fw-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="d-grid mt-4">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">{{ __('Registrar') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center">
            @if (Route::has('register'))
            <p class="text-white-50">¿Ya tiene una cuenta? <a href="{{ route('login') }}" class="fw-medium text-primary">{{ __('Iniciar Sesión') }}</a> </p>
            @endif
            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script>Todos los Derechos Reservados para <strong>SEGURO Carseg S.A.</strong></p>
        </div>
    </div>
</div>
<!-- end row -->
    
@endsection     