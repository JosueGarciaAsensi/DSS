@extends('admin')
@section('title', 'Usuarios - La Taberna del Chino')
@section('menu')
    @parent
@endsection

@section('content')
<div class="container mt-5 mb-5 rounded" style="background-color: black;">
    <div class="container">
        <div class="row row-cols-6" style="text-align: center; color: white;">
            <div class="col"><b>ID</b></div>
            <div class="col"><b>Nombre</b></div>
            <div class="col"><b>Apellidos</b></div>
            <div class="col"><b>Email</b></div>
            <div class="col"><b>DNI</b></div>
            <div class="col"><b>Admin</b></div>
        </div>
        <div class="row row-cols-6" style="text-align: center; color: white;">
            @foreach ($users as $user)
            <div class="col">{{$user->id}}</div>
            <div class="col">{{$user->name}}</div>
            <div class="col">{{$user->surname}}</div>
            <div class="col">{{$user->email}}</div>
            <div class="col">{{$user->dni}}</div>
            <div class="col">{{$user->admin}}</div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-pencil text-light" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
            <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-trash text-light" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="tituloDelete" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloDelete">Eliminar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('/admin-users/delete')}}" method="POST">   
            <div class="row">
                <div class="col">
                    <p>ID: </p>
                </div>
                <div class="col">
                    <input type="text" id="nombre" placeholder="ID"/>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Confirmar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
@endsection