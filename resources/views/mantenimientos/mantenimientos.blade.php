@extends('layouts.header')
@section('content')

@if (Session::has('success'))
<script>
    Swal.fire({
        title: '¡Agregado con Éxito!',
        text: '{{ Session::get('success') }}',
        icon: 'success',
        timer: 2000 
    });
</script>
@endif

@if (Session::has('update_success'))
<script>
    Swal.fire({
        title: '¡Actualizado con Éxito!',
        text: '{{ Session::get('update_success') }}',
        icon: 'success',
        timer: 2000 
    });
</script>
@endif

@if (Session::has('delete_success'))
<script>
    Swal.fire({
        title: '¡Eliminado con Éxito!',
        text: '{{ Session::get('delete_success') }}',
        position: "top-end",
        icon: "success",
        showConfirmButton: false,
        timer: 2500
    });
</script>
@endif

@php
    $tipoObjeto = '';
    switch ($tipo) {
        case 'equipos':
            $tipoObjeto = 'del Equipo';
            break;
        case 'impresoras':
            $tipoObjeto = 'de la Impresora';
            break;
        case 'celulares':
            $tipoObjeto = 'del Celular';
            break;
        case 'telefonos':
            $tipoObjeto = 'del Telefono';
            break;
    }
@endphp


<div class="container mt-4">
    
   <h1 style="color: black;"><strong>Mantenimientos {{ $tipoObjeto }}: {{ $mantenible->serial }}</strong></h1>
    <a href="{{ route($tipo . '.index') }}" class="btn btn-dark shadow mb-4">Volver</a>


    <form action="{{ route('mantenimientos.store', ['tipo' => $tipo, 'id' => $mantenible->id]) }}" method="POST"
        class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Mantenimiento</button>
    </form>
    
    @if(count($mantenimientos) > 0)
    <table class="table bordered border-dark">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mantenimientos as $mantenimiento)
            <tr>
                <td>{{ $mantenimiento->fecha }}</td>
                <td>{{ $mantenimiento->descripcion }}</td>
                <td>
                    <a href="{{ route('mantenimientos.edit', ['tipo' => $tipo, 'id' => $mantenible->id, 'mantenimientoId' => $mantenimiento->id]) }}"
                        class="btn btn-warning">Editar</a>

                    <form
                        action="{{ route('mantenimientos.destroy', ['tipo' => $tipo, 'id' => $id, 'mantenimientoId' => $mantenimiento->id]) }}"
                        method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger eliminar-mantenimiento">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $mantenimientos->links() }}
    @else
            <h2 class="text-center">No hay registros disponibles.</h2>
            <p class="text-center">(Debes Agregar un Mantenimiento para poder gestionarlo)</p>
            @endif
    <script>
        $(document).ready(function () {
            $('.eliminar-mantenimiento').on('click', function (event) {
                event.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede deshacer',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</div>
@endsection