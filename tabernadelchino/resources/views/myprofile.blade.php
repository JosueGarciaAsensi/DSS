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
                    <form action="{{ route('user-edit', ['id' => $user->id]) }}" method="POST">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                            <h4>Usuario</h4>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.name')}}: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="name{{$user->id}}" value="{{$user->name}}" name="name{{$user->id}}" class="form-control" placeholder="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.surname')}}: </h5>
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
                        <input type="hidden" id="admin{{$user->id}}" name="admin{{$user->id}}" value="{{$user->admin}}">
                        <input type="hidden" id="visible{{$user->id}}" name="visible{{$user->id}}" value="{{$user->visible}}">
                        <button type="submit" class="btn btn-primary">{{__('text.saveprofile')}}</button>
                    </form>
                    <br>
                    <form action="{{ route('user-address', ['id' => Auth::user()->addresses()->first()->id]) }}" method="POST">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                            <h4>{{__('text.address')}}</h4>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>Tipo: </h5>
                            </div>
                            <div class="col">
                                <select  class="form-control" id="addresstype{{$address->id}}" value="{{ $address->type }}" name="addresstype{{$address->id}}">
                                    @php
                                        $addressTypes = array('Calle', 'Avenida', 'Paseo');
                                    @endphp
                                    @foreach ($addressTypes as $addressType)
                                        <option value="{{ $addressType }}" @if ($address->type == $addressType) selected @endif>{{ $addressType }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.address')}}: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="addressname{{$address->id}}" value="{{ $address->name }}" name="addressname{{$address->id}}" class="form-control" placeholder="{{$address->name}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.postal')}}: </h5>
                            </div>
                            <div class="col">
                                <input type="text" id="addresspc{{$address->id}}" value="{{ $address->pc }}" name="addresspc{{$address->id}}" class="form-control" placeholder="{{$address->pc}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('text.saveaddress')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
