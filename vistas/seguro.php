<?php

$promos = $queries->GetRegistros('seguro');


if ($tipo_user != "CLIENTE") {
    include($module_path . "botones.php");
}
?>
<!-- tabla -->
<div class="row">

    <table id="tabla_select" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Costo</th>
                <th>Vigencia</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de datos -->
            <?php foreach ($promos as $promo) { ?>

                <tr>
                    <td><?php echo $promo['id']; ?></td>
                    <td><?php echo $promo['descripcion']; ?></td>
                    <td><?php echo $promo['tipo']; ?></td>
                    <td><?php echo '$' . $promo['costo']; ?></td>
                    <td><?php echo $promo['vigencia']; ?></td>
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
                    <input type="text" name="tabla" value="seguro" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="text" class="form-control" required name="id" id="inp-id">
                        <label for="inputGasto">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="15" type="text" class="form-control" required name="descripcion" id="inp-descripcion">
                        <label for="inputGasto">Descripción</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="20" type="text" class="form-control" required name="tipo" id="inp-tipo">
                        <label for="inputGasto">Tipo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01"  class="form-control" required name="costo" id="inp-costo">
                        <label for="inputImporte">Costo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="vigencia" id="inp-vigencia">
                        <label for="inputGasto">Vigencia</label>
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