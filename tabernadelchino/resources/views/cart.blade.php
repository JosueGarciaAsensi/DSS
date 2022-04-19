@extends('layouts.master')
@section('title', 'Mi carrito - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    @php($total = 0.0)
    <div class="container mt-5 mb-5 rounded" style="background-color: black;">
        <div class="row p-3" style="border-bottom: none;">
            <div class="col">
                @if($products == [])
                    <h1 class="text-light">No hay productos en la cesta...</h1>
                @else
                    @foreach($products as $product)
                        <div class="row text-light align-items-center">
                            <div class="col">
                                <img src="{{ $product->image }}" height="250px">
                            </div>
                            <div class="col float-start text-start ms-auto">
                                <h4>{{ $product->name }}</h4>
                            </div>
                            <div class="col float-end text-end ms-auto">
                                <h4>{{ $product->price }}€</h4>
                                @php($total += $product->price)
                            </div>
                            <div class="col">
                                <a href="" class="nav-item nav-link" onclick="event.preventDefault();
                                                            document.getElementById('removeFrom-form<?php echo $product->id ?>').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-light" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                    </svg>
                                </a>
                                <form id="removeFrom-form{{ $product->id }}" action="{{ route('removeFromCart') }}" method="POST" class="d-none">
                                    @csrf
                                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col float-end text-end ms-auto">
                <h2 class="text-light">Total: {{ $total }}€</h2>
                @if ($products == [])
                    <button type="submit" class="btn mt-4" style="background-color:#ffa834; color: #3c3c3c" disabled>Realizar compra</button>
                @else
                    <button type="submit" class="btn mt-4" style="background-color:#ffa834; color: #3c3c3c">Realizar compra</button>
                @endif
            </div>
        </div>
    </div>
@endsection