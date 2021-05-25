<?php

include_once('Consultas.php');

// Respuesta en formato JSON
$jsonRes = [
    'status' => true,
    'msg' => null,
    'data' => null
];

try {

    // Instancia la clase de QUERIES/CONSULTAS
    $consultas = new Consultas();

    if ($_POST['accion'] == 'consultar') {

        switch ($_POST['tabla']) {
            case 'cliente':
                $jsonRes['data'] = $consultas->GetClienteById($_POST['id'], $_POST['tabla']);
                break;
            case 'coche':
                $jsonRes['data'] = $consultas->GetRegistroWithId($_POST['id'], 'matricula', $_POST['tabla']);
                break;

            default:
                $jsonRes['data'] = $consultas->GetRegistroById($_POST['id'], $_POST['tabla']);
                break;
        }
    } else if ($_POST['accion'] == 'nuevo') {

        switch ($_POST['tabla']) {
            case 'faccliente':
                $jsonRes['status'] = $consultas->InsertFactura($_POST);
                break;
            case 'promocion':
                $jsonRes['status'] = $consultas->InsertPromocion($_POST);
                break;
            case 'seguro':
                $jsonRes['status'] = $consultas->InsertSeguro($_POST);
                break;
            case 'mantenimiento':
                $jsonRes['status'] = $consultas->InsertMantenimiento($_POST);
                break;
            case 'local':
                $jsonRes['status'] = $consultas->InsertLocal($_POST);
                break;
            case 'garage':
                $jsonRes['status'] = $consultas->InsertGarage($_POST);
                break;
            case 'distribuidor':
                $jsonRes['status'] = $consultas->InsertDistribuidor($_POST);
                break;
            case 'cliente':
                $jsonRes['status'] = $consultas->InsertCliente($_POST);
                break;
            case 'alquiler':
                $jsonRes['status'] = $consultas->InsertAlquiler($_POST);
                break;
            case 'coche':
                $jsonRes['status'] = $consultas->InsertCoche($_POST);
                break;
        }
    } else if ($_POST['accion'] == 'editar') {

        switch ($_POST['tabla']) {
            case 'faccliente':
                $jsonRes['status'] = $consultas->UpdateFactura($_POST);
                break;
            case 'promocion':
                $jsonRes['status'] = $consultas->UpdatePromocion($_POST);
                break;
            case 'seguro':
                $jsonRes['status'] = $consultas->UpdateSeguro($_POST);
                break;
            case 'mantenimiento':
                $jsonRes['status'] = $consultas->UpdateMantenimiento($_POST);
                break;
            case 'local':
                $jsonRes['status'] = $consultas->UpdateLocal($_POST);
                break;
            case 'garage':
                $jsonRes['status'] = $consultas->UpdateGarage($_POST);
                break;
            case 'distribuidor':
                $jsonRes['status'] = $consultas->UpdateDistribuidor($_POST);
                break;
            case 'cliente':
                $jsonRes['status'] = $consultas->UpdateCliente($_POST);
                break;
            case 'alquiler':
                $jsonRes['status'] = $consultas->UpdateAlquiler($_POST);
                break;
            case 'coche':
                $jsonRes['status'] = $consultas->UpdateCoche($_POST);
                break;
        }
    } else if ($_POST['accion'] == 'eliminar') {

        switch ($_POST['tabla']) {
            case 'cliente':
                $jsonRes['status'] = $consultas->DelRegistroWithId($_POST['id'], 'rfc', $_POST['tabla']);
                break;
            case 'coche':
                $jsonRes['status'] = $consultas->DelRegistroWithId($_POST['id'], 'matricula', $_POST['tabla']);
                break;

            default:
                $jsonRes['status'] = $consultas->DelRegistroById($_POST['id'], $_POST['tabla']);
                break;
        }
    }
} catch (PDOException $e) {

    // Captura errores del objeto PDO
    // Guarda errores en objeto de salida
    $jsonRes['msg'] = $e->getMessage();
    $jsonRes['status'] = false;
}

// convierte el objeto a cadena e imprime
echo json_encode($jsonRes); // cadena de retorno al cliente
