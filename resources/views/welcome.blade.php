@extends('layout/Plantilla')
@section('tituloPagina','jhoncabrera')


@section('contenido')


<div class="card">
  <div class="card-header">
    Crud con laravel 8 y MySql
  </div>
  <div class="card-body">
    <h5 class="card-title">Listado de personas en el sistema</h5>
    <p>
        <a href="{{ route('persona.create') }}" class="btn btn-primary"> Agregar nueva persona </a>
    </p>
    <hr>
    <p class="card-text"> 
        <div class="table table-responsive" >
            <table class="table table-sm table-bordered" >
                <thead>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno </th>
                    <th>Nombre</th>
                    <th>Fecha de nacimiento</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                </thead>
                @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->paterno }}</td>
                        <td>{{ $item->materno }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->fecha_de_nacimiento }}</td>
                        <td>
                            <form method="POST" action="{{ route('persona.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('persona.edit', $item->id) }}" class="btn btn-primary">Actualizar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </p>
  </div>
</div>
@endsection