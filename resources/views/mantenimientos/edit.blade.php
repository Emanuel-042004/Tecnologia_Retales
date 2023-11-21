@extends('layouts.header')

@section('content')
    <div class="container mt-4">
    <h1 style="color: black;">Editar Mantenimiento de Equipo: {{ $mantenible->serial }}</h1>
    
    <a href="{{ route('mantenimientos.index', ['tipo' => $tipo, 'id' => $mantenible->id]) }}" class="btn btn-dark shadow">Volver</a>
        <!-- Formulario para editar mantenimiento -->
        <form action="{{ route('mantenimientos.update', ['tipo' => $tipo, 'id' => $mantenible->id, 'mantenimientoId' => $mantenimiento->id]) }}" method="POST" class="mb-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $mantenimiento->fecha }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $mantenimiento->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Mantenimiento</button>
        </form>

        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Detalles del Mantenimiento</h2>
                    <p class="card-text"><strong>Fecha:</strong> {{ $mantenimiento->fecha }}</p>
                    <p class="card-text"><strong>Descripción:</strong> {{ $mantenimiento->descripcion }}</p>
                </div>
            </div>
        </div>
      
    </div>
@endsection
