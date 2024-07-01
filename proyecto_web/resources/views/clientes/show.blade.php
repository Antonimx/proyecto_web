@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion :urlVolver="'clientes.index'" :titulo="'Historial de arriendos de ' . $cliente->nombre . ' (' . $cliente->rut . ')'" :boton="false" :urlBoton="'clientes.create'" :textoBoton="'Agregar nuevo cliente'"/>

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
                                <th>Nº</th>
                                <th>Patente</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th colspan="2">Fecha y hora de inicio</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arriendosVigentes as $i => $arriendo)
                            <tr>
                                <td class="small text-center">{{ $i+1 }}</td>
                                <td class="small">{{ $arriendo->patente }}</td>
                                <td class="small">{{ $arriendo->vehiculo->nombre }}</td>
                                <td class="small">$ {{ number_format($arriendo->vehiculo->tipo->valor, 0, ',', '.') }}</td>
                                <td class="small">{{ $arriendo->fecha_inicio }}</td>
                                <td class="small">{{ $arriendo->hora_inicio->format('H:i') }}</td>
                                <td class="small text-center"><a href="http://localhost:8000/{{$arriendo->imagen_inicio}}" target="_blank" class="btn btn-sm bg-info pb-0">
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
                                <th>Nº</th>   
                                <th>Patente</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Imagen</th>
                                <th colspan="2">Fecha y hora de inicio</th>
                                <th class="text-center" colspan="3">Datos de entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arriendosFinalizados as $i=>$arriendo)
                                <tr>
                                    <td class="small text-center">{{ $i+1 }}</td>
                                    <td class="small">{{ $arriendo->patente }}</td>
                                    <td class="small">{{ $arriendo->vehiculo->nombre }}</td>
                                    <td class="small">$ {{ number_format($arriendo->vehiculo->tipo->valor, 0, ',', '.') }}</td>
                                    <td class="small text-center"><a href="#" target="_blank" class="btn btn-sm btn-info pb-0">
                                        <i class="material-icons text-white" style="font-size: 1.1em">image</i>
                                    </a>
                                    </td>

                                    <td class="small">{{ $arriendo->fecha_inicio }}</td>
                                    <td class="small">{{ $arriendo->hora_inicio->format('H:i') }}</td>
                                    <td class="small">{{ $arriendo->fecha_entrega }}</td>
                                    <td class="small">{{ $arriendo->hora_entrega->format('H:i') }}</td>
                                    <td class="small text-center"><a href="http://localhost:8000/{{$arriendo->imagen_entrega}}" target="_blank" class="btn btn-sm btn-info pb-0">
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