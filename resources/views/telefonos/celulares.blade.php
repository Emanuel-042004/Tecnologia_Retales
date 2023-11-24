@extends('layouts.header')

@section('content')

<div class="row" style="margin-top: 190px;">
  <div class="col-12">
    <div>
      <h1 class="text-black "><strong>Celulares</strong>
        <img width="48" height="48" src="https://img.icons8.com/fluency/48/000000/smartphone.png" alt="smartphone" />
      </h1>
    </div>
    <br>
    <div>
      <a href="#" class="btn btn-dark shadow" data-bs-toggle="modal" data-bs-target="#agregarCelularModal">Agregar
        Celular</a>
    </div>
    @include('telefonos.create')
  </div>
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

  <div class="col-12 mt-4">
  @if ($celulares->isEmpty())
        <h2 class="text-center">No hay registros disponibles.</h2>
        <p class="text-center">(Debes Agregar un Celular para poder gestionarlo)</p>
    @else
    <div class="row">
      @foreach($celulares as $celular)
      <div class="col-md-4 mb-4">
        <div class="card mb-4 shadow h-100 d-flex flex-column">
          <div class="card-header mb-4" style="background-color: rgb(204, 35, 35)">
            <h4 class="card-title"><strong>Cod Interno:</strong> {{$celular->serial}}
              <a href="{{ route ('celulares.historial.index', $celular->id) }}" class="btn btn-danger float-end shadow"
                style="border-radius: 50px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
                                <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z"/>
                                </svg>
              </a>
            </h4>
          </div>

          <div class="card-body">
            <p class="card-text text-black"><strong>Modelo:</strong> {{$celular->modelo}}</p>
            <p class="card-text text-black"><strong>Marca:</strong> {{$celular->marca}}</p>
            <p class="card-text text-black"><strong>IMEI 1:</strong> {{$celular->imei_1}}</p>
            <p class="card-text text-black"><strong>IMEI 2:</strong> {{$celular->imei_2}}</p>
            <p class="card-text text-black"><strong>Sim:</strong> {{$celular->sim}}</p>
            <p class="card-text text-black"><strong>Encargado</strong> {{$celular->encargado}}</p>
            <p class="card-text text-black"><strong>Sitio:</strong> {{$celular->ubicacion}}</p>
            <p class="card-text text-black"><strong>Departamento:</strong> {{$celular->departamento}}</p>


            <!-- BOTON EDITAR -->
            <a href="#" class="btn btn-dark shadow" data-bs-toggle="modal"
              data-bs-target="#editarCelularModal{{ $celular->id }}" style="border-radius: 50px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
              </svg>
            </a>

            @include('telefonos.edit')

            <!--BOTON ELIMINAR -->
            <form action="{{route('celulares.destroy',$celular->id )}}" class="d-inline shadow" method="POST">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-danger eliminar-celular float-end" style="border-radius: 50px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3"
                  viewBox="0 0 16 16">
                  <path
                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                </svg> Eliminar</button>
            </form>

          </div>
        </div>
      </div>
      <script>

        $(document).ready(function () {

          $('.eliminar-celular').on('click', function () {

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
    {{$celulares->links()}}
  </div>
  @endif
</div>
@endsection