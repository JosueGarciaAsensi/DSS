@extends('layouts.master')

@section('content')
<div class="container mt-5 p-3 rounded" style="background-color: black;">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row mb-3">
                <div class="col-md-6">
                    <h1 class="text-light">{{__('text.login')}}</h1>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-light">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end text-light">{{ __('text.password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-light" for="remember">
                                {{ __('text.rememberme') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('text.login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="http://127.0.0.1:8000/password/reset">
                            {{ __('text.forgotpassword') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
        </div>
        @endif
    </div>
</div>
 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('text.resetpassword')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('resetPassword') }}" method="POST">
                    @csrf
                    <b>{{__('text.caution')}}</b> {{__('text.resetmsg')}}
                    <br>
                    <p>{{__('text.inputemail')}}:</p>
                    <input type="text" id="email" name="email" required>
                    <button type="submit" class="btn btn-primary">{{__('text.apply')}}</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('text.close')}}</button>
            </div>
        </div>
    </div>
</div>

@endsection