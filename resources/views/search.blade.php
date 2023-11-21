@extends('layouts.header')

@section('content')
<div class="container">
<h1 class="mb-5">Resultados de la búsqueda</h1>

    @foreach(['equipos', 'impresoras', 'celulares', 'telefonos'] as $type)
        @if(count($$type) > 0)
        <h3 class="mt-4">{{ ucfirst($type) }}</h3>
        <table class="table table-striped mb-5">
                <thead>
                    <tr>
                        <th scope="col">Cod Interno</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Ubicación</th>
                        @if($type == 'equipos')
                            <th scope="col">Cod Interno</th>
                            <th scope="col">Encargado</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Anydesk</th>
                            <th scope="col">Dirección IP</th>
                        @elseif($type == 'impresoras')
                           <th scope="col">Cod Interno</th>
                            <th scope="col">Código</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Tipo</th>
                        @elseif($type == 'celulares')
                            <th scope="col">Cod Interno</th>
                            <th scope="col">Encargado</th>
                            <th scope="col">IMEI 1</th>
                            <th scope="col">Número de SIM </th>
                            <th scope="col">Departamento</th>
                        @elseif($type == 'telefonos')
                            <th scope="col">Cod Interno</th>
                            <th scope="col">Extensión</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">IP</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($$type as $item)
                        <tr>
                            <td>{{ $item->serial }}</td>
                            <td>{{ $item->modelo }}</td>
                            <td>{{ $item->ubicacion }}</td>
                            @if($type == 'equipos')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->encargado }}</td>
                                <td>{{ $item->marca }}</td>
                                <td>{{ $item->anydesk }}</td>
                                <td>{{ $item->direccionIP }}</td>
                            @elseif($type == 'impresoras')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->codigo }}</td>
                                <td>{{ $item->proveedor }}</td>
                                <td>{{ $item->tipo }}</td>
                            @elseif($type == 'celulares')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->encargado }}</td>
                                <td>{{ $item->imei_1 }}</td>
                                <td>{{ $item->sim }}</td>
                                <td>{{ $item->departamento }}</td>
                            @elseif($type == 'telefonos')
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->extension }}</td>
                                <td>{{ $item->marca }}</td>
                                <td>{{ $item->departamento }}</td>
                                <td>{{ $item->ip }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</div>
@endsection
