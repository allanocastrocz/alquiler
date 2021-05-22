<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler</title>

    <?php include_once("modules\css-lib.php"); ?>
    <link href="css\sidebars.css" rel="stylesheet">

    <style>
        html, body {
    height: 100%;
}

    </style>

</head>

<body>
    <header>
        <?php include_once("modules/navbar.php");
        if (!isset($_SESSION['usuario']))
            Header("Location: signin.php");
        ?>
    </header>
    <main>
        <div class="container-fluid">
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
                            if (file_exists($path))
                                include($path);
                            else 
                                include("modules/e404.php");

                        } else { ?>
                            <img src="https://easywayrentacar.com/fotos/blogs/foto-1610564892.jpg" alt=""> <?php
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