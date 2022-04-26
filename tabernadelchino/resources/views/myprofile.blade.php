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
                    <form action="{{ url('/users/edit/' . $user->id) }}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="row">
                            <h4>Usuario</h4>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>Nombre: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="name{{$user->id}}" value="{{$user->name}}" name="name{{$user->id}}" class="form-control" placeholder="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>Apellidos: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="surname{{$user->id}}" name="surname{{$user->id}}" class="form-control" placeholder="Apellidos" value="{{$user->surname}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>DNI: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="dni{{$user->id}}" name="dni{{$user->id}}" class="form-control" placeholder="DNI" value="{{$user->dni}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>Email: </h5>
                            </div>
                            <div class="col">
                                <input type="email" id="email{{$user->id}}" name="email{{$user->id}}" class="form-control" placeholder="Email" value="{{$user->email}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios del perfil</button>
                    </form>
                    <br>
                    <form action="">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="row">
                            <h4>Dirección</h4>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>Tipo: </h5>
                            </div>
                            <div class="col">
                                <select  class="form-control" id="addresstype{{$address->id}}" value="{{ $address->type }}" name="type">
                                    <option value="Calle">Calle</option>
                                    <option value="Avenida">Avenida</option>
                                    <option value="Paseo">Paseo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <h5>Dirección: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="addressname{{$address->id}}" value="{{ $address->name }}" name="addressname{{$address->id}}" class="form-control" placeholder="{{$address->name}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>Código postal: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="addresspc{{$address->id}}" value="{{ $address->pc }}" name="addresspc{{$address->id}}" class="form-control" placeholder="{{$address->pc}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios en la dirección</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
