@extends('layout')
@section('title', 'Usuarios - La Taberna del Chino')
@section('menu')
    @parent
@endsection

@section('content')
<div class="container mt-5 mb-5 rounded" style="background-color: black;">
    @foreach ($users as $user)
    <p>Usuario {{ $user->id }}</p>
    @endforeach
</div>
@endsection