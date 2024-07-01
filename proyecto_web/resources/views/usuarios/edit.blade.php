@extends('templates.master')

@section('contenido-pagina')
<x-titulo-gestion :urlVolver="'home.index'" :titulo="'Administrar cuenta'" :boton="false" :urlBoton="'usuarios.create'" :textoBoton="'Agregar nuevo usuario'"/>

<form action="{{route('usuarios.updateMe',$usuario->email)}}" method="POST" class="border border-info bg-white rounded p-3">
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
    <label for="password" class="form-label text-dark">Cambiar contraseña</label>
    <input type="password" class="form-control" id="password" name="password"">
  </div>
  <div class="d-flex justify-content-between "> 
    <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-secondary text-white">Confirmar cambios</button>
  </div>
</form>
@endsection