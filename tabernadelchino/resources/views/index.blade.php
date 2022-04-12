@extends('layouts.master')
@section('title', 'Inicio - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
<div id="myCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div style="filter:blur(4px);">
                <img src="{{ asset('img/index/banner.jpg') }}" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-caption d-none d-md-block text-light" style="top: 55%; transform: translateY(-50%)">
                <p style="text-shadow: 3px 3px #000000; font-size: 42px;">Elaborado con clase,</p>
                <p style="text-shadow: 3px 3px #000000; font-size: 42px;">servido con elegancia</p> 
            </div>
        </div>
    </div>
</div>
@endsection