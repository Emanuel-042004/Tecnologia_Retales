@extends('layouts.header')

@section('content')

<div class="row" style="margin-top: 190px;"> 
        <div class="col-12"> 
                <div>
                    <h1 class="text-black ">Impresoras 🖨️</h1>
                    <form action="{{ route('impresoras.index') }}" method="GET">
                        <div class="form-group float-end">
                            <!--FILTRO -->
                            <select class="form-control" name="filtro" id="filtro">
                                <option value="todas" {{ Request::get('filtro') === 'todas' ? 'selected' : '' }}>Todos</option>
                                <option value="propias" {{ Request::get('filtro') === 'propias' ? 'selected' : '' }}>Propios</option>
                                <option value="alquiladas" {{ Request::get('filtro') === 'alquiladas' ? 'selected' : '' }}>Alquilados</option>
                            </select>
                            <button type="submit" class="btn btn-light float-end">Filtrar</button>
                        </div>
                    </form>
                </div>
                <br>
                <div>
                <a href="#" class="btn btn-dark shadow" data-bs-toggle="modal" data-bs-target="#agregarImpresoraModal">Agregar Impresora</a>
                </div>
                @include('impresoras.create')
    </div> 

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: '¡Agregada con Éxito!',
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
                icon: 'success',
                timer: 2000 // Duración de la alerta en milisegundos (2 segundos en este ejemplo)
            });
        </script>
        @endif

    <div class="col-12 mt-4">
        <div class="row">
            @foreach($impresoras as $impresora)
                <div class="col-md-4 mb-4">
                    <div class="card mb-4 shadow h-100 d-flex flex-column">
                        <div class="card-header mb-4" style="background-color: rgb(204, 35, 35)">
                            <h4 class="card-title"><strong>Serial:</strong> {{$impresora->serial}}</h4>
                        </div>

                        <div class="card-body">
                            <p class="card-text text-black"><strong>Modelo:</strong> {{$impresora->modelo}}</p>
                            <p class="card-text text-black"><strong>Codigo:</strong> {{$impresora->codigo}}</p>
                            <p class="card-text text-black"><strong>Tipo de Impresora:</strong> {{$impresora->tipo}}</p>
                            <p class="card-text text-black"><strong>Ubicacion:</strong> {{$impresora->ubicacion}}</p>
                            <p class="card-text text-black"><strong>Tipo de Toner:</strong> {{$impresora->tipo_toner}}</p>
                            <p class="card-text text-black"><strong>Proveedor:</strong> {{$impresora->proveedor}}</p>

                            <!-- BOTON EDITAR -->
                            <a href="" class="btn btn-dark shadow" data-bs-toggle="modal" data-bs-target="#editarImpresoraModal" style="border-radius: 50px;"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            @include('impresoras.edit')
                            

                                    <!--BOTON ELIMINAR -->
                        <form action="{{ route('impresoras.destroy', $impresora->id) }}" class="d-inline shadow" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger eliminar-impresora float-end" style="border-radius: 50px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg> Eliminar</button>
                        </form>


                        </div>
                    </div>
                </div>
                <script>
    // Esperar a que el documento esté listo
    $(document).ready(function () {
        // Escuchar el clic en el botón "Eliminar"
        $('.eliminar-impresora').on('click', function () {
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
                    $(this).closest('form').submit();
                }
            });
        });
    });
</script>
            @endforeach
        </div>
    </div>
</div>
@endsection

