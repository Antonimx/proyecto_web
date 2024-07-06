@extends('templates.master')

@section('contenido-pagina')


<x-titulo-gestion :urlVolver="'vehiculos.index'" :titulo="'Editar datos de '.$vehiculo->nombre" :boton="false" :urlBoton="'tipos.create'" :textoBoton="'Agregar tipo'"/>
{{-- <h1>{{$vehiculo->estado}}</h1> --}}
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
                <form action="{{route('vehiculos.update',$vehiculo->patente)}}" method="post" enctype="multipart/form-data" class="text-dark">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="nombre" class="form-label text-dark">Nombre</label>
                            <input type="text" class="form-control @error('nombreUpdate') is-invalid @enderror" id="nombre" name="nombreUpdate" value="{{$vehiculo->nombre}}">
                            @error('nombreUpdate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="marca" class="form-label text-dark">Marca</label>
                            <input type="text" class="form-control @error('marcaUpdate') is-invalid @enderror" id="marca" name="marcaUpdate" value="{{$vehiculo->marca}}">
                            @error('marcaUpdate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="modelo" class="form-label text-dark">Modelo</label>
                            <input type="text" class="form-control @error('modeloUpdate') is-invalid @enderror" id="modelo" name="modeloUpdate" value="{{$vehiculo->modelo}}">
                            @error('modeloUpdate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="imagen" class="form-label text-dark">Cambiar imagen</label>
                            <input type="file" id="imagen" name="imagenUpdate" class="form-control @error('imagenUpdate') is-invalid @enderror">
                            @error('imagenUpdate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label for="descripcion" class="form-label text-dark">Descripción</label>
                            <textarea rows="2" class="form-control @error('descripcionUpdate') is-invalid @enderror" id="descripcion" maxlength="300" name="descripcionUpdate">{{$vehiculo->descripcion}}</textarea>
                            @error('descripcionUpdate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
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
