@extends('layouts.master')
@section('title', $product->name . ' - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container text-light row justify-content-center mt-5 rounded" style="background-color: #000;">
        <div class="col-autop">
            <table class="table table-responsive">
                <tr>
                    <td>
                        <div style="text-align:center;">
                            <img src="{{ $product->image }}" height="600px">
                        </div>
                    </td>
                    <td>
                        <h1 class="text-light mt-2 mb-3">{{ $product->name }}</h1>
                        @if (!is_null($product->beer_types))
                            <h4 class="mt-2 mb-4" style="color: #ffa834;">{{ $product->beer_types->names }}</h4>
                        @else
                            <h4 class="mt-2 mb-4" style="color: #ffa834;">Sin tipo</h4>
                        @endif
                        <p class="text-light mt-2 mb-4">{{ $product->description }}</p>
                        <h2 class="text-light mt-2">{{ $product->price }}€</h2>
                        @if($product->stock > 0)
                            <h3 style="color: #69BA83">Stock: {{$product->stock}} unidades</h3>
                            <button type="submit" class="btn mt-4" style="background-color:#ffa834; color: #3c3c3c">Añadir al carrito</button>
                        @else
                            <h3 style="color: #BA6969">No hay unidades disponibles</h3>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container text-light row justify-content-center mt-5 mb-5 rounded" style="background-color: #000;">
        <div class="col-auto">
            <h1>Te podría interesar...</h1>
            <table class="table table-responsive">
                @php($i = 1)
                @foreach ($productsAlt as $productAlt)
                    @if ($i == 1)
                        <tr>
                    @endif
                    @if ($productAlt->id != $product->id and $i < 4)
                        <td height="600px" width="400px">
                            <a href="{{ url('products/' . $productAlt->id) }}">
                                <div style="text-align:center;">
                                    <img src="{{ $productAlt->image }}" height="400px">
                                <h4 class="text-light">{{ $productAlt->name }}</h4>
                                @if (!is_null($productAlt->beer_types))
                                    <h4 class="mt-2 mb-4" style="color: #ffa834;">{{ $productAlt->beer_types->names }}
                                    </h4>
                                @else
                                    <h4 class="mt-2 mb-4" style="color: #ffa834;">Sin tipo</h4>
                                @endif
                                </div>
                            </a>
                            <div style="text-align:center;">
                            <p class="text-light">{{ $productAlt->description }}</p>
                            <h4 class="text-light">{{ $productAlt->price }}€</h4>
                            @if($productAlt->stock > 0)
                                <h3 style="color: #69BA83">Disponible</h3>                                
                            @else
                                <h3 style="color: #BA6969">Sin stock</h3>
                            @endif
                            </div>
                        </td>
                        @php($i = $i + 1)
                        @if ($i == 4)
                            </tr>
                        @endif
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection
