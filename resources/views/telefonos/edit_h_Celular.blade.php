@extends('layouts.header')

@section('content')
    <br><br><br><br><br>
    <div class="container mt-4">
        <h1 style="color: black;">Editar Historial del Celular: {{ $celular->serial }}</h1>
        <a href="{{ route('celulares.historial.index', $celular->id) }}" class="btn btn-dark shadow">Volver</a> 
        
        <div class="row">
            <!-- Formulario para Editar Historial en la parte izquierda -->
            <div class="col-md-6"  style="margin-top: 70px;">

                <form action="{{route('celulares.historial.update', [ 'celular' => $celular->id, 'historialCelular' => $historialCelular->id])}}" method="POST">
                    @csrf
                    @method('GET')
                    <div class="mb-3 ">
                        <label for="fecha" class="form-label ">Fecha</label>
                        <input type="date" class="form-control shadow" id="fecha" name="fecha" value="{{ $historialCelular->fecha }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control shadow" id="descripcion" name="descripcion" rows="3" required>{{ $historialCelular->descripcion }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary shadow">Guardar Cambios</button>
                </form>
            </div>

            <!-- Detalles del Historial en la parte derecha -->
            <div class="col-md-6">
                <h1>Detalles del Historial</h1>
                <p><strong>Fecha:</strong> {{ $historialCelular->fecha }}</p>
                <p><strong>Descripción:</strong> {{ $historialCelular->descripcion }}</p>
            </div>
        </div>
    </div>
@endsection


   