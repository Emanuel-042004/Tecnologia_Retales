@extends('layouts.header')

@section('content')


<div class="row" style="margin-top: 190px;">
    <div class="col-12">
        <div>
            <h1 class="text-black ">Equipos <img width="50" height="50"
                    src="https://img.icons8.com/3d-fluency/94/workstation.png" alt="workstation" /></h1>
            <form action="{{ route('equipos.index') }}" method="GET">
                <div class="form-group float-end">
                    <!--FILTRO -->
                    <select class="form-control" name="filtro" id="filtro">
                        <option value="todos" {{ Request::get('filtro')==='todos' ? 'selected' : '' }}>Todos</option>
                        <option value="propios" {{ Request::get('filtro')==='propios' ? 'selected' : '' }}>Propios
                        </option>
                        <option value="alquilados" {{ Request::get('filtro')==='alquilados' ? 'selected' : '' }}>
                            Alquilados</option>
                    </select>
                    <button type="submit" class="btn btn-light float-end">Filtrar</button>
                </div>
            </form>
        </div>
        <br>
        <div>
            <a href="{{route('equipos.create')}}" class="btn btn-dark shadow">Agregar equipo</a>
        </div>
    </div>

    <!--ALERTAS-->
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
            icon: 'success',
            timer: 2000
        });
    </script>
    @endif


     <!--REGISTROS -->
    <div class="col-12 mt-4">
        <div class="row">
            @foreach($equipos as $equipo)
            <div class="col-md-4">
                <div class="card mb-4 shadow">
                    <div class="card-header mb-4" style="background-color: rgb(204, 35, 35)">
                        <h4 class="card-title "><strong>Serial:</strong>
                            {{$equipo->serial}}

                            <a href="{{ route('historial.index', $equipo->id) }}"
                                class="btn btn-danger float-end shadow" style="border-radius: 50px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-clock-history " viewBox="0 0 16 16">
                                    <path
                                        d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                    <path
                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </a>
                        </h4>

                    </div>

                    <div class="card-body">

                        <p class="card-text text-black"><strong>Encargado:</strong> {{$equipo->encargado}}</p>
                        <p class="card-text text-black"><strong>Ubicacion:</strong> {{$equipo->ubicacion}}</p>

                        <p class="card-text text-black"><strong>Tipo de Equipo:</strong> {{$equipo->tipo_equipo}}
                        <p class="card-text text-black"><strong>Tipo de Dispositivo:</strong>
                            {{$equipo->tipo_dispositivo}}</p>



                        <!--BOTON EDITAR -->
                        <a href="{{route('equipos.edit', $equipo)}}" class="btn btn-dark shadow"
                            style="border-radius: 50px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a>

                        <!--BOTON ELIMINAR -->
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" class="d-inline shadow"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger eliminar-equipo" style="border-radius: 50px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg> Eliminar</button>
                        </form>


                        <!--BOTON VER DETALLES-->
                        <a href="#" class="btn btn-light float-end" data-bs-toggle="modal" style="border-radius: 50px;"
                            data-bs-target="#verEquipoPModal{{ $equipo->id }}">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg>
                            @include('detalles', ['equipo' => $equipo])
                        </a>


                    </div>
                </div>
            </div>

            <script>

                $(document).ready(function () {

                    $('.eliminar-equipo').on('click', function () {

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

                                $(this).closest('form').submit();
                            }
                        });
                    });
                });
            </script>

            @endforeach
        </div>
        {{$equipos->links()}}
    </div>
</div>
@endsection