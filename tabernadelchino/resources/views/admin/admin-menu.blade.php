@extends('layouts.admin')
@section('title', 'Administración - La Taberna del Chino')
@section('menu')
@parent
@endsection
@section('content')
<div class="container rounded mt-5 mb-5 p-3" style="background-color:black;">
    <div class="row mb-3">
        <div class="col rounded-pill px-4 mx-2" style="background-color:cadetblue;">
            <div class="row d-flex">
                <div class="col my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-person text-dark" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                </div>
                <div class="col my-auto">
                    <h1>{{__('text.users')}}</h1>
                </div>
                <div class="col d-flex justify-content-end my-auto">
                    <h1>{{ $usersCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col rounded-pill px-4 mx-2" style="background-color:crimson;">
            <div class="row d-flex">
                <div class="col my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-cup text-dark" viewBox="0 0 16 16">
                        <path d="M1 2a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v1h.5A1.5 1.5 0 0 1 16 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-.55a2.5 2.5 0 0 1-2.45 2h-8A2.5 2.5 0 0 1 1 12.5V2zm13 10h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5H14v8zM13 2H2v10.5A1.5 1.5 0 0 0 3.5 14h8a1.5 1.5 0 0 0 1.5-1.5V2z" />
                    </svg>
                </div>
                <div class="col my-auto">
                    <h1>{{__('text.products')}}</h1>
                </div>
                <div class="col d-flex justify-content-end my-auto">
                    <h1>{{ $productsCount }}</h1>
                </div>
            </div>

        </div>
        <div class="col rounded-pill px-4 mx-2" style="background-color:blueviolet;">
            <div class="row d-flex">
                <div class="col my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                    </svg>
                </div>
                <div class="col my-auto">
                    <h1>{{__('text.orders')}}</h1>
                </div>
                <div class="col d-flex justify-content-end my-auto">
                    <h1>{{ $ordersCount }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col rounded-pill px-4 mx-2" style="background-color:forestgreen;">
            <div class="row d-flex">
                <div class="col my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-slash" style="margin-left: -20; margin-right: -35;" viewBox="0 0 16 16">
                        <path d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-person text-dark" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                </div>
                <div class="col my-auto">
                    <h1>{{__('text.ordersperuser')}}</h1>
                </div>
                <div class="col d-flex justify-content-end my-auto">
                    <h1>{{ round($ordersCount/$usersCount, 2) }}</h1>
                </div>
            </div>
        </div>
    </div>
    <hr style="color:#acacac" />
    <div class="row mt-4">
        <h1 class="text-light">{{__('text.bestproduct')}}</h1>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center" height="600px" width="400px">
            <a style="text-decoration:none;" href="{{ url('products/' . $product->id) }}">
                <div style="text-align:center;">
                    <img src="{{ $product->image; }}" height="400px">
                    <h3 class="text-light">{{ $product->name; }}</h3>
                    @if (!is_null($product->beer_types))
                    <h4 class="mt-2 mb-4" style="color: #ffa834;">{{ $product->beer_types->names }}</h4>
                    @else
                    <h4 class="mt-2 mb-4" style="color: #ffa834;">{{__('notype')}}</h4>
                    @endif
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <h3 class="text-light d-flex justify-content-center">
            <div class="mx-4">{{ $product->price; }}€</div>
            @if($product->stock > 0 && $product->stock < 5) <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-circle-fill text-warning align-self-center" viewBox="0 0 16 16">
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
</div>
@endsection