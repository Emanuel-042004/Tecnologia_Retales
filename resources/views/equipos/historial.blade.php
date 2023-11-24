@extends('layouts.header')

@section('content')


@if (Session::has('success'))
<script>
    Swal.fire({
        title: '¡Agregado con Éxito!',
        text: '{{ Session::get('success') }}',
        icon: 'success',
        timer: 2000 // Duración de la alerta en milisegundos (2 segundos en este ejemplo)
    });
</script>
@endif

@if (Session::has('update_success'))
<script>
    Swal.fire({
        title: '¡Actualizado con Éxito!',
        text: '{{ Session::get('update_success') }}',
        icon: 'success',
        timer: 2000 // Duración de la alerta en milisegundos (2 segundos en este ejemplo)
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

<script>
    // Esperar a que el documento esté listo
    $(document).ready(function () {
        // Escuchar el clic en el botón "Eliminar"
        $('.eliminar-historial').on('click', function (event) {
            event.preventDefault(); // Evitar que el enlace siga el href
            var form = $(this).closest('form'); // Obtener la referencia al formulario

            // Mostrar SweetAlert de confirmación
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
                    // Si el usuario confirmó, enviar el formulario de eliminación
                    form.submit();
                }
            });
        });
    });
</script>

<div class="container mt-4">
    <h1><strong>Historial del Equipo: {{ $equipo->serial }}</strong></h1>
    <a href="{{route('equipos.index')}}" class="btn btn-dark shadow">Volver</a>

    <div class="row">
        <!-- Formulario para Agregar Historial en la parte izquierda -->
        <div class="col-md-6" style="margin-top: 35px;">

            <form action="{{ route('historial.store', $equipo->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control shadow" id="fecha" name="fecha" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control shadow" id="descripcion" name="descripcion" rows="3"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-danger shadow">Agregar Historial</button>
            </form>
        </div><br><br>

        <!-- Tabla de Historial en la parte derecha -->
        <div class="col-md-6">
        @if(count($historial) > 0)
            <table class="table table-striped table-hover table-dark shadow rounded-table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historial as $registro)
                    <tr>
                        <td>{{ $registro->fecha }}</td>
                        <td>{{ $registro->descripcion }}</td>
                        <td>
                            <a href="{{ route('historial.edit', ['equipo' => $equipo, 'historial' => $registro]) }}"
                                class="btn btn-secondary shadow">Editar</a>

                            <form
                                action="{{ route('historial.destroy', ['equipo' => $equipo->id, 'historial' => $registro->id]) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger eliminar-historial shadow">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$historial->links()}}
            @else
            <h2 class="text-center">No hay registros disponibles.</h2>
            <p class="text-center">(Debes Agregar un historial para poder gestionarlo)</p>
            @endif
            <div class="fixed-bottom p-3">
                <a href="{{ route('mantenimientos.index', ['tipo' => 'equipos', 'id' => $equipo->id]) }}" class="btn btn-primary btn-lg shadow"  style="border-radius: 50px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                </svg>  Agendar Mantenimiento</a>
            </div>
           
        </div>
    </div>
</div>
@endsection