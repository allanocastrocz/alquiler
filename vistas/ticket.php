<?php

$datos = $queries->GetRegistros('ticket');
$promos = $queries->GetRegistros('promocion');


if ($tipo_user != "CLIENTE") {
    include($module_path . "botones.php");
} else {
    $datos = $queries->GetRegTicket($_SESSION['usuario']['rfc']);
}
?>
<!-- tabla -->
<div class="row">

    <table id="tabla_select" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>ID Promoción</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de datos -->
            <?php foreach ($datos as $dato) { ?>

                <tr>
                    <td><?php echo $dato['folio']; ?></td>
                    <td><?php echo $dato['fecha']; ?></td>
                    <td><?php echo $dato['cantidad']; ?></td>
                    <td><?php echo $dato['prom_id']; ?></td>
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
                    <input type="text" name="tabla" value="ticket" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="text" class="form-control" required name="folio" id="inp-folio">
                        <label for="inputGasto">Folio</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="fecha" id="inp-fecha">
                        <label for="inputGasto">Fecha</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" class="form-control" required name="cantidad" id="inp-cantidad">
                        <label for="inputImporte">Cantidad</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="prom_id" id="inp-prom_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($promos as $promo) { ?>
                                <option value="<?php echo $promo['id']; ?>"><?php echo $promo['id']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputGasto">ID Promoción</label>
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