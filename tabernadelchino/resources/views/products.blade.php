@extends('layout')
@section('title', 'Productos - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container text-light row justify-content-center mt-5 mb-5 rounded" style="background-color: #000;">
        <div class="col-auto">
            @if (count($products) == 0)
                <h1 class="text-light m-5">No se ha encontrado ningún producto...</h1>
            @else
                <table class="table table-responsive">
                    @php($i = 1)
                    @foreach ($products as $product)
                        @if( $i == 1 )
                            <tr style="border-bottom: none;">
                        @endif
                        <td height="600px" width="400px">
                            <a href="{{ url('products/' . $product->id) }}">
                                <div style="text-align:center;">
                                    <img src="{{ $product->image; }}" height="400px">
                                </div>
                                <h3 class="text-light">{{ $product->name; }}</h3>
                            </a>
                            <p class="text-light">{{ $product->description; }}</p>
                            <h3 class="text-light">{{ $product->price; }}€</h3>
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