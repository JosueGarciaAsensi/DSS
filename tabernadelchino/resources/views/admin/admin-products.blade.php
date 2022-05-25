@extends('layouts.admin')
@section('title', 'Productos - La Taberna del Chino')
@section('menu')
@parent
@endsection

@section('content')
<div class="container px-4">
    <button class="btn btn-success mt-5" type="submit" data-bs-toggle="modal" data-bs-target="#importModal">
        <b>{{__('text.importCSV')}}</b>
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-excel text-light" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z" />
            <path fill-rule="evenodd" d="M8.5 1h1a1 1 0 0 1 1 1v11.5a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5V2.5a.5.5 0 0 1 .5-.5zm-1 11.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3h-1v10z" />
        </svg>
    </button>
    <div class="row mt-3">
        <div class="container col-lg-2 d-flex align-items-left flex-column mb-5 p-4 rounded" style="background-color: black;">
            <div class="p-2" style="text-align: left; color: white;">
                <b>{{__('text.filters')}}</b>
            </div>
            <hr style="color:#acacac; margin-top:10px;" />
            <form action="{{ route('admin-products-filter') }}" method="GET">
                {{ csrf_field() }}
                <div class="row">
                    <div class="p-2">
                        <div class="form-group" style="text-align: left; color: white;">
                            <label class="form-check-label" for="beertype">{{__('text.type')}}: </label>
                            <select class="form-control" name="beertype" id="beertype">
                                <option value='null'></option>
                                @foreach($beertypes as $beertype)
                                @if(!is_null($beertype->id))
                                <option value="{{$beertype->id}}">{{$beertype->names}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="form-group" style="text-align: left; color: white;">
                            <label class="form-check-label" for="precio">{{__('text.price')}}: </label>
                            <select class="form-control" name="sign" id="sign">
                                <option value="empty"></option>
                                <option value="greater"> > </option>
                                <option value="equal"> = </option>
                                <option value="less"> < </option>
                            </select>
                            <input type="number" min="0" step="0.01" id="price" name="price" class="form-control mt-2" placeholder="{{__('text.price')}}">
                        </div>
                    </div>
                    <div class="p-2" style="text-align: center; color: white;">
                        <div class="form-check">
                            <label class="form-check-label" for="visible">{{__('text.visible')}}</label>
                            @if($search_visibles == true)
                            <input type="checkbox" id="visible" name="visible" class="form-check-input" checked>
                            @else
                            <input type="checkbox" id="visible" name="visible" class="form-check-input">
                            @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="invisible">{{__('text.notvisible')}}</label>
                            @if($search_invisibles == true)
                            <input type="checkbox" id="invisible" name="invisible" class="form-check-input" checked>
                            @else
                            <input type="checkbox" id="invisible" name="invisible" class="form-check-input">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="p-2">
                        <div class="form-group">
                            <label for="order_by" style="color: white;"><b>{{__('text.orderby')}}</b></label>
                            <select class="form-control" id="order_by" name="order_by">
                                @if ($order == 'name')
                                    <option value="name" selected>{{__('text.name')}}</option>
                                @else
                                    <option value="name">{{__('text.name')}}</option>
                                @endif
                                @if ($order == 'beertype')
                                    <option value="beer_types_id">{{__('text.type')}}</option>
                                @else
                                    <option value="beer_types_id">{{__('text.type')}}</option>
                                @endif
                                @if ($order == 'stock')
                                    <option value="stock" selected>{{__('text.stock')}}</option>
                                @else
                                    <option value="stock">{{__('text.stock')}}</option>
                                @endif
                                @if ($order == 'price')
                                    <option value="price" selected>{{__('text.price')}}</option>
                                @else
                                    <option value="price">{{__('text.price')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row p-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="submit">{{__('text.applyfilters')}}</button>
                </div>
            </form>
        </div>
        <br>
        <div class="container col mb-5 p-4 rounded" style="background-color: black;">
            @if(!is_null($products))
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
            @endif
            <div class="row row-cols-6 mb-2" style="text-align: center; color: white;">
                <div class="col"><b>{{__('text.name')}}</b></div>
                <div class="col"><b>{{__('text.type')}}</b></div>
                <div class="col"><b>{{__('text.stock')}}</b></div>
                <div class="col"><b>{{__('text.price')}}</b></div>
                <div class="col"><b>{{__('text.visible')}}</b></div>
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
                @foreach ($products as $product)
                <div class="col">{{$product->name}}</div>
                @if(is_null($product->beer_types))
                <div class="col">-</div>
                @else
                <div class="col">{{$product->beer_types->names}}</div>
                @endif
                <div class="col">{{$product->stock}}</div>
                <div class="col">{{$product->price}}</div>
                <div class="col">
                    @if ($product->visible == 1)
                    {{__('text.yes')}}
                    @else
                    {{__('text.no')}}
                    @endif
                </div>
                <div class="col d-flex align-items-center">
                    <form action="{{ route('admin-product-delete', ['id' => $product->id]) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-light" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </button>
                    </form>
                    <!-- Button trigger modal -->
                    <form>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$product->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil text-light" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center"> {{ $products->appends(['products' => $products, 'beertypes' => $beertypes, 'search_visibles' => $search_visibles, 'search_invisibles' => $search_invisibles, 'order' => $order])->appends(request()->except('page'))->links() }} </div>
            @else
            <h1 class="text-light">{{__('text.noresults')}}</h1>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalTitle">{{__('text.addbeer')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin-product-create') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">{{__('text.name')}}: </label>
                        <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('text.name')}}" required>
                        @error('name')
                            <script>
                                $(function() {
                                $('#createModal').modal('show');
                                });
                            </script>
                            <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="beertype">{{__('text.type')}}: </label>
                        <select class="form-control" name="beertype" id="beertype">
                            @foreach($beertypes as $beertype)
                            @if(!is_null($beertype->id))
                            <option value="{{$beertype->id}}" {{ old('beertype') == $beertype->id ? 'selected' : '' }}>{{$beertype->names}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">{{__('text.description')}}: </label>
                        <input type="text" id="description" value="{{ old('description') }}" name="description" class="form-control" placeholder="{{__('text.description')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">{{__('text.stock')}}: </label>
                        <input type="number" min="0" id="stock" value="{{ old('stock') }}" name="stock" default="0" class="form-control" placeholder="{{__('text.stock')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">{{__('text.price')}}: </label>
                        <input type="number" min="0" step="0.01" id="price" value="{{ old('price') }}" name="price" default="0" class="form-control" placeholder="{{__('text.price')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('text.image')}}: </label>
                        <input type="text" id="image" value="{{ old('image') }}" name="image" class="form-control" placeholder="{{__('text.image')}}" required>
                    </div>
                    <br>
                    <div class="form-check">
                        <input type="checkbox" id="visible" name="visible" class="form-check-input" {{ old('visible') == 'on' ? 'checked' : '' }}>
                        <label class="form-check-label" for="visible">{{__('text.isvisible')}}</label>
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

<!-- Formulario para importar con CSV -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalTitle">{{__('text.import')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin-product-import') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="userCSV" name="userCSV" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="file">{{__('text.file')}}: </label>
                        <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                        @error('file')
                        <script>
                            $(function() {
                                $('#importModal').modal('show');
                            });
                        </script>
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">{{__('text.import')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(!is_null($products))
@foreach ($products as $product)
<!-- Modal -->
<div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle{{$product->id}}">{{__('text.editbeer')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin-product-edit', ['id' => $product->id]) }}" method="POST">
                    @method('PATCH')
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name{{$product->id}}">{{__('text.name')}}: </label>
                        <input type="text" id="name{{$product->id}}" name="name{{$product->id}}" class="form-control" placeholder="{{__('text.name')}}" value="{{$product->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="beertype{{$product->id}}">{{__('text.type')}}: </label>
                        <select class="form-control" name="beertype{{$product->id}}" id="beertype{{$product->id}}" >
                            @foreach($beertypes as $beertype)
                            @if(!is_null($beertype->id) && $beertype->id == $product->beertype_id)
                            <option value="{{$beertype->id}}" selected>{{$beertype->names}}</option>
                            @elseif(!is_null($beertype->id))
                            <option value="{{$beertype->id}}">{{$beertype->names}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description{{$product->id}}">{{__('text.description')}}: </label>
                        <input type="text" id="description{{$product->id}}" name="description{{$product->id}}" class="form-control" placeholder="{{__('text.description')}}" value="{{$product->description}}" required>
                    </div>
                    <div class="form-group">
                        <label for="stock{{$product->id}}">{{__('text.stock')}}: </label>
                        <input type="number" min="0" id="stock{{$product->id}}" name="stock{{$product->id}}" class="form-control" placeholder="{{__('text.stock')}}" value="{{$product->stock}}" required>
                    </div>
                    <div class="form-group">
                        <label for="price{{$product->id}}">{{__('text.price')}}: </label>
                        <input type="number" min="0" step="0.01" id="price{{$product->id}}" name="price{{$product->id}}" class="form-control" placeholder="{{__('text.price')}}" value="{{$product->price}}" required>
                    </div>
                    <div class="form-group">
                        <label for="image{{$product->id}}">{{__('text.image')}}: </label>
                        <input type="text" id="image{{$product->id}}" name="image{{$product->id}}" class="form-control" placeholder="{{__('text.image')}}" value="{{$product->image}}" required>
                    </div>
                    <br>
                    <div class="form-check">
                        @if ($product->visible == 1)
                        <input type="checkbox" id="visible{{$product->id}}" name="visible{{$product->id}}" class="form-check-input" checked>
                        @else
                        <input type="checkbox" id="visible{{$product->id}}" name="visible{{$product->id}}" class="form-check-input">
                        @endif
                        <label class="form-check-label" for="visible{{$product->id}}">{{__('text.isvisible')}}</label>
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