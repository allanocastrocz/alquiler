<?php
$tipo_user = "";
if (!isset($_SESSION['usuario']['puesto']))
    $tipo_user = "CLIENTE";
else
    $tipo_user = $_SESSION['usuario']['puesto'];
?>
<div class="row flex-grow-1">
    <div class="flex-shrink-0 p-3 bg-white" style="width: 100%; ">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-3" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
            <span class="fs-5 fw-semibold"><?php echo $tipo_user; ?></span>
        </a>
        <?php if ($tipo_user == "CLIENTE") { ?>

            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="?pag=factura.php" class="link-dark rounded">Factura</a></li>
                <li><a href="?pag=promocion.php" class="link-dark rounded">Promoción</a></li>
                <li><a href="?pag=ticket.php" class="link-dark rounded">Ticket</a></li>
                <li><a href="?pag=alquiler.php" class="link-dark rounded">Alquiler</a></li>
                <li><a href="?pag=coche.php" class="link-dark rounded">Coche</a></li>
            </ul>

        <?php } else { ?>

            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="?pag=alquiler.php" class="link-dark rounded">Alquiler</a></li>
                <li><a href="?pag=cliente.php" class="link-dark rounded">Cliente</a></li>
                <li><a href="?pag=coche.php" class="link-dark rounded">Coche</a></li>
                <li><a href="?pag=distribuidor.php" class="link-dark rounded">Distribuidor</a></li>
                <li><a href="?pag=empleado.php" class="link-dark rounded">Empleado</a></li>
                <li><a href="?pag=factura.php" class="link-dark rounded">Factura</a></li>
                <li><a href="?pag=garage.php" class="link-dark rounded">Garage</a></li>
                <li><a href="?pag=local.php" class="link-dark rounded">Local</a></li>
                <li><a href="?pag=mantenimiento.php" class="link-dark rounded">Mantenimiento</a></li>
                <li><a href="?pag=promocion.php" class="link-dark rounded">Promoción</a></li>
                <li><a href="?pag=seguro.php" class="link-dark rounded">Seguro</a></li>
                <li><a href="?pag=ticket.php" class="link-dark rounded">Ticket</a></li>
            </ul>

        <?php } ?>
        
    </div>
</div>