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
                            @foreach($arriendosVigentes as $index=>$arriendo)
                            <tr>
                                <td class="small text-center">{{ $index+1 }}</td>
                                <td class="small">{{ $arriendo->rut }}</td>
                                <td class="small">Nombre cliente</td>
                                <td class="small">Telefono cliente</td>
                                
                                <td class="small">{{ $arriendo->patente }}</td>
                                <td class="small">a</td>
                                <td class="small">$Valor</td>
                                <td class="small text-center"><a href="http://localhost:8000/{{$arriendo->imagen_inicio}}" target="_blank" class="btn btn-sm bg-info pb-0">
                                    <i class="material-icons text-white" style="font-size: 1.1em">image</i>
                                </a>
                                </td>

                                <td class="small">{{ $arriendo->fecha_inicio }}</td>
                                <td class="small text-center">
                                    <a href="{{ route('arriendos.edit',$arriendo->id) }}" class="btn btn-sm btn-secondary pb-0">
                                    <i class="material-icons text-white" style="font-size: 1.1em">add</i>
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
                            {{-- @foreach($arriendosFinalizados as $index=>$arriendo) --}}
                            @foreach (range(0,5) as $index) 
                                <tr>
                                    <td class="small text-center">{{ $index+1 }}</td>
                                    <td class="small">12345678-9</td>
                                    <td class="small">Juanito Perez</td>
                                    <td class="small">+56 9 1234 5678</td>
        
                                    <td class="small">AA1122</td>
                                    <td class="small">Autito</td>
                                    <td class="small">$0000</td>
                                    <td class="small text-center"><a href="#" target="_blank" class="btn btn-sm btn-info pb-0">
                                        <i class="material-icons text-white" style="font-size: 1.1em">image</i>
                                    </a>
                                    </td>

                                    <td class="small">dd-mm-yy</td>
                                    <td class="small">dd-mm-yy</td>
                                    <td class="small">hh:mm</td>
                                    <td class="small text-center"><a href="#" target="_blank" class="btn btn-sm btn-info pb-0">
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
