@extends('layout')
@section('title', 'Usuarios - La Taberna del Chino')
@section('menu')
    @parent
@endsection

@section('content')
<div class="container mt-5 mb-5 rounded" style="background-color: black;">
</div>

<div class="container">
    @foreach ($users as $user)
    <div class="row row-cols-4" style="background-color: white;">
        <div class="col">Col</div>
        <div class="col">Col</div>
        <div class="col">Col</div>
        <div class="col">Col</div>            
    </div>
    @endforeach
</div>
@endsection