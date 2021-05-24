
<!-- Inicia la sesión -->
<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <a class=" link-warning text-decoration-none me-auto display-6" href="index.php">RENTA DE VEHÍCULOS</a>

        <?php
        if (isset($_SESSION['usuario'])) {
        ?>

            <a class="fs-5 text-decoration-none" style="color: white;"><?php echo $_SESSION['usuario']['nombre']; ?></a>
            <div class="topbar-divider  d-sm-block"></div>
            <a href="bd\logout.php" class="link-warning text-decoration-none">
                Cerrar sesión
            </a>

        <?php } ?>
    </div>
</nav>