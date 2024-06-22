@extends('templates.master')

@section('contenido-pagina')

<div class="row">
    <div class="col-lg-9">
        <h3 class="text-info m-0">Gestionar usuarios</h3>
    </div>
    <div class="col-lg-3 d-flex justify-content-end">
      <a class="btn btn-info text-white d-flex align-items-center " href="{{route('usuarios.create')}}" role="button"><i class="material-icons">add</i>Crear nuevo usuario</a>
    </div>
</div>
<hr class="bg-info border-info" style="height: 2px;">


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
                  <a href="{{route('usuarios.edit',$usuario)}}" class="btn btn-sm btn-info pb-0">
                    <i class="material-icons text-white" style="font-size: 1.1em">mode_edit</i>
                  </a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
    

@endsection