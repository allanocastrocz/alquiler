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

    // Funciones publicas con queries mysql

    // Retorna registros completos de la tabla
    public function GetRegistros($nombre_tabla)
    {
        $sql = "SELECT * FROM $nombre_tabla";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    // Retorna registros por su id en la tabla
    public function GetRegistroById($id, $nombre_tabla)
    {
        $sql = "SELECT * FROM $nombre_tabla WHERE id = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetch(PDO::FETCH_ASSOC);
    }

    // Retorna registros por su id en la tabla
    // especificando el atributo id
    public function GetRegistroWithId($id, $id_nombre, $nombre_tabla)
    {
        $sql = "SELECT * FROM $nombre_tabla WHERE $id_nombre = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetch(PDO::FETCH_ASSOC);
    }

    // Elimina registros por su id en la tabla
    public function DelRegistroById($id, $nombre_tabla)
    {
        $sql = "DELETE FROM $nombre_tabla WHERE id = ?";
        $declaracion = $this->pdo->prepare($sql);
        return $declaracion->execute([$id]);
    }

    // Elimina registros por su id en la tabla
    // especificando el atributo id
    public function DelRegistroWithId($id, $id_nombre, $nombre_tabla)
    {
        $sql = "DELETE FROM $nombre_tabla WHERE $id_nombre = ?";
        $declaracion = $this->pdo->prepare($sql);
        return $declaracion->execute([$id]);
    }


    // CLIENTE ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertCliente(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO cliente 
                VALUES (:rfc, :cli_dni, :nombre, :apaterno, :amaterno,
                    :email, :clave)";

        // Vinculación de los valores
        $valores = [
            ':rfc' => $datos['rfc'],
            ':cli_dni' => $datos['cli_dni'],
            ':nombre' => $datos['nombre'],
            ':apaterno' => $datos['apaterno'],
            ':amaterno' => $datos['amaterno'],
            ':email' => $datos['email'],
            ':clave' => password_hash($datos['clave'], PASSWORD_DEFAULT)
        ];

        /* Inserta los valores  en la tabla correspondiente*/
        $sql2 = "INSERT INTO cliente2 
                VALUES (:cli_rfc, :cli_dni, :direccion, :telefono)";

        // Vinculación de los valores
        $valores2 = [
            ':cli_rfc' => $datos['rfc'],
            ':cli_dni' => $datos['cli_dni'],
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        // True si inserta correctamente cliente
        if ($declaracion->execute($valores)) {
            // Libera el cursor
            $declaracion->closeCursor();
            // perara la segunda declaración
            $declaracion = $this->pdo->prepare($sql2);
            // True si inserta correctamente cliente2
            if ($declaracion->execute($valores2))
                return true;
        }
        return false;
    }

    // Actualiza un registro de la tabla
    public function UpdateCliente(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE cliente 
                        SET cli_dni = :cli_dni, nombre = :nombre,
                        apaterno = :apaterno, amaterno = :amaterno, email = :email
                        WHERE rfc = :idReg";

        // Vinculación de los valores
        $valores = [
            ':cli_dni' => $datos['cli_dni'],
            ':nombre' => $datos['nombre'],
            ':apaterno' => $datos['apaterno'],
            ':amaterno' => $datos['amaterno'],
            ':email' => $datos['email'],
            ':idReg' => $datos['idReg']
        ];

        // Script para actualizar el registro
        $sql2 = "UPDATE cliente2
                        SET direccion = :direccion, telefono = :telefono
                        WHERE cli_rfc = :idReg";

        // Vinculación de los valores
        $valores2 = [
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        // True si inserta correctamente cliente
        if ($declaracion->execute($valores)) {
            // Libera el cursor
            $declaracion->closeCursor();
            // perara la segunda declaración
            $declaracion = $this->pdo->prepare($sql2);
            // True si inserta correctamente cliente2
            if ($declaracion->execute($valores2))
                return true;
        }
        return false;
    }

    public function GetClientes()
    {
        $sql = "SELECT rfc, cliente.cli_dni, nombre, apaterno, amaterno, email, direccion, telefono 
        FROM cliente JOIN cliente2 ON cliente.rfc = cliente2.cli_rfc";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute();
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetClienteById($id, $nombre_tabla)
    {
        $sql = "SELECT rfc, cliente.cli_dni, nombre, apaterno, amaterno, email, direccion, telefono 
                FROM cliente JOIN cliente2 ON cliente.rfc = cliente2.cli_rfc
                WHERE rfc = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetch(PDO::FETCH_ASSOC);
    }

    public function DelClienteById($id)
    {
        $sql = "DELETE FROM cliente2 WHERE cli_rfc = ?";
        $sql2 = "DELETE FROM cliente WHERE rfc = ?";

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        // True si inserta correctamente cliente
        if ($declaracion->execute([$id])) {
            // Libera el cursor
            $declaracion->closeCursor();
            // perara la segunda declaración
            $declaracion = $this->pdo->prepare($sql2);
            // True si inserta correctamente cliente2
            if ($declaracion->execute([$id]))
                return true;
        }
        return false;
    }


    // FACTURA ------------------------------------------------------------------------------------------------


    // Inserta un registro con todos los atributos de la tabla
    public function InsertFactura(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
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

    // Actualiza un registro de la tabla
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

    public function GetRegFactura($id)
    {
        $sql = "SELECT * FROM faccliente WHERE cli_rfc = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    // PROMOCION ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertPromocion(array $datos)
    {
        /* Inserta los datos en la tabla*/
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

    // Actualiza un registro de la tabla
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

    // SEGURO ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertSeguro(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO seguro 
             VALUES (:id, :descripcion, :tipo, :costo, :vigencia)";

        // Vinculación de los valores
        $valores = [
            ':id' => $datos['id'],
            ':descripcion' => $datos['descripcion'],
            ':tipo' => $datos['tipo'],
            ':costo' => $datos['costo'],
            ':vigencia' => $datos['vigencia']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateSeguro(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE seguro 
            SET descripcion = :descripcion, tipo = :tipo, costo = :costo, 
            vigencia = :vigencia
            WHERE id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':descripcion' => $datos['descripcion'],
            ':tipo' => $datos['tipo'],
            ':costo' => $datos['costo'],
            ':vigencia' => $datos['vigencia'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // MANTENIMIENTO ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertMantenimiento(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO mantenimiento 
                     VALUES (:id, :fecha_ultima, :fecha_proxima, :gasto_combustible, :refaccion, :costo_total)";

        // Vinculación de los valores
        $valores = [
            ':id' => $datos['id'],
            ':fecha_ultima' => $datos['fecha_ultima'],
            ':fecha_proxima' => $datos['fecha_proxima'],
            ':gasto_combustible' => $datos['gasto_combustible'],
            ':refaccion' => $datos['refaccion'],
            ':costo_total' => $datos['costo_total']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateMantenimiento(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE mantenimiento 
                    SET fecha_ultima = :fecha_ultima, fecha_proxima = :fecha_proxima, gasto_combustible = :gasto_combustible, 
                    refaccion = :refaccion, costo_total = :costo_total
                    WHERE id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':fecha_ultima' => $datos['fecha_ultima'],
            ':fecha_proxima' => $datos['fecha_proxima'],
            ':gasto_combustible' => $datos['gasto_combustible'],
            ':refaccion' => $datos['refaccion'],
            ':costo_total' => $datos['costo_total'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // LOCAL ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertLocal(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO local 
                     VALUES (:id, :nombre, :direccion, :telefono, :email)";

        // Vinculación de los valores
        $valores = [
            ':id' => $datos['id'],
            ':nombre' => $datos['nombre'],
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono'],
            ':email' => $datos['email']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateLocal(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE local 
                    SET nombre = :nombre, direccion = :direccion, telefono = :telefono, 
                    email = :email
                    WHERE id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':nombre' => $datos['nombre'],
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono'],
            ':email' => $datos['email'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // GARAGE ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertGarage(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO garage 
                     VALUES (:id, :direccion, :telefono, :email , :capacidad, :total_coches)";

        // Vinculación de los valores
        $valores = [
            ':id' => $datos['id'],
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono'],
            ':email' => $datos['email'],
            ':capacidad' => $datos['capacidad'],
            ':total_coches' => $datos['total_coches']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateGarage(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE garage 
                    SET direccion = :direccion, telefono = :telefono, email = :email,
                    capacidad = :capacidad, total_coches = :total_coches
                    WHERE id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono'],
            ':email' => $datos['email'],
            ':capacidad' => $datos['capacidad'],
            ':total_coches' => $datos['total_coches'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // DISTRIBUIDOR ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertDistribuidor(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO distribuidor 
                     VALUES (:id, :nombre, :direccion, :ciudad, :telefono, :email)";

        // Vinculación de los valores
        $valores = [
            ':id' => $datos['id'],
            ':nombre' => $datos['nombre'],
            ':direccion' => $datos['direccion'],
            ':ciudad' => $datos['ciudad'],
            ':telefono' => $datos['telefono'],
            ':email' => $datos['email']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateDistribuidor(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE distribuidor 
                    SET direccion = :direccion, telefono = :telefono, email = :email,
                    nombre = :nombre, ciudad = :ciudad
                    WHERE id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono'],
            ':email' => $datos['email'],
            ':nombre' => $datos['nombre'],
            ':ciudad' => $datos['ciudad'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // ALQUILER ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertAlquiler(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO alquiler 
                     VALUES (:id, :fecha_salida, :fecha_entrada, :tic_fol, :matricula)";

        // Vinculación de los valores
        $valores = [
            ':id' => $datos['id'],
            ':fecha_salida' => $datos['fecha_salida'],
            ':fecha_entrada' => $datos['fecha_entrada'],
            ':tic_fol' => $datos['tic_fol'],
            ':matricula' => $datos['matricula']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateAlquiler(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE alquiler 
                    SET fecha_salida = :fecha_salida, fecha_entrada = :fecha_entrada,
                    tic_fol = :tic_fol, matricula = :matricula
                    WHERE id = :idReg";

        // Vinculación de los valores
        $valores = [
            ':fecha_salida' => $datos['fecha_salida'],
            ':fecha_entrada' => $datos['fecha_entrada'],
            ':tic_fol' => $datos['tic_fol'],
            ':matricula' => $datos['matricula'],
            ':idReg' => $datos['idReg']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Retorna registros por su id en la tabla
    public function GetRegAlquiler($id)
    {
        $sql = "SELECT * FROM alquiler 
                JOIN faccliente ON alquiler.tic_fol = faccliente.tic_fol
                WHERE faccliente.cli_rfc = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }

    // COCHE ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertCoche(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO coche 
                     VALUES (:matricula, :modelo, :marca, :ocupantes, :precioxdia,
                     :observaciones, :factura, :gar_id, :seg_id, :dist_id, :mant_id)";

        // Vinculación de los valores
        $valores = [
            ':matricula' => $datos['matricula'],
            ':modelo' => $datos['modelo'],
            ':marca' => $datos['marca'],
            ':ocupantes' => $datos['ocupantes'],
            ':precioxdia' => $datos['precioxdia'],
            ':observaciones' => $datos['observaciones'],
            ':factura' => $datos['factura'],
            ':gar_id' => $datos['gar_id'],
            ':seg_id' => $datos['seg_id'],
            ':dist_id' => $datos['dist_id'],
            ':mant_id' => $datos['mant_id']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateCoche(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE coche 
                    SET modelo = :modelo, marca = :marca, ocupantes = :ocupantes, 
                    precioxdia = :precioxdia, observaciones = :observaciones, 
                    factura = :factura, gar_id = :gar_id, seg_id = :seg_id,
                    dist_id = :dist_id, mant_id = :mant_id
                    WHERE matricula = :idReg";

        // Vinculación de los valores
        $valores = [
            ':modelo' => $datos['modelo'],
            ':marca' => $datos['marca'],
            ':ocupantes' => $datos['ocupantes'],
            ':precioxdia' => $datos['precioxdia'],
            ':observaciones' => $datos['observaciones'],
            ':factura' => $datos['factura'],
            ':gar_id' => $datos['gar_id'],
            ':seg_id' => $datos['seg_id'],
            ':dist_id' => $datos['dist_id'],
            ':mant_id' => $datos['mant_id'],
            ':idReg' => $datos['idReg']

        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // EMPLEADO ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertEmpleado(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO empleado 
                     VALUES (:rfc, :nombre, :apaterno, :amaterno, :puesto,
                     :telefono, :loc_id, :gar_id, :jefe_id, :clave)";

        // Vinculación de los valores
        $valores = [
            ':rfc' => $datos['rfc'],
            ':nombre' => $datos['nombre'],
            ':apaterno' => $datos['apaterno'],
            ':amaterno' => $datos['amaterno'],
            ':puesto' => $datos['puesto'],
            ':telefono' => $datos['telefono'],
            ':loc_id' => $datos['loc_id'],
            ':gar_id' => $datos['gar_id'],
            ':jefe_id' => $datos['jefe_id'],
            ':clave' => $datos['clave']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateEmpleado(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE empleado 
                    SET nombre = :nombre, apaterno = :apaterno, amaterno = :amaterno, 
                    puesto = :puesto, telefono = :telefono, 
                    loc_id = :loc_id, gar_id = :gar_id, jefe_id = :jefe_id
                    WHERE rfc = :idReg";

        // Vinculación de los valores
        $valores = [
            ':nombre' => $datos['nombre'],
            ':apaterno' => $datos['apaterno'],
            ':amaterno' => $datos['amaterno'],
            ':puesto' => $datos['puesto'],
            ':telefono' => $datos['telefono'],
            ':loc_id' => $datos['loc_id'],
            ':gar_id' => $datos['gar_id'],
            ':jefe_id' => $datos['jefe_id'],
            ':idReg' => $datos['idReg']

        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // TICKETS ------------------------------------------------------------------------------------------------

    // Inserta un registro con todos los atributos de la tabla
    public function InsertTicket(array $datos)
    {
        /* Inserta los valores  en la tabla correspondiente*/
        $sql = "INSERT INTO ticket 
                 VALUES (:folio, :fecha, :cantidad, :prom_id)";

        // Vinculación de los valores
        $valores = [
            ':folio' => $datos['folio'],
            ':fecha' => $datos['fecha'],
            ':cantidad' => $datos['cantidad'],
            ':prom_id' => $datos['prom_id']
        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Actualiza un registro de la tabla
    public function UpdateTicket(array $datos)
    {
        // Script para actualizar el registro
        $sql = "UPDATE ticket 
                SET fecha = :fecha, cantidad = :cantidad, prom_id = :prom_id
                WHERE folio = :idReg";

        // Vinculación de los valores
        $valores = [
            ':fecha' => $datos['fecha'],
            ':cantidad' => $datos['cantidad'],
            ':prom_id' => $datos['prom_id'],
            ':idReg' => $datos['idReg']

        ];

        // Declaraciones preparadas
        $declaracion = $this->pdo->prepare($sql);

        return $declaracion->execute($valores);
    }

    // Retorna registros por su id en la tabla
    public function GetRegTicket($id)
    {
        $sql = "SELECT * FROM ticket 
                JOIN faccliente ON ticket.folio = faccliente.tic_fol 
                WHERE faccliente.cli_rfc = ?";
        $declaracion = $this->pdo->prepare($sql);
        $declaracion->execute([$id]);
        return $declaracion->fetchAll(PDO::FETCH_ASSOC);
    }
}
