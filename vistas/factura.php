<?php

$datos = $queries->GetRegistros('faccliente');
$folios = $queries->GetRegistros('ticket');
$clientes = $queries->GetRegistros('cliente');


if ($tipo_user != "CLIENTE") {
    include($module_path . "botones.php");
} else {
    $datos = $queries->GetRegFactura($_SESSION['usuario']['rfc']);
}

?>
<!-- tabla -->
<div class="row">

    <table id="tabla_select" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Gasto</th>
                <th>Iva</th>
                <th>Descuento</th>
                <th>Importe</th>
                <th>RFC Cliente</th>
                <th>DNI Cliente</th>
                <th>Folio Ticket</th>
            </tr>
        </thead>
        <tbody>

            <!-- llenado de datos -->
            <?php foreach ($datos as $dato) { ?>

                <tr>
                    <td><?php echo $dato['id']; ?></td>
                    <td><?php echo '$' . $dato['gasto_adi']; ?></td>
                    <td><?php echo '$' . $dato['iva']; ?></td>
                    <td><?php echo '$' . $dato['descuento']; ?></td>
                    <td><?php echo '$' . $dato['costo_total']; ?></td>
                    <td><?php echo $dato['cli_rfc']; ?></td>
                    <td><?php echo $dato['cli_dni']; ?></td>
                    <td><?php echo $dato['tic_fol']; ?></td>
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
                    <input type="text" name="tabla" value="faccliente" id="tablaNombre" hidden>
                    <input type="text" name="idReg" id="idReg" hidden>

                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01" class="form-control" required name="gasto_adi" id="inp-gasto_adi">
                        <label for="inputGasto">Gasto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01" class="form-control" required name="iva" id="inp-iva">
                        <label for="inputIva">Iva</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="7" type="number" step=".01" class="form-control" required name="descuento" id="inp-descuento">
                        <label for="inputDescuento">Descuento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input maxlength="8" type="number" step=".01" class="form-control" required name="costo_total" id="inp-costo_total">
                        <label for="inputImporte">Importe</label>
                    </div>
                    <div class="form-floating mb-3">
                        <!-- <input type="text" class="form-control" required name="cli_rfc" id="inp-cli_rfc"> -->
                        <select class="form-select" type="text" required name="cli_rfc" id="inp-cli_rfc">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de datos -->
                            <?php foreach ($clientes as $cliente) { ?>
                                <option value="<?php echo $cliente['rfc']; ?>"><?php echo $cliente['rfc']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputRFC">RFC Cliente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <!-- <input type="text" class="form-control" required name="cli_dni" id="inp-cli_dni"> -->
                        <select class="form-select" type="text" required name="cli_dni" id="inp-cli_dni">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de datos -->
                            <?php foreach ($clientes as $cliente) { ?>
                                <option value="<?php echo $cliente['cli_dni']; ?>"><?php echo $cliente['cli_dni']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputDNI">DNI Cliente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <!-- <input type="number" step=".01"  class="form-control" required name="tic_fol" id="inp-tic_fol"> -->
                        <select class="form-select" type="number" step=".01" required name="tic_fol" id="inp-tic_fol">
                            <option disabled selected>Seleccionar</option>
                            <!-- llenado de datos -->
                            <?php foreach ($folios as $folio) { ?>
                                <option value="<?php echo $folio['folio']; ?>"><?php echo $folio['folio']; ?></option>
                            <?php }  ?>
                        </select>
                        <label for="inputGasto">Folio de Ticket</label>
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