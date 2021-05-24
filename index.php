<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf8mb4_spanish_ci">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler</title>

    <?php include_once("modules\css-lib.php"); ?>
    <link href="css\sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">

</head>

<body>
    <header>
        <?php include_once("modules/navbar.php");
        if (!isset($_SESSION['usuario']))
            Header("Location: signin.php");
        ?>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-2 d-flex flex-column h-100 shadow">
                    <div class="d-flex flex-column h-100">
                        <div id="outer" class="d-flex flex-column flex-grow-1">
                            <?php include_once("modules\sidebar.php"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="container pt-5">
                        <?php
                        if (!empty($_GET)) {
                            // Concatena directorio con GET
                            $path = "vistas/" . $_GET['pag'];

                            // Verifica que exista el archivo
                            if (file_exists($path)) {
                                include_once("bd\Consultas.php");
                                $queries = new Consultas();
                                $module_path = getcwd() . "/modules/"; // directorio de la carpeta de módulos
                                include($path);
                            } else
                                include("modules/e404.php");
                        } else { ?>
                            <img src="img\mainpic.jpg" alt=""> <?php
                                                            }
                                                                ?>
                    </div>
                </div>
            </div>
    </main>
    </div>


    <?php include_once("modules/js-scripts.php"); ?>
    <script src="javascript\sidebars.js"></script>
    <script src="javascript\tables.js"></script>

</body>

</html>