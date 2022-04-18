@extends('layouts.master')
@section('title', 'Mi carrito - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container mt-5 mb-5 rounded" style="background-color: black;">
        <table class="table table-responsive">
            <tr style="border-bottom: none;">
                <td>
                    @if($products == [])
                        <h1 class="text-light">No hay productos en la cesta...</h1>
                    @else
                        @foreach($products as $product)
                            <h2 class="text-light">{{ $product->name }}</h2>
                        @endforeach
                    @endif
                </td>
                <td>
                    <h2 class="text-light">0,00€</h2>
                    @if ($products == [])
                        <button type="submit" class="btn mt-4" style="background-color:#ffa834; color: #3c3c3c" disabled>Realizar compra</button>
                    @else
                        <button type="submit" class="btn mt-4" style="background-color:#ffa834; color: #3c3c3c">Realizar compra</button>
                    @endif
                </td>
            </tr>
        </table>
    </div>
@endsection