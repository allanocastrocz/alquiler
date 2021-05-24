<?php
require_once('conexion.php');
class Consultas
{
    private $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->connect();
    }

    public function __destruct()
    {
        // close the database connection
        $this->pdo = null;
    }

    // FACTURAS ------------------------------------------------------------------------------------------------

    public function GetFactura()
    {
        $sql = "SELECT * FROM faccliente";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetFacturaById($id)
    {
        $sql = "SELECT * FROM faccliente WHERE id = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetch(PDO::FETCH_ASSOC);
    }

    public function DelFacturaById($id)
    {
        $sql = "DELETE FROM faccliente WHERE faccliente.id = ?";
        $declaracion = $this->pdo->prepare($sql);
        return $declaracion->execute([$id]);
    }

    public function InsertFactura(array $datos)
    {
        /* Inserta los valores de direccion en la tabla correspondiente*/
        $sql = "INSERT INTO faccliente (gasto_adi, iva, descuento, costo_total, cli_rfc, cli_dni, tic_fol)
         VALUES (:gasto_adi, :iva, :descuento, :costo_total, :cli_rfc, :cli_dni, :tic_fol);";

        // Vinculación de los valores
        $valores = [
            ':gasto_adi' => $datos['gasto_adi'],
            ':iva' => $datos['iva'],
            ':descuento' => $datos['descuento'],
            ':costo_total' => $datos['costo_total'],
            ':cli_rfc' => $datos['cli_rfc'],
            ':cli_dni' => $datos['cli_dni'],
            ':tic_fol' => $datos['tic_fol']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    public function UpdateFactura(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE faccliente 
        SET gasto_adi = :gasto_adi, iva = :iva, descuento = :descuento, costo_total = :costo_total, 
            cli_rfc = :cli_rfc, cli_dni = :cli_dni, tic_fol = :tic_fol 
        WHERE faccliente.id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':gasto_adi' => $datos['gasto_adi'],
            ':iva' => $datos['iva'],
            ':descuento' => $datos['descuento'],
            ':costo_total' => $datos['costo_total'],
            ':cli_rfc' => $datos['cli_rfc'],
            ':cli_dni' => $datos['cli_dni'],
            ':tic_fol' => $datos['tic_fol'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }
    
    // PROMOCION ------------------------------------------------------------------------------------------------

    public function GetPromocion()
    {
        $sql = "SELECT * FROM promocion";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetPromocionById($id)
    {
        $sql = "SELECT * FROM promocion WHERE id = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetch(PDO::FETCH_ASSOC);
    }

    public function DelPromocionById($id)
    {
        $sql = "DELETE FROM promocion WHERE id = ?";
        $declaracion = $this->pdo->prepare($sql);
        return $declaracion->execute([$id]);
    }

    public function InsertPromocion(array $datos)
    {
        /* Inserta los valores de direccion en la tabla correspondiente*/
        $sql = "INSERT INTO promocion 
         VALUES (:id, :nombre, :tipo, :costo, :inicio, :fin)";

        // Vinculación de los valores
        $valores = [
            ':id' => $datos['id'],
            ':nombre' => $datos['nombre'],
            ':tipo' => $datos['tipo'],
            ':costo' => $datos['costo'],
            ':inicio' => $datos['inicio'],
            ':fin' => $datos['fin']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    public function UpdatePromocion(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE promocion 
        SET nombre = :nombre, tipo = :tipo, costo = :costo, 
        inicio = :inicio, fin = :fin
        WHERE id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':nombre' => $datos['nombre'],
            ':tipo' => $datos['tipo'],
            ':costo' => $datos['costo'],
            ':inicio' => $datos['inicio'],
            ':fin' => $datos['fin'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // TICKETS ------------------------------------------------------------------------------------------------

    public function GetTickets()
    {
        $sql = "SELECT * FROM ticket";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    // CLIENTE ------------------------------------------------------------------------------------------------

    public function GetClientes()
    {
        $sql = "SELECT * FROM cliente";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }




























    // ------------------------------------------------------------------------------------------------

    public function GetUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DatosUsuario($idUser)
    {
        // datos del usuario
        $VIEW = 'view_profile_privado';
        $sql = "SELECT * FROM $VIEW WHERE usid = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$idUser]);
        return $declaracion->fetch();
    }

    public function GetDerechos($idMotivo)
    {
        $sql = "SELECT * FROM derecho WHERE motivo = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$idMotivo]);
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetIndemnizaciones()
    {
        $sql = "SELECT indemnizacion.created_at as fecha,
                        indemnizacion.id as id,
                        CONCAT(usemp.nombre, ' ', usemp.appat) as nom_emp,
                        CONCAT(usadmin.nombre, ' ', usadmin.appat) as nom_admin,
                        motivo.nombre as motivo 
                    FROM indemnizacion
                    JOIN usuario AS usemp ON indemnizacion.empleado = usemp.id 
                    JOIN motivo ON indemnizacion.motivo = motivo.id
                    JOIN usuario AS usadmin ON indemnizacion.administrador = usadmin.id
                    ORDER BY indemnizacion.created_at";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetAdminNames()
    {
        $sql = "SELECT CONCAT(usuario.nombre, ' ', appat) as nom_admin FROM `indemnizacion`
                JOIN usuario ON indemnizacion.administrador = usuario.id
                ORDER BY indemnizacion.created_at";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }
}
