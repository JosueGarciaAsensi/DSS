@extends('layout')
@section('title', 'Tipo Cerveza - La Taberna del Chino')
@section('menu')
    @parent
@endsection

@section('content')
<div class="container mt-5 mb-5 rounded" style="background-color: black;">
    <div class="container">
        <div class="row row-cols-1" style="text-align: center; color: white;">
            <div class="col"><b>Tipo</b></div>
        </div>
        <div class="row row-cols-1" style="text-align: center; color: white;">
            @foreach ($beertypes as $beertype)
            <div class="col">{{$beertype->names}}</div>
            @endforeach
        </div>
    </div>
</div>
@endsection