<!-- Modal -->
<?php include '../components/eliminar_detalle.php' ?>

<div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 id="titulo" class="mb-0"></h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <div class="modal-body card">
                <div class="d-flex justify-content-between mb-2 mx-2 h6 text-success">
                    <label id="cliente"></label>
                    <label id="fecha"></label>
                </div>
                <div class="form-group row align-items-center mx-2">
                    <label class="mb-0">Agregar producto</label>
                    <input type="hidden" id="producto" name="producto">
                    <div class="dropdown d-flex ml-4 col">
                        <button class="col btn btn-outline-primary dropdown-toggle py-2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" id="labelProducto">Seleccione... </button>
                        <div class="dropdown-menu w-100" aria-labelledby="categoria" id="dropdownProducto">
                            <?php $array = $productoDao->listar();
                            foreach ($array as $key => $value) { ?>
                                <option class="dropdown-item text-center btn py-2" value="<?php echo $value->codigo ?>">
                                    <?php echo $value->nombre ?>
                                </option>
                            <?php } ?>
                        </div>
                    </div>
                    <button id="agregar" class="btn btn-inverse-primary btn-rounded btn-icon">
                        <i class="fa-solid fa-plus m-0"></i>
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover w-100 pt-5 pt-md-1">
                        <thead class="thead-dark">
                            <tr class="text-uppercase">
                                <th style="width: 50px;">imagen</th>
                                <th>nombre</th>
                                <th style="width: 80px;">precio</th>
                                <th class="text-center" style="width: 120px;">cantidad</th>
                                <th style="width: 90px;">monto</th>
                                <th style="width: 70px;">eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="detalle"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer d-flex flex-column justify-content-center">
                <label id="total" class="text-success h5 mb-2"></label>
                <button id="guardar" class="btn btn-inverse-primary btn-rounded px-4 py-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fa-solid fa-floppy-disk my-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>