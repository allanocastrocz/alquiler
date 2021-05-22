<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler</title>

    <?php include_once("modules\css-lib.php"); ?>
    <link href="css\sidebars.css" rel="stylesheet">

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
                <div class="col-md-3 col-lg-2 shadow">
                    <?php include_once("modules\sidebar.php"); ?>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="container pt-5">
                        <?php include("vistas/factura.php"); ?>
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