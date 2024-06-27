@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion :urlVolver="'home.index'" :titulo="'Gestión de usuarios'" :boton="true" :urlBoton="'usuarios.create'" :textoBoton="'Agregar nuevo usuario'"/>



<div class="table-responsive">
  <table class="table table-stripped table-bordered table-hover">
      <thead class="table-dark">
          <tr>
              <th>Nº</th>
              <th>Email</th>
              <th>Nombre</th>
              <th>Rol</th>
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
                  <a href="#" class="btn btn-sm btn-danger pb-0">
                      <i class="material-icons text-white" style="font-size: 1.1em">person_off</i>
                  </a>
                  @else
                  <a href="#" class="btn btn-sm btn-info pb-0">
                      <i class="material-icons text-white" style="font-size: 1.1em">person</i>
                  </a>
                  @endif
                  <a href="{{route('usuarios.edit',$usuario->email)}}" class="btn btn-sm btn-secondary pb-0">
                    <i class="material-icons text-white" style="font-size: 1.1em">mode_edit</i>
                  </a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
    

@endsection