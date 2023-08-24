@extends('layout/plantilla')
@section('tituloPagina','Actualizar persona')

@section('contenido')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Actualizar Persona</h5>
    <p class="card-text">
      <form action="{{ route('persona.update', $persona->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Utiliza el método PUT para actualizar -->
        
        <label for="paterno">Apellido Paterno</label>
        <input type="text" name="paterno" class="form-control" value="{{ $persona->paterno }}" required>
        
        <label for="materno">Apellido Materno</label>
        <input type="text" name="materno" class="form-control" value="{{ $persona->materno }}" required>
        
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $persona->nombre }}" required>
        
        <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
        <input type="date" name="fecha_de_nacimiento" class="form-control" value="{{ $persona->fecha_de_nacimiento }}" required>
        
        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('persona.index') }}" class="btn btn-info">Regresar</a>
      </form>
    </p>
  </div>
</div>
@endsection
