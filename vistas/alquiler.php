<?php

$datos = $queries->GetRegistros('alquiler');
$folios = $queries->GetRegistros('ticket');
$coches = $queries->GetRegistros('coche');


if ($tipo_user != "CLIENTE") {
    include($module_path . "botones.php");
} else {
    $datos = $queries->GetRegAlquiler($_SESSION['usuario']['rfc']);
}
?>
<!-- tabla -->
<div class="row">

    <table id="tabla_select" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha Salida</th>
                <th>Fecha Entrada</th>
                <th>Folio Ticket</th>
                <th>Matrícula</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de datos -->
            <?php foreach ($datos as $dato) { ?>

                <tr>
                    <td><?php echo $dato['id']; ?></td>
                    <td><?php echo $dato['fecha_salida']; ?></td>
                    <td><?php echo $dato['fecha_entrada']; ?></td>
                    <td><?php echo $dato['tic_fol']; ?></td>
                    <td><?php echo $dato['matricula']; ?></td>
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
                    <input type="text" name="tabla" value="alquiler" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="text" class="form-control" required name="id" id="inp-id">
                        <label for="inputGasto">ID</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="fecha_entrada" id="inp-fecha_entrada">
                        <label for="inputGasto">Fecha Entrada</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" required name="fecha_salida" id="inp-fecha_salida">
                        <label for="inputGasto">Fecha Salida</label>
                    </div>

                    <div class="form-floating mb-3">
                        <!-- <input type="number" step=".01"  class="form-control" required name="tic_fol" id="inp-tic_fol"> -->
                        <select class="form-select" type="number" required name="tic_fol" id="inp-tic_fol">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de datos -->
                            <?php foreach ($folios as $folio) { ?>
                                <option value="<?php echo $folio['folio']; ?>"><?php echo $folio['folio']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputGasto">Folio de Ticket</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="matricula" id="inp-matricula">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de datos -->
                            <?php foreach ($coches as $coche) { ?>
                                <option value="<?php echo $coche['matricula']; ?>"><?php echo $coche['matricula']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputRFC">Matrícula</label>
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