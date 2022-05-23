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
                                <table class="table table-striped text-light">
                                    <thead>
                                        <tr>
                                            <th class="text-light">#</th>
                                            <th class="text-light">{{__('text.date')}}</th>
                                            <th class="text-light">{{__('text.total')}}</th>
                                            <th class="text-light">{{__('text.state')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="text-light">{{ $order->id }}</td>
                                                <td class="text-light">{{ $order->created_at }}</td>
                                                <td class="text-light">{{ $order->total }}</td>
                                                <td class="text-light">{{ $order->state }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
