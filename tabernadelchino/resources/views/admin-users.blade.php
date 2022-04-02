@extends('admin')
@section('title', 'Usuarios - La Taberna del Chino')
@section('menu')
    @parent
@endsection
@section('content')
<div class="container mt-5 mb-5 p-4 rounded" style="background-color: black;">
    <div class="row row-cols-6 mb-2" style="text-align: center; color: white;">
        <div class="col"><b>ID</b></div>
        <div class="col"><b>Nombre</b></div>
        <div class="col"><b>Apellidos</b></div>
        <div class="col"><b>Email</b></div>
        <div class="col"><b>DNI</b></div>
        <div class="col">
            <div class="row">
                <div class="col"><b>Admin</b></div>
                <div class="col">
                    <button class="btn btn-success" type="submit" data-bs-toggle="modal" data-bs-target="#createModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus text-light" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr style="color:#acacac;"/>
    <div class="row row-cols-6" style="text-align: center; color: white;">
        @foreach ($users as $user)
        <div class="col">{{$user->id}}</div>
        <div class="col">{{$user->name}}</div>
        <div class="col">{{$user->surname}}</div>
        <div class="col">{{$user->email}}</div>
        <div class="col">{{$user->dni}}</div>
        <div class="col">
            <div class="row">
                <div class="col">
                    @if ($user->admin == 1)
                        Sí
                    @else
                        No
                    @endif
                </div>                    
                <div class="col d-flex align-items-center">
                    <form action="{{ url('/admin-users/delete/' . $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-light" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </form>
                    <!-- Button trigger modal -->
                    <form>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil text-light" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $users->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalTitle">Crear usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin-users/create')}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nombre: </label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="surname">Apellidos: </label>
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <label for="passwd">Contraseña: </label>
                <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="dni">DNI: </label>
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI">
            </div>
            <br>
            <div class="form-check">
                <input type="checkbox" id="admin" name="admin" class="form-check-input">
                <label class="form-check-label" for="admin">¿Es administrador?</label>
            </div>
            <br>
            <h3>Dirección</h3>
            <div class="form-group">
                <label for="type">Tipo: </label>
                <select id="type" name="type">
                    <option value="Calle">Calle</option>
                    <option value="Avenida">Avenida</option>
                    <option value="Paseo">Paseo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Dirección: </label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label for="cp">Código postal: </label>
                <input type="text" class="form-control" id="cp" name="cp" placeholder="Código postal">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@foreach ($users as $user)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$user->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$user->id}}">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin-users/edit/' . $user->id)}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name{{$user->id}}">Nombre: </label>
                <input type="text" id="name{{$user->id}}" name="name{{$user->id}}" class="form-control" placeholder="Nombre" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="surname{{$user->id}}">Apellidos: </label>
                <input type="text" id="surname{{$user->id}}" name="surname{{$user->id}}" class="form-control" placeholder="Apellidos" value="{{$user->surname}}">
            </div>
            <div class="form-group">
                <label for="email{{$user->id}}">Email: </label>
                <input type="email" id="email{{$user->id}}" name="email{{$user->id}}" class="form-control" placeholder="Email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="dni{{$user->id}}">DNI: </label>
                <input type="text" id="dni{{$user->id}}" name="dni{{$user->id}}" class="form-control" placeholder="DNI" value="{{$user->dni}}">
            </div>
            <br>
            <div class="form-check">
                @if ($user->admin == 1)
                    <input type="checkbox" id="admin{{$user->id}}" name="admin{{$user->id}}" class="form-check-input" checked>
                @else
                    <input type="checkbox" id="admin{{$user->id}}" name="admin{{$user->id}}" class="form-check-input">
                @endif
                <label class="form-check-label" for="admin{{$user->id}}">¿Es administrador?</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Aplicar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection