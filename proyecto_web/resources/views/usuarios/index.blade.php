@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion :urlVolver="'home.index'" :titulo="'Gestión de usuarios'" :boton="false" :urlBoton="'usuarios.create'" :textoBoton="'Agregar nuevo usuario'"/>


<div class="row">
    {{-- LISTADO USUARIOS --}}
    <div class="col-9 mb-3">
        <div class="card border-info">
            <div class="card-header bg-info text-white" style="font-weight: bold;">
                <h5 class="m-0">Listado de usuarios</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-stripped table-bordered table-hover">
                      <thead class="table-dark">
                          <tr>
                              <th>Nº</th>
                              <th>Email</th>
                              <th>Nombre</th>
                              <th>Perfil</th>
                              <th>Estado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($usuarios as $index=>$usuario)
                          <tr>
                              <td class="small text-center">{{ $index+1 }}</td>
                              <td class="small">{{ $usuario->email }}</td>
                              <td class="small">{{ $usuario->nombre }}</td>
                              <td class="small">{{ $usuario->perfil->nombre }}</td>
                              <td class="small">{{ $usuario->activo?'Activo':'Baneado' }}</td>
                              <td class="text-center">
                                  @if($usuario->activo)
                                  <a href="#" class="btn btn-sm btn-danger pb-0" data-bs-toggle="modal" title="Banear usuario" data-bs-target="#borrarModal{{$usuario->email}}">
                                      <i class="material-icons text-white" style="font-size: 1.1em">person_off</i>
                                  </a>
                                  @else
                                  <a href="#" class="btn btn-sm btn-info pb-0" data-bs-toggle="modal" title="Desbanear usuario" data-bs-target="#desbanModal{{$usuario->email}}">
                                      <i class="material-icons text-white" style="font-size: 1.1em">person</i>
                                  </a>
                                  @endif
                                  <a class="btn btn-sm btn-secondary pb-0" data-bs-toggle="modal" title="Editar datos" data-bs-target="#editarModal{{$usuario->email}}">
                                    <i class="material-icons text-white" style="font-size: 1.1em">mode_edit</i>
                                  </a>
                              </td>
                          </tr>
                          <x-modal-borrado 
                          :url="'usuarios.destroy'"
                          :id="$usuario->email" 
                          :nombre="$usuario->nombre" 
                          :textoBoton="'Banear usuario.'" 
                            />
                
                            {{-- MODAL DESBAN --}}
                            <div class="modal fade" id="desbanModal{{$usuario->email}}" tabindex="-1" aria-labelledby="Modal{{$usuario->email}}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5 text-dark text-bold" id="desbanModal{{$usuario->email}}Label">¿Desea desbanear a {{$usuario->nombre}}?</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('usuarios.desban',$usuario->email)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-content-between "> 
                                          <button type="button" class="btn btn-dark text-white" data-bs-dismiss="modal">Cancelar</button>
                                          <button type="submit" class="btn btn-danger text-white">Desbanear usuario.</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            {{-- /MODAL DESBAN --}}
                
                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="editarModal{{$usuario->email}}" tabindex="-1" aria-labelledby="Modal{{$usuario->email}}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5 text-dark text-bold" id="editarModal{{$usuario->email}}Label">Editar datos de {{$usuario->nombre}}.</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('usuarios.update',$usuario->email)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-dark">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label text-dark">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="perfil_id" class="form-label text-dark">Perfil</label>
                                            <select class="custom-select mr-sm-2 form-control" id="perfil_id" name="perfil_id">
                                                <option selected value="{{$usuario->perfil->id}}">{{$usuario->perfil->nombre}}</option>
                                                @foreach($perfiles as $perfil)
                                                    @if($perfil->id != $usuario->perfil->id)
                                                    <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
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
    
    {{-- /LISTADO USUARIOS --}}

    {{-- AGREGAR USUARIO --}}
    <div class="col-3 mb-3 d-flex justify-content-end">
        <div class="card border-secondary" style="width: 18rem;">
            <div class="card-header bg-secondary text-white" style="font-weight: bold;">
                <h5 class="m-0">Agregar nuevo cliente</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label text-dark">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="perfil_id" class="form-label text-dark">Perfil</label>
                    <select class="custom-select mr-sm-2 form-control" id="perfil_id" name="perfil_id">
                        <option selected value="0">Seleccione</option>
                        @foreach($perfiles as $perfil)
                        <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-secondary text-white">Agregar usuario</button>
                </div>
                </form>
            </div>
            </div>
    </div>
    {{-- /AGREGAR USUARIO --}}
</div>
    

@endsection