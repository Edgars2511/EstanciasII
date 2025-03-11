<?php

class EntrenadorModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getEntrenadorByUsername($usuario)
    {
        $query = 'SELECT *
        FROM entrenadores
        WHERE usuario = :usuario';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['usuario' => $usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getActividadesById($id)
    {
        $query = 'SELECT a.id /*, a.actividad AS nombre_actividad*/
        FROM entrenadores AS ent
        JOIN entrenadores_actividad AS ea ON ent.id = ea.id_entrenador
        JOIN actividades AS a ON ea.id_actividad = a.id
        WHERE ent.id = :id;';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }
    public function getNombreActividadesById($id)
    {
        $query = 'SELECT a.actividad AS actividad
        FROM entrenadores AS ent
        JOIN entrenadores_actividad AS ea ON ent.id = ea.id_entrenador
        JOIN actividades AS a ON ea.id_actividad = a.id
        WHERE ent.id = :id
        ORDER BY a.id;';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllActividadesById($id)
    {
        $query = 'SELECT a.id AS id, a.actividad AS actividad
        FROM entrenadores AS ent
        JOIN entrenadores_actividad AS ea ON ent.id = ea.id_entrenador
        JOIN actividades AS a ON ea.id_actividad = a.id
        WHERE ent.id = :id
        ORDER BY a.id;';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEntrenadorByActividad($id){
        $query = 'SELECT en.*
        FROM entrenadores AS en
        JOIN entrenadores_actividad AS enAc ON en.id = enAc.id_entrenador
        WHERE enAc.id_actividad = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEntrenadorById($id){
        $query = "SELECT e.*
        FROM entrenadores AS e
        WHERE e.id = $id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getContraseñaEntrenadorById($id){
        $query = "SELECT contraseña
        FROM entrenadores 
        WHERE id = $id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_NUM);
    }

    public function getImagenEntrenadorById($id){
        $query = "SELECT imagen
        FROM entrenadores 
        WHERE id = $id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_NUM);
    } 

    public function actualizarImagenByEntrenadorId($id, $ruta) {
        try {

            $consulta = "UPDATE entrenadores SET imagen='$ruta' WHERE id=$id";
            
            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateUltimoAccesoById($id) {
        try {

            $consulta = "UPDATE entrenadores SET ultimo_acceso=CURRENT_TIMESTAMP WHERE id=$id";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarContraseña($id, $contraseña) {
        try {

            $consulta = "UPDATE entrenadores SET contraseña='$contraseña' WHERE id=$id";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarEntrenador($userId, $user, $desc, $tel, $correo) {
        try {

            $consulta = "UPDATE entrenadores SET usuario='$user', descripcion='$desc', telefono='$tel', correo='$correo' WHERE id=$userId";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }
}
