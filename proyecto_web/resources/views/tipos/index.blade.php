@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion :urlVolver="'vehiculos.index'" :titulo="'Gestión de tipos vehículos'" :boton="false" :urlBoton="'tipos.create'" :textoBoton="'Agregar tipo'"/>

<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <h5 class="card-header bg-info text-white">Listado de tipos de vehículos</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nº</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipos as $index=>$tipo)
                            <tr>
                                <td class="small text-center">{{ $index+1 }}</td>
                                <td class="small">{{ $tipo->nombre }}</td>
                                <td class="small">${{ $tipo->valor }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-danger btn-sm pb-0" data-bs-toggle="modal" data-bs-target="#borrarModal{{$tipo->id}}">
                                        <span class="material-icons text-white" style="font-size: 1.1em">delete</span>
                                    </a>
                                    <a href="#" class="btn btn-secondary btn-sm pb-0" data-bs-toggle="modal" data-bs-target="#editarModal{{$tipo->id}}">
                                        <span class="material-icons text-white" style="font-size: 1.1em">mode_edit</span>
                                    </a>
                                </td>
                            </tr>
                            <x-modal-borrado 
                            :url="'tipos.destroy'"
                            :id="$tipo->id" 
                            :nombre="$tipo->nombre" 
                            :textoBoton="'Borrar tipo de vehículo'" 
                              />
                            {{-- MODAL EDITAR --}}
                            <div class="modal fade" id="editarModal{{$tipo->id}}" tabindex="-1" aria-labelledby="editarModalLabel{{$tipo->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="editarModalLabel{{$tipo->id}}">Editar datos de {{$tipo->nombre}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('tipos.update', $tipo->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label text-dark">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tipo->nombre }}">
                                            </div>
                                            <div class="mb-3">
                                                    <label for="valor" class="form-label text-dark ">Valor:</label>
                                                    <input type="number" min="1" class="form-control"  id="valor" name="valor" value="{{ $tipo->valor }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="text-white btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="text-white btn btn-secondary">Confirmar cambios</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            {{-- /MODAL EDITAR --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mb-3 d-flex justify-content-end">
        <div class="card border-secondary" style="width: 18rem;">
            <div class="card-header bg-secondary text-white" style="font-weight: bold;">
                <h5 class="m-0">Agregar nuevo tipo de vehículo.</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('tipos.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label text-dark">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                        <label for="valor" class="form-label text-dark ">Valor:</label>
                        <input type="number" min="1" class="form-control"  id="valor" name="valor">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-secondary text-white">Agregar tipo de vehículo.</button>
                </div>
              </form>
            </div>
          </div>
    </div>

</div>
@endsection