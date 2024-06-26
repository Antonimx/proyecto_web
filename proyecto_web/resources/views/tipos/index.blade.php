@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion urlVolver="vehiculos.index" titulo="Gestión de tipos de vehículos" urlBoton="tipos.create" textoBoton="Agregar tipo de vehículo"/>

<div class="table-responsive">
    <table class="table table-stripped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Valor</th>
                <th>Valor</th>

            </tr>
        </thead>
        <tbody>
            @foreach($tipos as $index=>$tipo)
            <tr>
                <td class="small text-center">{{ $index+1 }}</td>
                <td class="small">{{ $tipo->nombre }}</td>
                <td class="small">${{ $tipo->valor }}</td>
                <td class="text-center">
                    <a href="#" class="btn btn-sm btn-danger pb-0">
                        <i class="material-icons text-white" style="font-size: 1.1em">delete</i>
                    </a>
                    <a href="{{route('tipos.edit',$tipo)}}" class="btn btn-sm btn-info pb-0">
                      <i class="material-icons text-white" style="font-size: 1.1em">mode_edit</i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection