@extends('layouts.admin')
@section('title', 'Pedidos - La Taberna del Chino')
@section('menu')
@parent
@endsection
@section('content')

<div class="container px-4">
    <div class="row">

    <div class="container col-lg-2 d-flex align-items-left flex-column mt-5 mb-5 p-4 rounded" style="background-color: black;">
            <div class="p-2" style="text-align: left; color: white;">
                <b>Filtros</b>
            </div>
            <hr style="color:#acacac; margin-top:10px;" />
            <form action="{{ url('/admin-orders/search/') }}" method="GET">
                @method('GET')
                {{ csrf_field() }}
                <div class="row">

                <div class="p-2">
                        <div class="form-group" style="text-align: left; color: white;">
                            <label class="form-check-label" for="estado">Estado: </label>
                                <select class="form-control" name="state" id="state">
                                    <option value="empty"></option>
                                    <option value="to-pay">Pendiente pago</option>
                                    <option value="paid">Pago realizado</option>
                                    <option value="sent">Enviado</option>
                                    <option value="given">Entregado</option>
                                    <option value="returned">Devuelto</option>
                                </select>                                
                        </div>
                    </div>
                </div>

                <div class="p-2">
                        <div class="form-group" style="text-align: left; color: white;">
                            <label class="form-check-label" for="precio">Total: </label>
                                <select class="form-control" name="sign" id="sign">
                                    <option value="empty"></option>
                                    <option value="greater"> > </option>
                                    <option value="equal"> = </option>
                                    <option value="less"> < </option>
                                </select>
                                <input type="number" min="0" step="0.01" id="price" name="price" class="form-control mt-2" placeholder="Total">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row p-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Aplicar filtros</button>
                </div>
            </form>
        </div>

        <br>

        <div class="container col mt-5 mb-5 p-4 rounded" style="background-color: black;">
            @if(!is_null($orders))
            <div class="row row-cols-4 mb-2" style="text-align: center; color: white;">
                <div class="col"><b>ID</b></div>
                <div class="col"><b>Usuario</b></div>
                <div class="col"><b>Estado</b></div>
                <div class="col"><b>Total</b></div>
            </div>
            @endif
            <hr style="color:#acacac;" />
            <div class="row row-cols-4" style="text-align: center; color: white;">
                @foreach ($orders as $order)
                <div class="col">{{$order->id}}</div>
                <div class="col">{{$order->users_id}}</div>
                <div class="col">{{$order->state}}</div>
                <div class="col">{{$order->total}}</div>
                @endforeach
            </div>
    </div>
    @endsection