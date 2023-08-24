@extends('layout/plantilla')
@section('tituloPagina','Crear un nuevo registro')

@section('contenido')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Agregar nueva Persona</h5>
    <p class="card-text">
      <form action="{{ route('persona.store') }}"  method="POST">
        @csrf
        @method('POST')
        <label for="">Apellido Paterno</label>
        <input type="text" name="paterno" class="form-control" required>
        <label for="">Apellido Materno</label>
        <input type="text" name="materno" class="form-control" required>
        <label for="">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
        <label for="">Fecha de nacimiento</label>
        <input type="date" name="fecha_de_nacimiento" class="form-control" required>
        <br>
        <button  type="submit" class="btn btn-primary" >Agregar</button>
        <a href="{{ route('persona.index') }}" class="btn btn-info"> Regresar</a>
      </form>
    </p>
  </div>
</div>
@endsection