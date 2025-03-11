<?php

class HorarioModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getHorarioByActId($id)
    {
        $query = 'SELECT id, horario FROM horarios WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_NUM);
    }

    public function updateHorarioById($id, $ruta) {
        try {

            $consulta = "UPDATE horarios SET horario='$ruta' WHERE id_actividad=$id";
            
            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }
}