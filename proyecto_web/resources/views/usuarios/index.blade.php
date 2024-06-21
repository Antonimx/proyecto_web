@extends('templates.master')

@section('contenido-pagina')

<div class="row">
    <div class="col-9 text-body-secondary text-left">
        <h3>Gestionar usuarios</h3>
    </div>
    <a class="col-2 btn btn-primary" href="{{route('usuarios.create')}}" role="button">Crear nuevo usuario</a>
</div>


<hr>

<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
</div>
    

@endsection