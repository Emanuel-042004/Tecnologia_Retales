@extends('layouts.header')

@section('content')
<div class="container">
<h1 class="mb-5">Resultados de la búsqueda</h1>

    @foreach(['equipos', 'impresoras', 'celulares', 'telefonos'] as $type)
        @if(count($$type) > 0)
        <h3 class="mt-4">{{ ucfirst($type) }}</h3>
        <table class="table table-striped border-dark  mb-5">
                <thead>
                <tr>
                        @if($type == 'equipos')
                            <th scope="col">Cod Interno</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Encargado</th>
                            <th scope="col">Anydesk</th>
                            <th scope="col">Dirección IP</th>
                        @elseif($type == 'impresoras')
                           <th scope="col">Cod Interno</th>
                            <th scope="col">Código</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Tipo de Toner</th>
                            <th scope="col">Ubicacion</th>

                        @elseif($type == 'celulares')
                            <th scope="col">Cod Interno</th>
                            <th scope="col">Encargado</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Ubicacion</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">IMEI 1</th>
                            <th scope="col">IMEI 2</th>
                            <th scope="col">Número de SIM </th>
                            
                        @elseif($type == 'telefonos')
                            <th scope="col">Cod Interno</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Extensión</th>
                            <th scope="col">Ubicacion</th>                            
                            <th scope="col">Departamento</th>
                            <th scope="col">IP</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($$type as $item)
                        <tr>
                            
                            @if($type == 'equipos')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->marca }}</td>
                                <td>{{ $item->modelo }}</td>
                                <td>{{ $item->encargado }}</td>                              
                                <td>{{ $item->anydesk }}</td>
                                <td>{{ $item->direccionIP }}</td>
                            @elseif($type == 'impresoras')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->codigo }}</td>
                                <td>{{ $item->modelo }}</td>
                                <td>{{ $item->proveedor }}</td>
                                <td>{{ $item->tipo }}</td>
                                <td>{{ $item->tipo_toner }}</td>
                                <td>{{ $item->ubicacion }}</td>
                            @elseif($type == 'celulares')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->encargado }}</td>
                                <td>{{ $item->marca }}</td>
                                <td>{{ $item->ubicacion }}</td>
                                <td>{{ $item->departamento }}</td>
                                <td>{{ $item->imei_1 }}</td>
                                <td>{{ $item->imei_2 }}</td>
                                <td>{{ $item->sim }}</td>
                               
                            @elseif($type == 'telefonos')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->marca }}</td>
                                <td>{{ $item->modelo }}</td>
                                <td>{{ $item->extension }}</td>
                                <td>{{ $item->ubicacion }}</td>
                                <td>{{ $item->departamento }}</td>
                                <td>{{ $item->ip }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
    @if($noResults)
    <h2 class="text-center">
    <img width="45" height="45" src="https://img.icons8.com/material-outlined/24/clear-search.png" alt="clear-search"/>
    No se encontraron Resultados de la busqueda.</h2>
    @endif
</div>
@endsection
