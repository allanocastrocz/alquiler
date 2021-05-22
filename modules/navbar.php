<style>
    .bg-dark {
        background-color: #595959 !important;
    }

    .topbar-divider {
        width: 0;
        border-right: 1px solid #ffffff;
        height: calc(4.375rem - 2rem);
        margin: auto 1rem;
    }

    .d-sm-block {
        display: block !important;
    }

    .d-none {
        display: none !important;
    }
</style>

<!-- Inicia la sesión -->
<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand me-auto" href="index.php">ALQUILER</a>

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