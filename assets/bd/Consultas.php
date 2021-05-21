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

    public function GetUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DatosUsuario($idUser)
    {
        // datos del usuario
        $VIEW = 'view_profile_privado';
        $query = "SELECT * FROM $VIEW WHERE usid = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$idUser]);
        return $stmt->fetch();
    }

    public function GetDerechos($idMotivo)
    {
        $query = "SELECT * FROM derecho WHERE motivo = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$idMotivo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetIndemnizaciones()
    {
        $query = "SELECT indemnizacion.created_at as fecha,
                        indemnizacion.id as id,
                        CONCAT(usemp.nombre, ' ', usemp.appat) as nom_emp,
                        CONCAT(usadmin.nombre, ' ', usadmin.appat) as nom_admin,
                        motivo.nombre as motivo 
                    FROM indemnizacion
                    JOIN usuario AS usemp ON indemnizacion.empleado = usemp.id 
                    JOIN motivo ON indemnizacion.motivo = motivo.id
                    JOIN usuario AS usadmin ON indemnizacion.administrador = usadmin.id
                    ORDER BY indemnizacion.created_at";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetAdminNames()
    {
        $query = "SELECT CONCAT(usuario.nombre, ' ', appat) as nom_admin FROM `indemnizacion`
                JOIN usuario ON indemnizacion.administrador = usuario.id
                ORDER BY indemnizacion.created_at";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
