@extends('templates.master')

@section('contenido-pagina')

<x-titulo-gestion :urlVolver="'vehiculos.index'" :titulo="'Agregar nuevo vehículo.'" :boton="false" :urlBoton="'tipos.create'" :textoBoton="'Agregar tipo'"/>

<div class="row">
    <div class="col-lg-12">
        <form action="{{route('vehiculos.store')}}" method="post" enctype="multipart/form-data" class="border border-info bg-white p-2 rounded text-dark">
            @csrf
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="patente" class="form-label text-dark">Patente</label>
                    <input type="text" class="form-control" id="patente" name="patente">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="nombre" class="form-label text-dark">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="marca" class="form-label text-dark">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="modelo" class="form-label text-dark">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="tipo_id" class="form-label text-dark">Tipo de vehículo</label>
                        </div>
                        <div class="col-lg-12">
                            <select class="custom-select mr-sm-2 form-control" id="tipo_id" name="tipo_id">
                                <option selected value="0">Seleccione</option>
                                @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="mb-3 col-lg-9">
                    <label for="imagen" class="form-label text-dark">Imagen del vehículo</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <label for="descripcion" class="form-label text-dark">Descripción</label>
                    <textarea rows="5" class="form-control" id="descripcion" maxlength="250" name="descripcion"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="text-white btn btn-secondary">Agregar vehículo</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
