@extends('admin')
@section('title', 'Tipo Cerveza - La Taberna del Chino')
@section('menu')
    @parent
@endsection

@section('content')
<div class="container mt-5 mb-5 p-4 rounded" style="background-color: black;">
    <div class="container">
        <div class="row row-cols-2" style="text-align: center; color: white;">
            <div class="col"><b>Tipo</b></div>
            <div class="col">
                <div class="row">
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
        <div class="row row-cols-2" style="text-align: center; color: white;">
            @foreach ($beertypes as $beertype)
            <div class="col">{{$beertype->names}}</div>

            <div class="col">
            <div class="row"> 
                <div class="col d-flex align-items-center">
                    <form action="{{ url('/beertypes/delete/' . $beertype->id) }}" method="POST">
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$beertype->id}}">
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
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalTitle">Añadir tipo de cerveza</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/beertypes/create')}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div class="form-group">
                <label for="type">Tipo: </label>
                <input type="text" id="type" name="type" class="form-control" placeholder="Tipo" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@foreach ($beertypes as $beertype)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$beertype->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$beertype->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$beertype->id}}">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/beertypes/edit/' . $beertype->id)}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name{{$beertype->id}}">Nombre: </label>
                <input type="text" id="name{{$beertype->id}}" name="name{{$beertype->id}}" class="form-control" placeholder="Nombre" value="{{$beertype->name}}" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Aplicar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

