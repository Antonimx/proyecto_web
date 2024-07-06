@extends('templates.master')

@section('contenido-pagina')
<x-titulo-gestion :urlVolver="'home.index'" :titulo="'Administrar cuenta'" :boton="false" :urlBoton="'usuarios.create'" :textoBoton="'Agregar nuevo usuario'"/>

<form action="{{route('usuarios.updateMe',$usuario->email)}}" method="POST" class="border border-info bg-white rounded p-3">
  @csrf
  @method('PUT')
  <div class="mb-3">
      <label for="email" class="form-label text-dark">Email</label>
      <input type="email" class="form-control @error ('email') is-invalid @enderror" id="email" name="email" value="{{ $usuario->email }}">
      @error('email')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
  </div>
  <div class="mb-3">
      <label for="nombre" class="form-label text-dark">Nombre</label>
      <input type="text" class="form-control  @error ('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $usuario->nombre }}">
      @error('nombre')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label text-dark">Cambiar contraseña</label>
    <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password" name="password"">
    @error('password')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="d-flex justify-content-between "> 
    <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-secondary text-white">Confirmar cambios</button>
  </div>
</form>
@endsection