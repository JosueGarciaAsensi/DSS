@extends('layouts.master')

@section('content')
<div class="container m-5 p-3 rounded" style="background-color:black;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h1 class="text-light">{{__('text.register')}}</h1>
                </div>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-light">{{ __('text.name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="surname" class="col-md-4 col-form-label text-md-end text-light">{{__('text.surname')}}</label>

                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control @error('name') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-light">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-light">{{ __('text.confirmpassword') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="dni" class="col-md-4 col-form-label text-md-end text-light">DNI</label>

                    <div class="col-md-6">
                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" value="{{ old('dni') }}" name="dni" required autocomplete="dni">

                        @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <br>

                <h3 class="text-light">{{__('text.address')}}</h3>

                <div class="row mb-3">
                    <label for="type" class="col-md-4 col-form-label text-md-end text-light">{{__('text.type')}}: </label>

                    <div class="col-md-6">
                        <select class="form-control" id="type" name="type">
                            <option value="Calle" {{ old('type') == "Calle" ? 'selected' : '' }}>Calle</option>
                            <option value="Avenida" {{ old('type') == "Avenida" ? 'selected' : '' }}>Avenida</option>
                            <option value="Paseo" {{ old('type') == "Paseo" ? 'selected' : '' }}>Paseo</option>
                        </select>

                        @error('tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end text-light">{{__('text.address')}}: </label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" required autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cp" class="col-md-4 col-form-label text-md-end text-light">{{__('text.postal')}}: </label>

                    <div class="col-md-6">
                        <input id="cp" type="text" class="form-control @error('cp') is-invalid @enderror" value="{{ old('cp') }}" name="cp" required autocomplete="cp">

                        @error('cp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <input type="hidden" id="visible" name="visible" value="1">
                <input type="hidden" id="register" name="register" value="1">
                
                <br>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('text.register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
