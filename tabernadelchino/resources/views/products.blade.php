@extends('layout')
@section('title', 'Productos - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container text-light row justify-content-center" style="background-color: #000;">
        <div class="col-auto">
            <table class="table table-responsive">
                @php($i = 1)
                @foreach ($products as $product)
                    @if( $i == 1 )
                        <tr>
                    @endif
                    <td height="600px" width="400px">
                        <div style="text-align:center;">
                            <img src="{{ $product->image; }}" height="400px">
                        </div>
                        <h3 class="text-light">{{ $product->name; }}</h3>
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
        </div>
    </div>
@endsection