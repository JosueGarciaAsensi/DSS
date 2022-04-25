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
                    <div class="row">
                        <div class="col">
                            <h5>Nombre: </h5>
                        </div>
                        <div class="col">
                            <p>{{ $user->name }}</p>

                            <form id="updateName-form" action="{{ route('updateName') }}" method="POST" class="d-none">
                                @csrf
                                <input type="text" id="name" class="form-control" placeholder="Nombre" name="name" value="{{ $user->name }}">
                            </form> <!-- Esto está sin terminar -->

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
                            <p>{{ $address->type }}  {{ $address->name }} {{ $address->pc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
