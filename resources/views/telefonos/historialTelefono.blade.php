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
        title: '¡Actualizada con Éxito!',
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
        $('.eliminar-historial-telefono').on('click', function (event) {
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
    <h1 style="color: black;">Historial de Telefono : {{ $telefono->serial }}</h1>
    <a href="{{ route('telefonos.index') }}" class="btn btn-dark shadow">Volver</a>

    <div class="row" style="margin-top: 40px;">
        <!-- Formulario para Agregar Historial en la parte izquierda -->
        <div class="col-md-6" style="margin-top: 35px;">

            <form action="" method="POST">
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
            <table class="table table-striped table-hover table-dark shadow rounded-table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historialTelefono as $registro)
                    <tr>
                        <td>{{ $registro->fecha }}</td>
                        <td>{{ $registro->descripcion }}</td>
                        <td>

                            <a href="{{ route('telefonos.historial.edit', ['telefono' => $telefono->id, 'historialTelefono' => $registro->id]) }}"
                                class="btn btn-secondary shadow">Editar</a>
                            <form
                                action="{{ route('telefonos.historial.destroy', ['telefono' => $telefono->id, 'historialTelefono' => $registro->id]) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger eliminar-historial-telefono shadow">Eliminar</button>
                            </form>




                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection