<?php

$datos = $queries->GetRegistros('coche');
$garages = $queries->GetRegistros('garage');
$distribuidores = $queries->GetRegistros('distribuidor');
$seguros = $queries->GetRegistros('seguro');
$mantenimientos = $queries->GetRegistros('mantenimiento');


if ($tipo_user != "CLIENTE") {
    include($module_path . "botones.php");
}
?>
<!-- tabla -->
<div class="row">

    <table id="tabla_select" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ocupantes</th>
                <th>Precio por día</th>
                <th>Observaciones</th>
                <th>Factura</th>
                <th>Garage</th>
                <th>Seguro</th>
                <th>Distribuidor</th>
                <th>Mantenimiento</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de dropdown-->
            <?php foreach ($datos as $dato) { ?>

                <tr>
                    <td><?php echo $dato['matricula']; ?></td>
                    <td><?php echo $dato['modelo']; ?></td>
                    <td><?php echo $dato['marca']; ?></td>
                    <td><?php echo $dato['ocupantes']; ?></td>
                    <td><?php echo '$' . $dato['precioxdia']; ?></td>
                    <td><?php echo $dato['observaciones']; ?></td>
                    <td><?php echo $dato['factura']; ?></td>
                    <td><?php echo $dato['gar_id']; ?></td>
                    <td><?php echo $dato['seg_id']; ?></td>
                    <td><?php echo $dato['dist_id']; ?></td>
                    <td><?php echo $dato['mant_id']; ?></td>
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
                    <input type="text" name="tabla" value="coche" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="9" type="text" class="form-control" required name="matricula" id="inp-matricula">
                        <label for="inputGasto">Matrícula</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="20" type="text" class="form-control" required name="modelo" id="inp-modelo">
                        <label for="inputGasto">Modelo</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input maxlength="15" type="text" class="form-control" required name="marca" id="inp-marca">
                        <label for="inputGasto">Marca</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="11" type="number" class="form-control" required name="ocupantes" id="inp-ocupantes">
                        <label for="inputGasto">Ocupantes</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01" class="form-control" required name="precioxdia" id="inp-precioxdia">
                        <label for="inputImporte">Precio por día</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="40" type="text" class="form-control" required name="observaciones" id="inp-observaciones">
                        <label for="inputGasto">Observaciones</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="20" type="text" class="form-control" required name="factura" id="inp-factura">
                        <label for="inputGasto">Factura</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="number" required name="gar_id" id="inp-gar_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($garages as $garage) { ?>
                                <option value="<?php echo $garage['id']; ?>"><?php echo $garage['id']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputGasto">Garage</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="seg_id" id="inp-seg_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($seguros as $seguro) { ?>
                                <option value="<?php echo $seguro['id']; ?>"><?php echo $seguro['id']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputRFC">Seguro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="dist_id" id="inp-dist_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($distribuidores as $distribuidor) { ?>
                                <option value="<?php echo $distribuidor['id']; ?>"><?php echo $distribuidor['id']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputRFC">Distribuidor</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="mant_id" id="inp-mant_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($mantenimientos as $mantenimiento) { ?>
                                <option value="<?php echo $mantenimiento['id']; ?>"><?php echo $mantenimiento['id']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputRFC">Mantenimiento</label>
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