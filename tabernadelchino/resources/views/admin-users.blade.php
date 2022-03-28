@extends('layout')
@section('title', 'Inicio - La Taberna del Chino')
@section('menu')
    @parent
@endsection
<div class="container mt-5 mb-5 rounded" style="background-color: black;">
        <table class="table table-responsive">
            @foreach ($users as $user)
            <tr>
                <td>
                    <h1>Hola</h1>
                </td>
            </tr>
            @endforeach
        </table>
    </div>