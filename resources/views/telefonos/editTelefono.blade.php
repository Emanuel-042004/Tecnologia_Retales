<div class="modal fade" id="editarTelefonoModal{{ $telefono->id }}" tabindex="-1"
  aria-labelledby="editarTelefonoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="editarTelefonoModalLabel">Editar Celular</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">



        <form action="{{ route('telefonos.update', $telefono) }}" method="POST">
          @method('PUT')
          @csrf

          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="serial" class="form-label">Codigo Interno:</label>
                <input type="text" class="form-control shadow" id="serial" name="serial" value="{{ $telefono->serial }}"
                  required>
              </div>
              <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" class="form-control shadow" id="marca" name="marca" value="{{ $telefono->marca }}">
              </div>
              <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" class="form-control shadow" id="modelo" name="modelo"
                  value="{{ $telefono->modelo }}">
              </div>

              <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicacion:</label>
                <input type="text" class="form-control shadow" id="ubicacion" name="ubicacion"
                  value="{{ $telefono->ubicacion }}">
              </div>
              <div class="mb-3">
                <label for="departamento" class="form-label">Departamento:</label>
                <input type="text" class="form-control shadow" id="departamento" name="departamento"
                  value="{{ $telefono->departamento }}">
              </div>
              <div class="mb-3">
                <label for="ip" class="form-label">IP:</label>
                <input type="text" class="form-control shadow" id="ip" name="ip" value="{{ $telefono->ip }}">
              </div>
              <div class="mb-3">
                <label for="extension" class="form-label">Extension:</label>
                <input type="text" class="form-control shadow" id="extension" name="extension"
                  value="{{ $telefono->extension }}">
              </div>
            </div>
          </div>


          <button type="submit" class="btn btn-dark" style="margin-top: 35px;">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>