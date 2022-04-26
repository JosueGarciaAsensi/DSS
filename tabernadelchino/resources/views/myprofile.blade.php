@extends('layouts.master')
@section('title', 'Inicio - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container my-5">
        <div class="panel text-light jostify-content-center rounded px-5 py-3" style="background-color: black">
            <div class="panel-heading">
                <h2>{{ $user->name }} {{ $user->surname }}</h2>
            </div>
            <div class="panel-body">
                <div class="col">
                    <form action="{{ url('/users/edit') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col">
                                <!-- <label for="name">Nombre: </label> -->
                                <h5>Nombre: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control" placeholder="{{ $user->name }}">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Apellidos: </h5>
                            </div>
                            <div class="col">
                                <p>{{ $user->surname }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>DNI: </h5>
                            </div>
                            <div class="col">
                                <p>{{ $user->dni }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Email: </h5>
                            </div>
                            <div class="col">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Dirección: </h5>
                            </div>
                            <div class="col">
                                <p>{{ $address->type }} {{ $address->name }} {{ $address->pc }}</p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar cambios del perfil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
