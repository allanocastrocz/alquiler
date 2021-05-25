<?php

$promos = $queries->GetRegistros('garage');


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
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Capacidad</th>
                <th>Total Coches</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de datos -->
            <?php foreach ($promos as $promo) { ?>

                <tr>
                    <td><?php echo $promo['id']; ?></td>
                    <td><?php echo $promo['direccion']; ?></td>
                    <td><?php echo $promo['telefono']; ?></td>
                    <td><?php echo $promo['email']; ?></td>
                    <td><?php echo $promo['capacidad']; ?></td>
                    <td><?php echo $promo['total_coches']; ?></td>
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
                    <input type="text" name="tabla" value="garage" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="text" class="form-control" required name="id" id="inp-id">
                        <label for="inputGasto">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="40" type="text" class="form-control" required name="direccion" id="inp-direccion">
                        <label for="inputGasto">Dirección</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="10" type="number" class="form-control" required name="telefono" id="inp-telefono">
                        <label for="inputGasto">Teléfono</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="30" type="email" class="form-control" required name="email" id="inp-email">
                        <label for="inputGasto">Correo Electrónico</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="11 " type="number" class="form-control" required name="capacidad" id="inp-capacidad">
                        <label for="inputGasto">Capacidad</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="11" type="number" class="form-control" required name="total_coches" id="inp-total_coches">
                        <label for="inputGasto">Total Coches</label>
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