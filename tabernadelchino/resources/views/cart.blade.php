@extends('layouts.master')
@section('title', 'Mi carrito - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    @php($total = 0.0)
    @php($nostocks = 0)
    <div class="container mt-5 mb-5 p-3 rounded" style="background-color: black;">
        <div class="row" style="border-bottom: none;">
            <div class="col col-xl-12 border-bottom">
                @if($products == [])
                    <h1 class="text-light">{{__('text.noproducts')}}</h1>
                @else
                    @foreach($products as $product)
                        <div class="row border-bottom border-secondary text-light align-items-center p-3">
                            <div class="col col-lg-5">
                                <img src="{{ $product->image }}" height="300px">
                            </div>
                            <div class="col col-lg-4">
                                <h4>{{ $product->name }}</h4>
                            </div>
                            @if($product->stock != 0)
                                <div class="col">
                                    <h4>{{ $product->price }}€</h4>
                                    @php($total += $product->price)
                                </div>
                            @else
                                <div class="col">
                                    <h4 class="text-danger">{{ __('text.nostock') }}</h4>
                                </div>
                                @php($nostocks += 1)
                            @endif

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
                <form action="{{ route('buy') }}" method="POST">
                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="total" name="total" value="{{ $total }}">
                    @csrf
                    @if ($products == [] || $nostocks > 0)
                        <button type="submit" class="btn mt-4" style="background-color:#ffa834; color: #3c3c3c" disabled>{{__('text.buy')}}</button>
                    @else
                        <button type="submit" class="btn mt-4" style="background-color:#ffa834; color: #3c3c3c">{{__('text.buy')}}</button>
                    @endif
                </form>
            </div>
        </div>
        @if($products != [])
            <div class="row mt-3">
                <form action="{{ route('emptyCart') }}" method="POST">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-danger">{{__('text.emptycart')}}</button>
                </form>
            </div>
        @endif
    </div>
@endsection