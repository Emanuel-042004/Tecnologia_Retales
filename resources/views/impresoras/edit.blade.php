<div class="modal fade" id="editarImpresoraModal{{ $impresora->id }}" tabindex="-1"
    aria-labelledby="editarImpresoraModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editarImpresoraModalLabel">Editar Impresora</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('impresoras.update', $impresora) }}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="serial" class="form-label">Codigo Interno:</label>
                        <input type="text" class="form-control shadow" id="serial" name="serial"
                            value="{{ $impresora->serial }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="proveedor" class="form-label">Proveedor:</label>
                        <input type="text" class="form-control shadow" id="proveedor" name="proveedor"
                            value="{{ $impresora->proveedor }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo:</label>
                        <input type="text" class="form-control shadow" id="modelo" name="modelo"
                            value="{{ $impresora->modelo }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="codigo" class="form-label">Codigo:</label>
                        <input type="text" class="form-control shadow" id="codigo" name="codigo"
                            value="{{ $impresora->codigo }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicacion:</label>
                        <input type="text" class="form-control shadow" id="ubicacion" name="ubicacion"
                            value="{{ $impresora->ubicacion }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_toner" class="form-label">Tipo de Toner:</label>
                        <input type="text" class="form-control shadow" id="tipo_toner" name="tipo_toner"
                            value="{{ $impresora->tipo_toner }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de Equipo</label>
                        <select class="form-select shadow" id="tipo" name="tipo">
                            <option value="Alquilada" @selected( "Alquilada"==$impresora -> tipo)>Alquilada</option>
                            <option value="Propia" @selected( "Propia"==$impresora -> tipo)>Propia</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark" style="margin-top: 35px;">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>