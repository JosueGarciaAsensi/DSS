@extends('layout')
@section('title', 'Usuarios - La Taberna del Chino')
@section('menu')
    @parent
@endsection

@section('content')
<div class="container mt-5 mb-5 rounded" style="background-color: black;">
    <div class="container">
        <div class="row row-cols-5" style="text-align: center; color: white;">
            <div class="col"><b>Nombre</b></div>
            <div class="col"><b>Apellidos</b></div>
            <div class="col"><b>Email</b></div>
            <div class="col"><b>DNI</b></div>
            <div class="col"><b>Admin</b></div>
        </div>
        <div class="row row-cols-5" style="text-align: center; color: white;">
            @foreach ($users as $user)
            <div class="col">{{$user->name}}</div>
            <div class="col">{{$user->surname}}</div>
            <div class="col">{{$user->email}}</div>
            <div class="col">{{$user->dni}}</div>
            <div class="col">{{$user->admin}}</div>
            @endforeach
        </div>
    </div>
</div>
@endsection