@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion :urlVolver="'home.index'" :titulo="'Gestión de clientes'" :boton="true" :urlBoton="'clientes.create'" :textoBoton="'Agregar nuevo cliente'"/>


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

                  <a href="#" class="btn btn-sm btn-danger pb-0">
                      <i class="material-icons text-white" style="font-size: 1.1em">person_off</i>
                  </a>
                  <a href="{{route('clientes.edit',$cliente->rut)}}" class="btn btn-sm btn-secondary pb-0">
                    <i class="material-icons text-white" style="font-size: 1.1em">mode_edit</i>
                  </a>
                  <a href="{{route('clientes.show',$cliente->rut)}}" class="btn btn-sm btn-info pb-0">
                    <i class="material-icons text-white" style="font-size: 1.1em">manage_search</i>
                  </a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
    

@endsection
