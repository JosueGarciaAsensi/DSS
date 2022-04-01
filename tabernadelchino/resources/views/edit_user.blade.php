<form id="modal-form" action="/admin-users/edit/{{$user->id}}" method="POST">
    {{ csrf_field() }}

    <input name="editName" placeholder="Nombre" value="{{$user->name}}">
    <input name="editSurname" placeholder="Apellidos" value="{{$user->surname}}">

    <button type="submit" class="btn btn-sucess">Aplicar cambios</button>
</form>