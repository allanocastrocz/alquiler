<?php
if (isset($_POST['clave'])) {
    include_once('conexion.php');

    // datos entrantes
    $userid = $_POST['userid'];
    $password = $_POST['clave'];
    $tipo = $_POST['tipo'];

    // Consulta dependiendo el usuario
    if ($tipo == "cliente") {
        $query = "SELECT * FROM cliente WHERE email = ?";
    } else if ($tipo == 'empleado') {
        $query = "SELECT * FROM empleado WHERE rfc = ?";
    }
    /* Ejecuta una sentencia preparada pasando un array de valores */
    $stmt = $pdo->prepare($query);
    $stmt->execute([$userid]);

    // objecto de respuesta (JSON)
    // $respuesta = ['datos_correctos' => false];
    // usuario encontrado
    if ($stmt->rowCount() > 0) {
        // Datos del usuario en arreglo asociativo
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // verifica contraseña 
        if (password_verify($password, $user['clave'])) {
            // inicia sesión
            session_start();
            // propiedades de la sesión del usuario
            $_SESSION['usuario']['rfc'] = $user['rfc'];
            $_SESSION['usuario']['nombre'] = $user['nombre'] . ' ' . $user['apaterno'];
            $_SESSION['usuario']['correo'] = $user['email'];
            if ($tipo == 'empleado') {
                $_SESSION['usuario']['puesto'] = $user['puesto'];
            }
            // respuesta al cliente
            // $respuesta['datos_correctos'] = true;
            Header("Location: ../index.php");
        } 
    }
    Header("Location: ../signin.php");
    // cierra la conexión 
    $pdo = null;
    // imprime respuesta en formato JSON
    echo json_encode($respuesta);
}
