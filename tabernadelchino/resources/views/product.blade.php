@extends('layouts.master')
@section('title', $product->name . ' - La Taberna del Chino')
@section('menu')
@parent
@endsection
@section('content')
@if (session('success'))
<div class="alert alert-success mt-5">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger mt-5">
    {{ session('error') }}
</div>
@endif
<div class="container text-light row justify-content-center mt-3 rounded" style="background-color: #000;">
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
                    <h4 class="mt-2 mb-4" style="color: #ffa834;">{{__('text.notype')}}</h4>
                    @endif
                    <p class="text-light mt-2 mb-4">{{ $product->description }}</p>
                    <h2 class="text-light mt-2">{{ $product->price }}€</h2>
                    <br>
                    @if($product->stock >= 5)
                    <h3 class="text-success">
                        {{__('text.plentystock')}}
                        @guest
                        <h4 class="text-light mt-5">{{__('text.tobuy')}}</h4>
                        @else
                        <form action="{{ route('cart-add', ['id' => Auth::user()->carts()->first()->id, 'idItem' => $product->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn align-self-center mx-4" style="background-color:#ffa834; color: #3c3c3c">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart text-dark" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </h3>
                    @elseif($product->stock > 0 && $product->stock < 5) <h3 class="text-warning">
                        {{__('text.laststock')}}
                        @guest
                        <h4 class="text-light mt-5">{{__('text.tobuy')}}</h4>
                        @else
                        <form action="{{ route('cart-add', ['id' => Auth::user()->carts()->first()->id, 'idItem' => $product->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn align-self-center mx-4" style="background-color:#ffa834; color: #3c3c3c">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart text-dark" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </form>
                        @endif
                        </h3>
                        @else
                        <h3 class="text-danger">{{__('text.nostock')}}</h3>
                        @endif
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="container text-light row justify-content-center mt-5 mb-5 rounded" style="background-color: #000;">
    <div class="col-auto">
        <h1>{{__('text.interest')}}</h1>
        <table class="table table-responsive">
            @php($i = 1)
            @foreach ($productsAlt as $productAlt)
            @if ($i == 1)
            <tr>
                @endif
                @if ($productAlt->id != $product->id and $i < 4) <td height="600px" width="400px">
                    <a style="text-decoration:none;" href="{{ url('products/' . $productAlt->id) }}">
                        <div style="text-align:center;">
                            <img src="{{ $productAlt->image }}" height="400px">
                            <h4 class="text-light">{{ $productAlt->name }}</h4>
                            @if (!is_null($productAlt->beer_types))
                            <h4 class="mt-2 mb-4" style="color: #ffa834;">{{ $productAlt->beer_types->names }}
                            </h4>
                            @else
                            <h4 class="mt-2 mb-4" style="color: #ffa834;">{{__('text.notype')}}</h4>
                            @endif
                        </div>
                    </a>
                    <h3 class="text-light d-flex justify-content-center">
                        <div class="mx-4">{{ $productAlt->price }}€</div>
                        @if($productAlt->stock < 0) <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill text-danger align-self-center" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8" />
                            </svg>
                            @elseif($productAlt->stock >= 5)
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill text-success align-self-center" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill text-warning align-self-center" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            @endif
                    </h3>
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