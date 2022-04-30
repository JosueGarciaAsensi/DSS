@extends('layouts.admin')
@section('title', 'Usuarios - La Taberna del Chino')
@section('menu')
@parent
@endsection
@section('content')

<div class="container px-4">
    <div class="row">
        <div class="container col-lg-2 d-flex align-items-left flex-column mt-5 mb-5 p-4 rounded" style="background-color: black;">
            <div class="p-2" style="text-align: left; color: white;">
                <b>{{__('text.filters')}}</b>
            </div>
            <hr style="color:#acacac; margin-top:10px;" />
            <form action="{{ url('/admin-users/search/') }}" method="GET">
                @method('GET')
                {{ csrf_field() }}
                <div class="row">
                    <div class="p-2">
                        <div class="form-check" style="text-align: center; color: white;">
                            <label class="form-check-label" for="search_admins">{{__('text.administrators')}}</label>
                            @if($search_admins == true)
                            <input type="checkbox" id="search_admins" name="search_admins" class="form-check-input" checked>
                            @else
                            <input type="checkbox" id="search_admins" name="search_admins" class="form-check-input">
                            @endif
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="form-check" style="text-align: center; color: white;">
                            <label class="form-check-label" for="search_users">{{__('text.users')}}</label>
                            @if($search_users == true)
                            <input type="checkbox" id="search_users" name="search_users" class="form-check-input" checked>
                            @else
                            <input type="checkbox" id="search_users" name="search_users" class="form-check-input">
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row p-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">{{__('text.applyfilters')}}</button>
                </div>
            </form>
        </div>

        <br>

        <div class="container col mt-5 mb-5 p-4 rounded" style="background-color: black;">
            @if(!is_null($users))
            <div class="row row-cols-6 mb-2" style="text-align: center; color: white;">
                <div class="col"><b>{{__('text.name')}}</b></div>
                <div class="col"><b>{{__('text.surname')}}</b></div>
                <div class="col"><b>Email</b></div>
                <div class="col"><b>DNI</b></div>
                <div class="col">
                    <div class="row">
                        <div class="col"><b>Admin</b></div>
                        <div class="col"><b>Visible</b></div>
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-success" type="submit" data-bs-toggle="modal" data-bs-target="#createModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus text-light" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                </div>
            </div>
            <hr style="color:#acacac;" />
            <div class="row row-cols-6" style="text-align: center; color: white;">
                @foreach ($users as $user)
                <div class="col">{{$user->name}}</div>
                <div class="col">{{$user->surname}}</div>
                <div class="col">{{$user->email}}</div>
                <div class="col">{{$user->dni}}</div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            @if ($user->admin == 1)
                            {{__('text.yes')}}
                            @else
                            {{__('text.no')}}
                            @endif
                        </div>
                        <div class="col">
                            @if ($user->visible == 1)
                            {{__('text.yes')}}
                            @else
                            {{__('text.no')}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <form action="{{ url('/admin-users/delete/' . $user->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-danger" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-light" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                            </form>
                            <!-- Button trigger modal -->
                            <form>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil text-light" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            </div>
            @elseif(Session::has('success'))
            <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
            </div>
            @endif
            <div class="d-flex justify-content-center"> {{ $users->links() }} </div>
            @else
        <h1 class="text-light">{{__('text.noresultsusers')}}</h1>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle">{{__('text.createuser')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/users/create')}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">{{__('text.name')}}: </label>
                            <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control" placeholder="{{__('text.name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">{{__('text.surname')}}: </label>
                            <input type="text" id="surname" value="{{ old('surname') }}" name="surname" class="form-control" placeholder="{{__('text.surname')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="passwd">{{__('text.password')}}: </label>
                            <input type="password" id="passwd" value="{{ old('passwd') }}" name="passwd" class="form-control" placeholder="{{__('text.password')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI: </label>
                            <input type="text" id="dni" name="dni" value="{{ old('dni') }}" class="form-control" placeholder="DNI" required>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" id="visible" value="{{ old('visible') }}" name="visible" class="form-check-input">
                            <label class="form-check-label" for="visible">{{__('text.isvisible')}}</label>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="checkbox" id="admin" value="{{ old('admin') }}" name="admin" class="form-check-input">
                            <label class="form-check-label" for="admin">{{__('text.isadmin')}}</label>
                        </div>
                        <br>
                        <h3>{{__('text.address')}}</h3>
                        <div class="form-group">
                            <label for="type">{{__('text.type')}}: </label>
                            <select  class="form-control" id="type" value="{{ old('type') }}" name="type">
                                <option value="Calle">Calle</option>
                                <option value="Avenida">Avenida</option>
                                <option value="Paseo">Paseo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">{{__('text.address')}}: </label>
                            <input type="text" class="form-control" id="address" value="{{ old('address') }}" name="address" placeholder="{{__('text.address')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="cp">{{__('text.postal')}}: </label>
                            <input type="text" class="form-control" id="cp" value="{{ old('cp') }}" name="cp" placeholder="{{__('text.postal')}}" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{__('text.create')}}</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('text.close')}}</button>
                </div>
            </div>
        </div>
    </div>

    @if(!is_null($users))
    @foreach ($users as $user)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{$user->id}}">{{__('text.edituser')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/users/edit/' . $user->id)}}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name{{$user->id}}">{{__('text.name')}}: </label>
                            <input type="text" id="name{{$user->id}}" name="name{{$user->id}}" class="form-control" placeholder="{{__('text.name')}}" value="{{$user->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="surname{{$user->id}}">{{__('text.surname')}}: </label>
                            <input type="text" id="surname{{$user->id}}" name="surname{{$user->id}}" class="form-control" placeholder="{{__('text.surname')}}" value="{{$user->surname}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email{{$user->id}}">Email: </label>
                            <input type="email" id="email{{$user->id}}" name="email{{$user->id}}" class="form-control" placeholder="Email" value="{{$user->email}}" required>
                        </div>
                        <div class="form-group">
                            <label for="dni{{$user->id}}">DNI: </label>
                            <input type="text" id="dni{{$user->id}}" name="dni{{$user->id}}" class="form-control" placeholder="DNI" value="{{$user->dni}}" required>
                        </div>
                        <br>
                        <div class="form-check">
                            @if ($user->visible == 1)
                            <input type="checkbox" id="visible{{$user->id}}" name="visible{{$user->id}}" class="form-check-input" checked>
                            @else
                            <input type="checkbox" id="visible{{$user->id}}" name="visible{{$user->id}}" class="form-check-input">
                            @endif
                            <label class="form-check-label" for="visible{{$user->id}}">{{__('text.isvisible')}}</label>
                        </div>
                        <br>
                        <div class="form-check">
                            @if ($user->admin == 1)
                            <input type="checkbox" id="admin{{$user->id}}" name="admin{{$user->id}}" class="form-check-input" checked>
                            @else
                            <input type="checkbox" id="admin{{$user->id}}" name="admin{{$user->id}}" class="form-check-input">
                            @endif
                            <label class="form-check-label" for="admin{{$user->id}}">{{__('text.isadmin')}}</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{__('text.apply')}}</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('text.close')}}</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    @endsection