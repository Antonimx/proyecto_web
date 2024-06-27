<div class="row">
    <div class="col-lg-9">
        <div class="row d-flex justify-content-start">
            <div class="col-lg-1 pe-0">
                <a href="{{ route($urlVolver) }}" class="btn btn-outline-dark btn-sm pb-0" data-bs-toggle="tooltip" data-bs-title="Volver">
                    <span class="material-icons">arrow_back</span>
                </a>
            </div>
            <div class="col-lg-11 ps-0">
                <h3 class="text-info m-0">{{$titulo}}</h3>
            </div>
        </div>
        
    </div>
    @if($boton)
    <div class="col-lg-3 d-flex justify-content-end">
        <a class="btn text-white btn-info align-self-center me-2" href="{{route($urlBoton)}}" role="button">{{$textoBoton}}</a>
    </div>
    @endif
</div>
<hr class="bg-info border-info" style="height: 2px;">