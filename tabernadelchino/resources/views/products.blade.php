@extends('layouts.master')
@section('title', 'Productos - La Taberna del Chino')
@section('menu')
@parent
@endsection
@section('content')
<div class="container text-light row justify-content-center mt-5 mb-5 rounded" style="background-color: #000;">
    <div class="col-auto">
        @if (count($products) == 0)
        <h1 class="text-light m-5">{{__('text.noresults')}}</h1>
        @else
        <table class="table table-responsive">
            @php($i = 1)
            @foreach ($products as $product)
            @if( $i == 1 )
            <tr style="border-bottom: none;">
                @endif
                <td height="600px" width="400px">
                    <a style="text-decoration:none;" href="{{ url('products/' . $product->id) }}">
                        <div style="text-align:center;">
                            <img src="{{ $product->image; }}" height="400px">
                            <h3 class="text-light">{{ $product->name; }}</h3>
                            @if(!is_null($product->beer_types))
                            <h4 class="mt-2 mb-4" style="color: #ffa834;">{{ $product->beer_types->names; }}</h4>
                            @else
                            <h4 class="mt-2 mb-4" style="color: #ffa834;">{{__('text.notype')}}</h4>
                            @endif
                        </div>
                    </a>

                    <h3 class="text-light d-flex justify-content-center">
                        <div class="mx-4">{{ $product->price; }}€</div>
                        @if($product->stock > 0 && $product->stock < 5)
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill text-warning align-self-center" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8" />
                        </svg>
                        @elseif($product->stock > 0)
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill text-success align-self-center" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill text-danger align-self-center" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8" />
                        </svg>
                        @endif
                    </h3>
    </div>
    </td>
    @php($i = $i + 1)
    @if( $i == 4)
    </tr>
    @php($i = 1)
    @endif
    @endforeach
    </table>
    @endif
</div>
<div class="d-flex justify-content-center">{{ $products->links() }}</div>
</div>
@endsection