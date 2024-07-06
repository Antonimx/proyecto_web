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
                    <input type="text" class="form-control @error('patente') is-invalid @enderror" id="patente" name="patente" value="{{old('patente')}}">
                    @error('patente')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="nombre" class="form-label text-dark">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{old('nombre')}}">
                    @error('nombre')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="marca" class="form-label text-dark">Marca</label>
                    <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="{{old('marca')}}">
                    @error('marca')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="modelo" class="form-label text-dark">Modelo</label>
                    <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{old('modelo')}}">
                    @error('modelo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="tipo_id" class="form-label text-dark">Tipo de vehículo</label>
                        </div>
                        <div class="col-lg-12">
                            <select class="custom-select mr-sm-2 form-control @error('tipo_id') is-invalid @enderror" id="tipo_id" name="tipo_id">
                                <option selected value="0">Seleccione</option>
                                @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                @endforeach
                            </select>
                            @error('tipo_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="mb-3 col-lg-9">
                    <label for="imagen" class="form-label text-dark">Imagen del vehículo</label>
                    <input type="file" id="imagen" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
                    @error('imagen')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <label for="descripcion" class="form-label text-dark">Descripción</label>
                    <textarea rows="5" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" maxlength="300" name="descripcion">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
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
