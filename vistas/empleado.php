<?php

$datos = $queries->GetRegistros('empleado');
$locales = $queries->GetRegistros('local');
$garages = $queries->GetRegistros('garage');


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
                <th>RFC</th>
                <th>Nombre</th>
                <th>Apellido Materno</th>
                <th>Apellido Paterno</th>
                <th>Puesto</th>
                <th>Teléfono</th>
                <th>Local</th>
                <th>Garage</th>
                <th>Jefe</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de datos -->
            <?php foreach ($datos as $dato) { ?>

                <tr>
                    <td><?php echo $dato['rfc']; ?></td>
                    <td><?php echo $dato['nombre']; ?></td>
                    <td><?php echo $dato['apaterno']; ?></td>
                    <td><?php echo $dato['amaterno']; ?></td>
                    <td><?php echo $dato['puesto']; ?></td>
                    <td><?php echo $dato['telefono']; ?></td>
                    <td><?php echo $dato['loc_id']; ?></td>
                    <td><?php echo $dato['gar_id']; ?></td>
                    <td><?php echo $dato['jefe_id']; ?></td>
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
                    <input type="text" name="tabla" value="empleado" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="13" type="text" class="form-control" required name="rfc" id="inp-rfc">
                        <label for="inputGasto">RFC</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input maxlength="20" type="text" class="form-control" required name="nombre" id="inp-nombre">
                        <label for="inputGasto">Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="15" type="text" class="form-control" required name="apaterno" id="inp-apaterno">
                        <label for="inputGasto">Apellido Materno</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="15" type="text" class="form-control" required name="amaterno" id="inp-amaterno">
                        <label for="inputGasto">Apellido Paterno</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="20" type="text" class="form-control" required name="puesto" id="inp-puesto">
                        <label for="inputGasto">Puesto</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="10" type="number" class="form-control" required name="telefono" id="inp-telefono">
                        <label for="inputGasto">Teléfono</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input maxlength="20" type="password" class="form-control" required name="clave" id="inp-clave">
                        <label for="inputGasto">Contraseña</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="loc_id" id="inp-loc_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($locales as $local) { ?>
                                <option value="<?php echo $local['id']; ?>"><?php echo $local['id']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputGasto">Local</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="gar_id" id="inp-gar_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($garages as $garage) { ?>
                                <option value="<?php echo $garage['id']; ?>"><?php echo $garage['id']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputGasto">Garage</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" type="text" required name="jefe_id" id="inp-jefe_id">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de dropdown-->
                            <?php foreach ($datos as $dato) { ?>
                                <option value="<?php echo $dato['rfc']; ?>"><?php echo $dato['rfc']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputRFC">Jefe</label>
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