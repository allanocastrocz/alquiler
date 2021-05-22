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
        <?php
        include_once("modules/navbar.php");
        if (isset($_SESSION['usuario']))
            Header("Location: index.php");
        ?>
    </header>
    <main>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-auto">
                    <h1 class="display-4">Inicio de sesión</h1>
                </div>
            </div>

            <div class="row justify-content-around mt-5">
                <div class="col-4">
                    <div class="text-center texto">
                        <h1 class="ml-3 display-6">Empleado</h1>
                    </div>
                    <!-- Formulario para iniciar sesión -->
                    <form action="bd\login.php" method="post">
                        <!--Correo electrónico/-->
                        <div class="form-group form-label-group my-3">
                            <label for="inputEmail">RFC</label>
                            <input class="form-control" type="text" id="inputRFC" name="userid" placeholder="CXCA923040" style="border-radius: 50px;" required />

                        </div>

                        <!--Contraseña/-->
                        <div class="form-group form-label-group my-3">
                            <label for="inputCont">Contraseña</label>
                            <input class="form-control" type="password" id="inputContEmp" name="clave" placeholder="Contraseña" style="border-radius: 50px;" required />

                        </div>

                        <input type="text" name="tipo" value="empleado" hidden>

                        <!--Botón para iniciar sesión-->
                        <div class="col-sm-12 my-5">
                            <div class="d-grid gap-2">
                                <button class="btn btn-lg btn-info text-white btn-user" style="border-radius: 50px;" id="sesionBtn" type="submit">
                                    Inicia sesión
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Divider -->
                    <hr class="sidebar-divider" />
                    <div class="text-center texto">
                        <a href="signup.php" class="ml-3" style="font-size: medium;">Crear cuenta</a>
                    </div>
                </div>


                <div class="col-4">
                    <div class="text-center texto">
                        <h1 class="ml-3 display-6">Cliente</h1>
                    </div>
                    <!-- Formulario para iniciar sesión -->
                    <form action="bd\login.php" method="post">
                        <!--Correo electrónico/-->
                        <div class="form-group form-label-group my-3">
                            <label for="inputEmail">Correo electrónico</label>
                            <input class="form-control" type="email" id="inputEmail" name="userid" placeholder="ejemplo@email.com" style="border-radius: 50px;" required />

                        </div>

                        <!--Contraseña/-->
                        <div class="form-group form-label-group my-3">
                            <label for="inputCont">Contraseña</label>
                            <input class="form-control" type="password" id="inputCont" name="clave" placeholder="Contraseña" style="border-radius: 50px;" required />

                        </div>

                        <input type="text" name="tipo" value="empleado" hidden>

                        <!--Botón para iniciar sesión-->
                        <div class="col-sm-12 my-5">
                            <div class="d-grid gap-2">
                                <button class="btn btn-lg btn-warning text-white btn-user" style="border-radius: 50px;" id="sesionBtn" type="submit">
                                    Inicia sesión
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Divider -->
                    <hr class="sidebar-divider" />
                    <div class="text-center texto">
                        <a href="signup.php" class="ml-3" style="font-size: medium;">Crear cuenta</a>
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