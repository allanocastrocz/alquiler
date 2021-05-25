<?php

$promos = $queries->GetRegistros('mantenimiento');


if ($tipo_user == "CLIENTE") {
    Header("Location: index.php");
}
include($module_path . "botones.php");
?>
<!-- tabla -->
<div class="row">

    <table id="tabla_select" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Última Fecha</th>
                <th>Próxima Fecha</th>
                <th>Gasto del Combustible</th>
                <th>Refacción</th>
                <th>Costo Total</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de datos -->
            <?php foreach ($promos as $promo) { ?>

                <tr>
                    <td><?php echo $promo['id']; ?></td>
                    <td><?php echo $promo['fecha_ultima']; ?></td>
                    <td><?php echo $promo['fecha_proxima']; ?></td>
                    <td><?php echo '$' . $promo['gasto_combustible']; ?></td>
                    <td><?php echo '$' . $promo['refaccion']; ?></td>
                    <td><?php echo '$' . $promo['costo_total']; ?></td>
                </tr>

            <?php }  ?>
        </tbody>
    </table>

</div>




<!-- Modal -->
<div class="modal fade" id="staticModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Editar / Nuevo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formModal" action="bd/acciones.php" method="post">

                <div class="modal-body">
                    <input type="text" name="accion" id="inputAccion" value="editar" hidden>
                    <input type="text" name="tabla" value="mantenimiento" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="text" class="form-control" required name="id" id="inp-id">
                        <label for="inputGasto">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="fecha_ultima" id="inp-fecha_ultima">
                        <label for="inputGasto">Última Fecha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="fecha_proxima" id="inp-fecha_proxima">
                        <label for="inputGasto">Próxima Fecha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01"  class="form-control" required name="gasto_combustible" id="inp-gasto_combustible">
                        <label for="inputImporte">Gasto del Combustible</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01"  class="form-control" required name="refaccion" id="inp-refaccion">
                        <label for="inputImporte">Refacción</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01"  class="form-control" required name="costo_total" id="inp-costo_total">
                        <label for="inputImporte">Costo Total</label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning btn-sm">Enviar</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php





?>