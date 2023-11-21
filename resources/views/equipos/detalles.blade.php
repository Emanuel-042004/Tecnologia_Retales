<div class="modal fade" id="verEquipoPModal{{$equipo->id}}" tabindex="-1" aria-labelledby="verEquipoPModalLabel{{$equipo->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="verEquipoPModalLabel{{$equipo->id}}"><strong>Detalles del Equipo</strong>
                </h3> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <ul class="list-unstyled">
                    <h4 style="color:rgb(204, 39, 39);"><strong>Datos de Equipo</strong></h4>
                    <li><strong>CODIGO INTERNO:</strong> {{ $equipo->serial }}</li>
                    <li><strong>MARCA:</strong> {{ $equipo->marca }}</li>
                    <li><strong>TIPO DE EQUIPO:</strong> {{ $equipo->tipo_equipo }}</li>
                    <li><strong>TIPO DE DISPOSITIVO:</strong> {{ $equipo->tipo_dispositivo}}</li>

                    <!-- Agrega el resto de los detalles aquí -->

                    <li><strong>MODELO:</strong> {{ $equipo->modelo }} </li>
                    <li><strong>ANYDESK:</strong> {{ $equipo->anydesk }}</li>
                    <li><strong>ENCARGADO:</strong> {{ $equipo->encargado }} </li>
                    <li><strong>UBICACION:</strong> {{ $equipo->ubicacion }}</li>
                    <li><strong>DIRECCION IP:</strong> {{ $equipo->direccionIP }} </li>
                    <br>
                    <br>


                    <h4 style="color:rgb(204, 39, 39);"><strong>Detalles del Equipo</strong></h4>

                    <h4><strong> Memoria Ram</strong></h4>
                    <li><strong>TIPO DE RAM:</strong> {{ $equipo->tipo_ram }} </li>
                    <li><strong>CANTIDAD DE RAM:</strong> {{ $equipo->cantidad_ram }}</li>

                    <br>
                    <br>
                    <h4 style="color:rgb(204, 39, 39);"><strong> Almacenamiento</strong></h4>
                    <li><strong>TIPO DE ALMACENAMIENTO:</strong> {{ $equipo->tipo_alma }}</li>
                    <li><strong>CANTIDAD DE ALMACENAMIENTO:</strong> {{ $equipo->cantidad_alma }}</li>

                    <br>
                    <br>

                    <h4 style="color:rgb(204, 39, 39);"><strong>Arquitectura</strong></h4>
                    <li><strong>TIPO DE SO:</strong> {{ $equipo->tipo_so }}</li>
                    <li><strong>LICENCIA:</strong> {{ $equipo->licencia }}</li>
                    <li><strong>MODO DE BIOS:</strong> {{ $equipo->modo_bios }}</li>
                    <li><strong>VERSION DE PROCESADOR:</strong> {{ $equipo->version_procesador}}</li>
                    <li><strong>MODELO DE PROCESADOR:</strong> {{ $equipo->modelo_procesador }}</li>
                    <li><strong>GENERACION DE PROCESADOR:</strong> {{ $equipo->gen_procesador }}</li>
                    <li><strong>TARJETA GRAFICA</strong> {{ $equipo->tarjeta_grafica }}</li>

                    <br>
                    <br>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
</ul>