@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion :urlVolver="'home.index'" :titulo="'Gestión de clientes'" :boton="false" :urlBoton="'clientes.create'" :textoBoton="'Agregar nuevo cliente'"/>


<div class="row ">
    <div class="col-9 mb-3">
        <div class="card border-info">
            <div class="card-header bg-info text-white" style="font-weight: bold;">
                <h5 class="m-0">Listado de clientes</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-stripped table-bordered table-hover">
                      <thead class="table-dark">
                          <tr>
                              <th>Nº</th>
                              <th>Rut</th>
                              <th>Nombre</th>
                              <th>Número de contacto</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($clientes as $index=>$cliente)
                          <tr>
                              <td class="small text-center">{{ $index+1 }}</td>
                              <td class="small">{{ $cliente->rut }}</td>
                              <td class="small">{{ $cliente->nombre }}</td>
                              <td class="small">{{ $cliente->fono }}</td>
                              <td class="text-center">
                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#borrarModal{{$cliente->rut}}">
                                    <i class="material-icons text-white" style="font-size: 1.1em">person_off</i>
                                </a>
                                  <a class="btn btn-sm btn-secondary pb-0" data-bs-toggle="modal" data-bs-target="#editarModal{{$cliente->rut}}">
                                    <i class="material-icons text-white" style="font-size: 1.1em">mode_edit</i>
                                </a>
                                <a href="{{route('clientes.show',$cliente->rut)}}" class="btn btn-sm btn-info pb-0" data-bs-toggle="tooltip" title="Ver historial de arriendos">
                                <i class="material-icons text-white" style="font-size: 1.1em">manage_search</i>
                                </a>
                              </td>
                          </tr>
                          <x-modal-borrado 
                          :url="'clientes.destroy'"
                          :id="$cliente->rut" 
                          :nombre="$cliente->nombre" 
                          :textoBoton="'Borrar Cliente'" 
                            />

                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="editarModal{{$cliente->rut}}" tabindex="-1" aria-labelledby="Modal{{$cliente->rut}}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5 text-dark text-bold" id="editarModal{{$cliente->rut}}Label">Editar datos de {{$cliente->nombre}}.</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('clientes.update',$cliente->rut)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label text-dark">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fono" class="form-label text-dark">Número de contacto</label>
                                            <input type="text" class="form-control" id="fono" name="fono" value="{{ $cliente->fono }}">
                                        </div>
                                        <div class="d-flex justify-content-between "> 
                                          <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Cancelar</button>
                                          <button type="submit" class="btn btn-secondary text-white">Confirmar cambios</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            {{-- /MODAL EDIT --}}
                          @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>

    {{-- AGREGAR CLIENTE --}}
    <div class="col-3 mb-3 d-flex justify-content-end">
        <div class="card border-secondary" style="width: 18rem;">
            <div class="card-header bg-secondary text-white" style="font-weight: bold;">
                <h5 class="m-0">Agregar nuevo cliente</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('clientes.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="rut" class="form-label text-dark">Rut</label>
                    <input type="text" class="form-control" id="rut" name="rut">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label text-dark">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="fono" class="form-label text-dark">Número de contacto</label>
                    <input type="text" class="form-control" id="fono" name="fono">
                </div>
                <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-secondary text-white">Agregar cliente</button>
                </div>
              </form>
            </div>
          </div>
    </div>
    {{-- /AGREGAR CLIENTE --}}
</div>
    

@endsection
