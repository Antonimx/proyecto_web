@extends('templates.master')

@section('contenido-pagina')


<x-titulo-gestion :urlVolver="'vehiculos.index'" :titulo="'Editar datos de '.$vehiculo->nombre" :boton="false" :urlBoton="'tipos.create'" :textoBoton="'Agregar tipo'"/>

<div class="row">
    <div class="col-lg-12">
        <div class="card border-info">
            <div class="card-header bg-info text-white">
                <b>{{$vehiculo->patente}}</b>
            </div>
           <div class="row g-0">
            <div class="col-md-5">
              <div style="position: relative;">
                  <img src="{{ Storage::url($vehiculo->imagen) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" id="imagenCard">
              </div>
            </div>
            <div class="col-md-7">
                <div class="card-body">
                <form action="{{route('vehiculos.update',$vehiculo->patente)}}" method="post" enctype="multipart/form-data" class="text-dark" id="formArriendo">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="nombre" class="form-label text-dark">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$vehiculo->nombre}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="marca" class="form-label text-dark">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" value="{{$vehiculo->marca}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="modelo" class="form-label text-dark">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" value="{{$vehiculo->modelo}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="imagen" class="form-label text-dark">Cambiar imagen</label>
                            <input type="file" id="imagen" name="imagen" class="form-control">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label for="descripcion" class="form-label text-dark">Descripción</label>
                            <textarea rows="2" class="form-control" id="descripcion" maxlength="250" name="descripcion">{{$vehiculo->descripcion}}</textarea>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end mt-1">
                            <button type="submit" class="text-white btn btn-secondary">Confirmar cambios</button>
                        </div>
                    </div>          
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
