<?php

include_once('Consultas.php');

$jsonRes = [
    'status' => true,
    'msg' => null,
    'data' => null
];

try {
    $consultas = new Consultas();

    if ($_POST['accion'] == 'consultar') {

        switch ($_POST['tabla']) {
            case 'factura':
                $jsonRes['data'] = $consultas->GetFacturaById($_POST['id']);
                break;
            case 'promocion':
                $jsonRes['data'] = $consultas->GetPromocionById($_POST['id']);
                break;
        }
    } else if ($_POST['accion'] == 'nuevo') {

        switch ($_POST['tabla']) {
            case 'factura':
                $jsonRes['status'] = $consultas->InsertFactura($_POST);
                break;
            case 'promocion':
                $jsonRes['status'] = $consultas->InsertPromocion($_POST);
                break;
        }
    } else if ($_POST['accion'] == 'editar') {

        switch ($_POST['tabla']) {
            case 'factura':
                $jsonRes['status'] = $consultas->UpdateFactura($_POST);
                break;
            case 'promocion':
                $jsonRes['status'] = $consultas->UpdatePromocion($_POST);
                break;
        }
    } else if ($_POST['accion'] == 'eliminar') {

        switch ($_POST['tabla']) {
            case 'factura':
                $jsonRes['status'] = $consultas->DelFacturaById($_POST['id']);
                break;
            case 'promocion':
                $jsonRes['status'] = $consultas->DelPromocionById($_POST['id']);
                break;
        }
    }
} catch (PDOException $e) {
    $jsonRes['msg'] = $e->getMessage();
    $jsonRes['status'] = false;
}

echo json_encode($jsonRes);
