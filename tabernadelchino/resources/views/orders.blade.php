@extends('layouts.master')
@section('title', 'Inicio - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container text-light row justify-content-center mt-5 mb-5 rounded" style="background-color: black">
        <div class="row text-light">
            <div class="col-md-12 text-light">
                <div class="card text-light row justify-content-center mt-5 mb-5 rounded" style="background-color: black">
                    <div class="card-body text-light">
                        <div class="row text-light">
                            <div class="col-md-12 text-light">
                            @if (count($orders) == 0)
                                <h1 class="text-light m-5">{{__('text.noorders')}}</h1>
                            @else
                            @php($i = 0)
                            <div class="row row-cols-3s">
                                @foreach ($orders as $order)
                                    @if ($i == 3)
                                        <div class="row">
                                    @endif
                                    <div class="col mb-4">
                                        <div class="card text-light row justify-content-center m-2 rounded border border-secondary" style="background-color: black;">
                                            <div class="card-body text-light">
                                                <div class="row text-light">
                                                    <div class="col-md-12 text-light">
                                                        <h5 class="text-light"><b>{{__('text.date')}}:</b> {{ $order->created_at }}</h5>
                                                        <h5 class="text-light"><b>{{__('text.state')}}:</b> {{ $order->state }}</h5>
                                                        <h4 class="text-light"><b>{{__('text.total')}}:</b> {{ $order->total }}€</h4>
                                                    </div>
                                                </div>
                                                <div class="row text-light">
                                                    <div class="col-md-12 text-light">
                                                        <div id="detalles-pedido">
                                                            @foreach ($order->products as $product)
                                                                <div class="row">
                                                                    <div class="col">
                                                                        {{ $product->name }}
                                                                    </div>
                                                                    <div class="col">
                                                                        {{ $product->price }}€
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($i == 3)
                                        </div>
                                        @php($i = 0)
                                    @endif
                                    @php($i++)
                                @endforeach
                            </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
