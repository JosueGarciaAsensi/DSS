@extends('layouts.master')
@section('title', 'Inicio - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container my-5">
        <div class="panel text-light justify-content-center rounded px-5 py-3" style="background-color: black">
            <div class="panel-heading">
                <h2>{{ $user->name }} {{ $user->surname }}</h2>
            </div>
            <div class="panel-body">
                <div class="col">
                    <form action="{{ route('user-edit', ['id' => $user->id]) }}" method="POST">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                            <h4>{{__('text.user')}}</h4>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.name')}}: </h5>
                            </div>
                            <div class="col">
                                @isset($edit)
                                    <input type="text" id="name{{$user->id}}" value="{{$user->name}}" name="name{{$user->id}}" class="form-control" placeholder="{{ $user->name }}">
                                @else
                                    {{$user->name}}
                                @endisset
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.surname')}}: </h5>
                            </div>
                            <div class="col">
                                @isset($edit)
                                    <input type="text" id="surname{{$user->id}}" value="{{$user->surname}}" name="surname{{$user->id}}" class="form-control" placeholder="{{ $user->surname }}">
                                @else
                                    {{$user->surname}}
                                @endisset
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>DNI: </h5>
                            </div>
                            <div class="col">
                                @isset($edit)
                                    <input type="text" id="dni{{$user->id}}" value="{{$user->dni}}" name="dni{{$user->id}}" class="form-control" placeholder="{{ $user->dni }}">
                                @else
                                    {{$user->dni}}
                                @endisset
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>Email: </h5>
                            </div>
                            <div class="col">
                                @isset($edit)
                                    <input type="text" id="email{{$user->id}}" value="{{$user->email}}" name="email{{$user->id}}" class="form-control" placeholder="{{ $user->email }}">
                                @else
                                    {{$user->email}}
                                @endisset
                            </div>
                        </div>
                        <input type="hidden" id="admin{{$user->id}}" name="admin{{$user->id}}" value="{{$user->admin}}">
                        <input type="hidden" id="visible{{$user->id}}" name="visible{{$user->id}}" value="{{$user->visible}}">
                        @isset($edit)
                            <button type="submit" class="btn btn-primary">{{__('text.saveprofile')}}</button>
                        @endisset
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
                                <h5>{{__('text.type')}}: </h5>
                            </div>
                            <div class="col">
                                @isset($edit)
                                <select  class="form-control" id="addresstype{{$address->id}}" value="{{ $address->type }}" name="addresstype{{$address->id}}">
                                    @php
                                        $addressTypes = array('Calle', 'Avenida', 'Paseo');
                                    @endphp
                                    @foreach ($addressTypes as $addressType)
                                        <option value="{{ $addressType }}" @if ($address->type == $addressType) selected @endif>{{ $addressType }}</option>
                                    @endforeach
                                </select>
                                @else
                                    {{$address->type}}
                                @endisset
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.address')}}: </h5>
                            </div>
                            <div class="col">
                                @isset($edit)
                                    <input type="text" id="address{{$address->id}}" value="{{$address->name}}" name="address{{$address->id}}" class="form-control" placeholder="{{ $address->name }}">
                                @else
                                    {{$address->name}}
                                @endisset
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <h5>{{__('text.postal')}}: </h5>
                            </div>
                            <div class="col">
                                @isset($edit)
                                    <input type="text" id="postal{{$address->id}}" value="{{$address->pc}}" name="postal{{$address->id}}" class="form-control" placeholder="{{ $address->pc }}">
                                @else
                                    {{$address->pc}}
                                @endisset
                            </div>
                        </div>
                        @isset($edit)
                            <button type="submit" class="btn btn-primary">{{__('text.saveaddress')}}</button>
                        @endisset
                    </form>
                </div>
            </div>
            @isset($edit)
            @else
            <form action="{{ route('user-enable-edit', ['id' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="panel-footer">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">{{__('text.edit')}}</button>
                        </div>
                    </div>
                </div>
            </form>
            @endisset
        </div>
    </div>

@endsection
