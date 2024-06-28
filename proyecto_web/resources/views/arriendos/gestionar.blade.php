@extends('templates.master')

@section('contenido-pagina')
<x-titulo-gestion :urlVolver="'arriendos.index'" :titulo="'Gestionar arriendos'" :boton="false" :urlBoton="'clientes.create'" :textoBoton="'Agregar nuevo cliente'"/>

<div class="row">
    {{-- TABLA DE ARRIENDOS VIGENTES --}}
    <div class="col-12 mb-3">
        <div class="card border-info">
            <div class="card-header bg-info text-white" style="font-weight: bold;">
                <h5 class="m-0">Arriendos vigentes</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 300px;"">
                    <table class="table table-stripped table-bordered table-hover">
                        <thead class="table-dark text-white">
                            <tr>
                                <tr>
                                    <th class="text-center" colspan="4">Cliente</th>
                                    <th class="text-center" colspan="4">Vehículo</th>
                                    <th class="text-center" colspan="2">Arriendo</th>
                                </tr>
                                <th>Nº</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Número de contacto</th>
                                
                                <th>Patente</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Imagen</th>
                                
                                <th>Fecha de inicio</th>
                                <th>Agregar entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arriendosVigentes as $i => $arriendo)
                            <tr>
                                <td class="small text-center">{{ $i+1 }}</td>
                                <td class="small">{{ $arriendo->rut }}</td>
                                <td class="small">{{ $arriendo->cliente->nombre }}</td>
                                <td class="small">{{ $arriendo->cliente->fono }}</td>
                                
                                <td class="small">{{ $arriendo->patente }}</td>
                                <td class="small">{{ $arriendo->vehiculo->nombre }}</td>
                                <td class="small">$ {{ number_format($arriendo->vehiculo->tipo->valor, 0, ',', '.') }}</td>
                                <td class="small text-center"><a href="{{Storage::url($arriendo->imagen_inicio)}}" target="_blank" class="btn btn-sm bg-info pb-0">
                                    <i class="material-icons text-white" style="font-size: 1.1em">image</i>
                                </a>
                                </td>

                                <td class="small">{{ $arriendo->fecha_inicio }}</td>
                                <td class="small text-center">
                                    <button type="button" class="btn btn-sm btn-secondary pb-0" data-bs-toggle="modal" data-bs-target="#entregaModal{{$arriendo->id}}">
                                        <i class="material-icons text-white" style="font-size: 1.1em">add</i>
                                    </button>
                                </td>
                            </tr>
                            {{-- MODAL --}}
                            <div class="modal fade" id="entregaModal{{$arriendo->id}}" tabindex="-1" aria-labelledby="entregaModalLabel{{$arriendo->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="entregaModalLabel{{$arriendo->id}}">Agregar entrega para {{$arriendo->vehiculo->nombre}} | {{$arriendo->patente}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('arriendos.update', $arriendo->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="fecha" class="form-label text-dark">Fecha de entrega</label>
                                                <input type="date" id="fecha" name="fecha_entrega" min="{{ $arriendo->fecha_inicio }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="hora" class="form-label text-dark">Hora de entrega</label>
                                                <input type="time" id="hora" name="hora_entrega" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="imagen" class="form-label text-dark">Imagen de entrega</label>
                                                <input type="file" id="imagen" name="imagen_entrega" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="text-white btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="text-white btn btn-secondary">Agregar entrega</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            {{-- /MODAL --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- /TABLA DE ARRIENDOS VIGENTES --}}


    
    {{-- TABLA DE ARRIENDOS FINALIZADOS --}}    
    <div class="col-12">
        <div class="card border-info">
            <div class="card-header bg-info text-white" style="font-weight: bold;">
              <h5 class="m-0">Arriendos finalizados</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 300px;"">
                    <table class="table table-stripped table-bordered table-hover">
                        <thead class="table-dark text-white">
                            <tr>
                                <tr>
                                    <th class="text-center" colspan="4">Cliente</th>
                                    <th class="text-center" colspan="4">Vehículo</th>
                                    <th class="text-center" colspan="4">Arriendo</th>
                                </tr>
                                <th>Nº</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Número de contacto</th>
    
                                <th>Patente</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Imagen</th>

                                <th>Inicio</th>
                                <th class="text-center" colspan="3">Datos de entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arriendosFinalizados as $i=>$arriendo)
                                <tr>
                                    <td class="small text-center">{{ $i+1 }}</td>
                                    <td class="small">{{ $arriendo->rut }}</td>
                                    <td class="small">{{ $arriendo->cliente->nombre }}</td>
                                    <td class="small">{{ $arriendo->cliente->fono  }}</td>
        
                                    <td class="small">{{ $arriendo->patente }}</td>
                                    <td class="small">{{ $arriendo->vehiculo->nombre }}</td>
                                    <td class="small">$ {{ number_format($arriendo->vehiculo->tipo->valor, 0, ',', '.') }}</td>
                                    <td class="small text-center"><a href="{{Storage::url($arriendo->imagen_inicio)}}" target="_blank" class="btn btn-sm btn-info pb-0">
                                        <i class="material-icons text-white" style="font-size: 1.1em">image</i>
                                    </a>
                                    </td>

                                    <td class="small">{{ $arriendo->fecha_inicio }}</td>
                                    <td class="small">{{ $arriendo->fecha_entrega }}</td>
                                    <td class="small">{{ $arriendo->hora_entrega }}</td>
                                    <td class="small text-center"><a href="{{Storage::url($arriendo->imagen_entrega)}}" target="_blank" class="btn btn-sm btn-info pb-0">
                                        <i class="material-icons text-white" style="font-size: 1.1em">image</i>
                                    </a>
                                    </td>
                                </tr> 
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- /TABLA DE ARRIENDOS FINALIZADOS --}}
</div>

@endsection
