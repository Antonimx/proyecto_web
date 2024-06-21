@extends('templates.master')

@section('contenido-pagina')
<div class="row">
    <!-- usuario -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Usuario</h5>
                  <p class="card-text">Gestione los usuarios</p>
                  <a href="#" class="btn btn-primary">Ingresar a usuario</a>
                </div>
              </div>
        </div>
    </div>
    <!-- cliente -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Cliente</h5>
                  <p class="card-text">Gestione a sus clientes</p>
                  <a href="#" class="btn btn-primary">Ingresar a cliente</a>
                </div>
              </div>
        </div>
    </div>
    <!-- arriendo -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Arriendo</h5>
                  <p class="card-text">Gestione sus arriendos</p>
                  <a href="{{route('arriendos.index')}}" class="btn btn-primary">Arrendar</a>
                </div>
              </div>
        </div>
    </div>
    <!-- vehiculo -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Vehiculos</h5>
                  <p class="card-text">Gestione sus vehiculos</p>
                  <a href="#" class="btn btn-primary">Ingresar a vehiculos</a>
                </div>
              </div>
        </div>
    </div>
    <!-- config -->
    {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/cards_portada/configuracion.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Configuración</h5>
                    <div class="btn-group d-flex">
                        <a class="btn btn-outline-success" href="#">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
