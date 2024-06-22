@extends('templates.master')

@section('contenido-pagina')

<row class="">
    <form class="border border-info bg-white p-2 rounded text-dark" method="POST" action="{{route('usuarios.update',$usuario)}}">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$usuario->nombre}}">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{$usuario->email}}">
        <div id="email" class="form-text"></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
    </form>
  </row>
@endsection