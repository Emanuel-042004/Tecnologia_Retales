<div class="modal fade" id="agregarCelularModal" tabindex="-1" aria-labelledby="agregarCelularModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="agregarCelularModalLabel">Agregar Celular</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="{{ route('celulares.store') }}" method="POST">
          @csrf

          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="serial" class="form-label">Codigo Interno:</label>
                <input type="text" class="form-control shadow" id="serial" name="serial" required>
              </div>
              <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" class="form-control shadow" id="marca" name="marca">
              </div>
              <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" class="form-control shadow" id="modelo" name="modelo">
              </div>
              <div class="mb-3">
                <label for="imei_1" class="form-label">IMEI 1:</label>
                <input type="text" class="form-control shadow" id="imei_1" name="imei_1">
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label for="imei_2" class="form-label">IMEI 2:</label>
                <input type="text" class="form-control shadow" id="imei_2" name="imei_2">
              </div>
              <div class="mb-3">
                <label for="sim" class="form-label">Tarjeta Sim:</label>
                <input type="text" class="form-control shadow" id="sim" name="sim">
              </div>
              <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicacion:</label>
                <input type="text" class="form-control shadow" id="ubicacion" name="ubicacion">
              </div>
              <div class="mb-3">
                <label for="departamento" class="form-label">Departamento:</label>
                <input type="text" class="form-control shadow" id="departamento" name="departamento">
              </div>
              <div class="mb-3">
                <label for="encargado" class="form-label">Encargado:</label>
                <input type="text" class="form-control shadow" id="encargado" name="encargado">
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-dark" style="margin-top: 35px;">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>