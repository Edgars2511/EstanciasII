<?php

class AlumnoModel
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function getAlumnoById($id)
    {
        $query = 'SELECT a.*, ac.actividad
        FROM alumnos AS a
        JOIN actividades AS ac ON a.id_actividad = ac.id 
        WHERE a.id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getContraseñaAlumnoById($id){
        $query = "SELECT contraseña
        FROM alumnos 
        WHERE id = $id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_NUM);
    }

    public function getAlumnoByCurp($usuario)
    {
        $query = 'SELECT *
        FROM alumnos
        WHERE curp = :usuario';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['usuario' => $usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getInformacionAlumnoById($id)
    {
        $query = 'SELECT *
        FROM alumno_informacion
        WHERE id_alumno = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }   

    public function getImagenAlumnoById($id)
    {
        $query = 'SELECT imagen
        FROM alumno_informacion
        WHERE id_alumno = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_NUM);
    }

    public function getDocumentosAlumnoById($id)
    {
        $query = 'SELECT d.id, d.documento, td.tipo, d.nombre
        FROM documentos AS d 
        JOIN documentos_alumnos AS da ON d.id = da.id_documento 
        JOIN alumnos AS a ON da.id_alumno = a.id 
        JOIN tipo_documento AS td ON d.tipo = td.id
        WHERE a.id = :id
        ORDER BY td.id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDocumentosId($id)
    {
        $query = 'SELECT d.id
        FROM documentos AS d 
        JOIN documentos_alumnos AS da ON d.id = da.id_documento 
        JOIN alumnos AS a ON da.id_alumno = a.id 
        JOIN tipo_documento AS td ON d.tipo = td.id
        WHERE a.id = :id
        ORDER BY td.id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }

    public function getAlumnos()
    {
        $query = 'SELECT *
        FROM alumnos';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAlumnosByActividad($id)
    {
        $query = 'SELECT 
        a.*, 
        ac.actividad, 
        MAX(inf.imagen) AS imagen,
        COUNT(CASE WHEN documentos.documento IS NOT NULL THEN 1 END) AS numero_consultas_documentos
    FROM 
        alumnos AS a
    JOIN 
        actividades AS ac ON a.id_actividad = ac.id 
    JOIN 
        alumno_informacion AS inf ON inf.id_alumno = a.id 
    LEFT JOIN 
        documentos_alumnos AS da ON da.id_alumno = a.id
    LEFT JOIN 
        documentos ON da.id_documento = documentos.id -- Aquí se une la tabla documentos
    WHERE 
        a.id_actividad = :id
        AND a.estatus = 1
    GROUP BY 
        a.id, ac.actividad
    ';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarAlumno($nombre, $paterno, $materno, $especialidad, $curp, $turno, $numero, $correo, $actividad) {
        try {
            if (empty($materno)) {
                $consulta = "INSERT INTO alumnos(nombre, paterno, especialidad, curp, turno, numero_control, correo_institucional, id_actividad, contraseña) VALUES ('$nombre', '$paterno', '$especialidad', '$curp', '$turno', '$numero', '$correo', $actividad, '$numero')";
            } else {
                $consulta = "INSERT INTO alumnos(nombre, paterno, materno, especialidad, curp, turno, numero_control, correo_institucional, id_actividad, contraseña) VALUES ('$nombre', '$paterno', '$materno', '$especialidad', '$curp', '$turno', '$numero', '$correo', $actividad, '$numero')";
            }

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function agregarInformacionAlumno($numero, $nombrePapa, $numeroPapa, $nombreMama, $numeroMama, $tallaCamisa, $tallaPantalon, $id) {
        try {

            $consulta = "INSERT INTO alumno_informacion(telefono, nombre_papa, telefono_papa, nombre_mama, telefono_mama, talla_camisa, talla_pantalon, id_alumno) VALUES ('$numero', '$nombrePapa', '$numeroPapa', '$nombreMama', '$numeroMama', '$tallaCamisa', $tallaPantalon, $id)";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarInformacionAlumno($numero, $nombrePapa, $numeroPapa, $nombreMama, $numeroMama, $tallaCamisa, $tallaPantalon, $id) {
        try {

            $consulta = "UPDATE alumno_informacion SET telefono='$numero', nombre_papa='$nombrePapa', telefono_papa='$numeroPapa', nombre_mama='$nombreMama', telefono_mama='$numeroMama', talla_camisa='$tallaCamisa', talla_pantalon=$tallaPantalon WHERE id_alumno=$id";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function InsertDocs($tipo) {
        try {

            $consulta = "INSERT INTO documentos (tipo) VALUES ($tipo)";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }
    public function InsertDocs_Alumnos($id_alumno, $id_documento) {
        try {

            $consulta = "INSERT INTO documentos_alumnos (id_alumno, id_documento) VALUES ($id_alumno, $id_documento)";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarImagenByAlumnoId($id, $ruta) {
        try {

            $consulta = "UPDATE alumno_informacion SET imagen='$ruta' WHERE id_alumno=$id";
            
            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarPapeleriaAlumno($id, $idDocumento, $nombrePermiso, $rutaPermiso) {
        try {
            $consulta = "UPDATE documentos AS d
            JOIN documentos_alumnos AS da ON d.id = da.id_documento
            SET d.nombre = '$nombrePermiso', d.documento = '$rutaPermiso'
            WHERE da.id_alumno = $id
            AND d.id = $idDocumento;";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarContraseña($id, $contraseña) {
        try {

            $consulta = "UPDATE alumnos SET contraseña='$contraseña' WHERE id=$id";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateEstatusById($id) {
        try {

            $consulta = "UPDATE alumnos SET estatus=0 WHERE id=$id";

            $resultado = $this->pdo->prepare($consulta);

            return $resultado->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

}