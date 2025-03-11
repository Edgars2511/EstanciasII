<?php
require_once 'Models/AlumnoModel.php';

class AlumnosController
{
  private $alumnoModel;
  private $pdo;
    
  public function __construct($pdo)
  {
    $this->alumnoModel = new AlumnoModel($pdo);
    $this->pdo = $pdo;
  }

  function visualizarInformacion(){
    if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 3){
      $id = $_SESSION['id_usuario']; 
      $row = $this->alumnoModel->getInformacionAlumnoById($id);
      if ($row) {
        // Crear un nuevo array asociativo con los nombres de las columnas
        $datos = array(
          "id" => $row['id'],
          "telefono" => $row['telefono'],
          "nombre_papa" => $row['nombre_papa'],
          "telefono_papa" => $row['telefono_papa'],
          "nombre_mama" => $row['nombre_mama'],
          "telefono_mama" => $row['telefono_mama'],
          "talla_camisa" => $row['talla_camisa'],
          "talla_pantalon" => $row['talla_pantalon']
        );
        // Convertir los datos en un arreglo JSON y enviarlos como respuesta
        echo json_encode($datos);
      }else {
        echo json_encode(null); // Si no se encuentra el registro, devolver null
      }
    } else {
        header('Location: index.php?message=VistaInvalida');
        exit;
    }

    
  }

  function visualizarPapeleria($id){
    $row = $this->alumnoModel->getDocumentosAlumnoById($id);
    if ($row) {
      $datos = []; // Array para almacenar los datos
  
      foreach ($row as $fila) {
          // Crear un nuevo array asociativo por cada fila
          $documento = array(
              "documento" => $fila['documento'],
              "tipo" => $fila['tipo'],
              "nombre" => $fila['nombre']
              // ... Puedes agregar más campos si es necesario
          );
  
          // Agregar cada fila al array principal
          $datos[] = $documento;
      }
  
      // Convertir los datos en un arreglo JSON y enviarlos como respuesta
      echo json_encode($datos, JSON_PRETTY_PRINT);
    }else {
      echo json_encode(null); // Si no se encuentra el registro, devolver null
    }


    
  }

  function agregar(){
    if(isset($_POST['agregarAlumno']))
    {
        $nombre=$_POST['nombre'];
        $paterno=$_POST['apellido_paterno'];
        $materno=$_POST['apellido_materno'];
        $especialidad=$_POST['especialidad'];
        $curp=$_POST['curp'];
        $turno=$_POST['turno'];
        $numero=$_POST['numero_control'];
        $correo=$_POST['correo'];
        $actividad=$_POST['actividad'];
        
        $resultado = $this->alumnoModel->agregarAlumno($nombre, $paterno, $materno, $especialidad, $curp, $turno, $numero, $correo, $actividad);     
        
        if ($resultado===true) {
            $id_alumno = $this->alumnoModel->pdo->lastInsertId();
            $resultadoDocs = $this->agregarDocumentos($id_alumno);
            if ($resultadoDocs===true) {
              header("Location: index.php?mensaje=agregado_exitoso");
              exit;
            } else {
              header("Location: index.php?mensaje=error_agregar_documentos");
            exit;
            }
            
        } elseif($resultado===false) {

            header("Location: index.php?mensaje=error_agregar_alumno");
            exit;
        }
    }
  }

  function agregarDocumentos($id_alumno){
   
    $tipos_documentos = range(1, 6);
    $permiso = true;
    foreach ($tipos_documentos as $tipo) {
        // Insertar documento
        $resultado = $this->alumnoModel->InsertDocs($tipo);

        if ($resultado) {
            // Obtener el ID del documento insertado
            $id_documento = $this->alumnoModel->pdo->lastInsertId(); // Suponiendo que pdo es el objeto PDO

            // Relacionar documento con el alumno
            $resultado_relacion = $this->alumnoModel->InsertDocs_Alumnos($id_alumno, $id_documento);

            if ($resultado_relacion===false) {
                $permiso = false;
                // Manejar el error si falla la inserción en documentos_alumnos
            }
        } else {
            echo "Error al insertar documento de tipo $tipo";
            // Manejar el error si falla la inserción en documentos
        }
    }

    if ($permiso===true) {
      return true;
    } else {
      return false;
    }

  }

  function agregarInfo(){
    if(isset($_POST['SubirInfo']))
    {
      $id = $_SESSION['id_usuario'];
      $numero=$_POST['numero'];
      $nombrePapa=$_POST['nombrePapa'];
      $numeroPapa=$_POST['numeroPapa'];
      $nombreMama=$_POST['nombreMama'];
      $numeroMama=$_POST['numeroMama'];      
      $tallaCamisa=$_POST['tallaCamisa'];
      $tallaPantalon=$_POST['tallaPantalon'];
      
      $resultado = $this->alumnoModel->agregarInformacionAlumno($numero, $nombrePapa, $numeroPapa, $nombreMama, $numeroMama, $tallaCamisa, $tallaPantalon, $id);     

      if ($resultado===true) {
          header("Location: index.php?mensaje=Informacion_agregado_exitoso");
          exit;
      } elseif($resultado===false) {
          header("Location: index.php?mensaje=error_agregar_Informacion");
          exit;
      }
    } 
  }

  function actualizarInformacion(){
    if(isset($_POST['actualizarInformacion']))
    {
      $id = $_SESSION['id_usuario'];
      $numero=$_POST['telefonoEdit'];
      $nombrePapa=$_POST['nombrePapaEdit'];
      $numeroPapa=$_POST['telefonoPapaEdit'];
      $nombreMama=$_POST['nombreMamaEdit'];
      $numeroMama=$_POST['telefonoMamaEdit'];      
      $tallaCamisa=$_POST['tallaCamisaEdit'];
      $tallaPantalon=$_POST['tallaPantalonEdit'];
      
      $resultado = $this->alumnoModel->actualizarInformacionAlumno($numero, $nombrePapa, $numeroPapa, $nombreMama, $numeroMama, $tallaCamisa, $tallaPantalon, $id);     


        if ($resultado===true) {
          header("Location: index.php?p=MiPerfil&mensaje=actualizado_exitoso");
          exit;
        } elseif($resultado===false) {
          header("Location: index.php?p=MiPerfil&mensaje=error_actualizar");
          exit;
        }
    }
  }

  function actualizarPapeleria($id){
    if(isset($_POST['actualizarPapeleria']))
    {
      $idDocumentos = $this->alumnoModel->getDocumentosId($id);

      $nombrePermiso=$_FILES['Permiso-Edit']['name'];
      $archivoPermiso=$_FILES['Permiso-Edit']['tmp_name'];
    
      $nombreCURP=$_FILES['CURP-Edit']['name'];
      $archivoCURP=$_FILES['CURP-Edit']['tmp_name'];
      
      $nombreActa=$_FILES['ActadeNacimiento-Edit']['name'];
      $archivoActa=$_FILES['ActadeNacimiento-Edit']['tmp_name'];

      $nombreCons=$_FILES['Constancia-Edit']['name'];
      $archivoCons=$_FILES['Constancia-Edit']['tmp_name'];
    
      $nombreINEPapa=$_FILES['INEPapá-Edit']['name'];
      $archivoINEPapa=$_FILES['INEPapá-Edit']['tmp_name'];
    
      $nombreINEMama=$_FILES['INEMamá-Edit']['name'];
      $archivoINEMama=$_FILES['INEMamá-Edit']['tmp_name'];
    
      $ruta="Public/pdf";

      $rutaPermiso = $ruta . "/" . $nombrePermiso;
      move_uploaded_file($archivoPermiso, $rutaPermiso);

      // Operaciones para el grupo CURP
      $rutaCURP = $ruta . "/" . $nombreCURP;
      move_uploaded_file($archivoCURP, $rutaCURP);

      // Operaciones para el grupo Acta de Nacimiento
      $rutaActaNacimiento = $ruta . "/" . $nombreActa;
      move_uploaded_file($archivoActa, $rutaActaNacimiento);

      // Operaciones para el grupo Constancia
      $rutaConstancia = $ruta . "/" . $nombreCons;
      move_uploaded_file($archivoCons, $rutaConstancia);

      // Operaciones para el grupo INE Papá
      $rutaINEPapa = $ruta . "/" . $nombreINEPapa;
      move_uploaded_file($archivoINEPapa, $rutaINEPapa);

      // Operaciones para el grupo INE Mamá
      $rutaINEMama = $ruta . "/" . $nombreINEMama;
      move_uploaded_file($archivoINEMama, $rutaINEMama);
      

      if (!empty($archivoPermiso)) {
        $resultadoPermiso = $this->alumnoModel->actualizarPapeleriaAlumno($id, $idDocumentos[0][0], $nombrePermiso, $rutaPermiso);
      }
      
      if (!empty($archivoCURP)) {
          $resultadoCURP = $this->alumnoModel->actualizarPapeleriaAlumno($id, $idDocumentos[1][0], $nombreCURP, $rutaCURP);
      }
      
      if (!empty($archivoActa)) {
          $resultadoActa = $this->alumnoModel->actualizarPapeleriaAlumno($id, $idDocumentos[2][0], $nombreActa, $rutaActaNacimiento);
      }
      
      if (!empty($archivoCons)) {
          $resultadoCons = $this->alumnoModel->actualizarPapeleriaAlumno($id, $idDocumentos[3][0], $nombreCons, $rutaConstancia);
      }
      
      if (!empty($archivoINEMama)) {
          $resultadoINEPapa = $this->alumnoModel->actualizarPapeleriaAlumno($id, $idDocumentos[4][0], $nombreINEMama, $rutaINEMama);
      }
      
      if (!empty($archivoINEPapa)) {
          $resultadoINEMama = $this->alumnoModel->actualizarPapeleriaAlumno($id, $idDocumentos[5][0], $nombreINEPapa, $rutaINEPapa);
      }
      
      if (
          $resultadoPermiso !== null || 
          $resultadoCURP !== null || 
          $resultadoActa !== null ||
          $resultadoCons !== null ||
          $resultadoINEPapa !== null ||
          $resultadoINEMama !== null
      ) {
          header("Location: index.php?p=MiPerfil&mensaje=actualizado_exitoso");
          exit;
      } else {
          header("Location: index.php?p=MiPerfil&mensaje=error_actualizar");
          exit;
      }
    
    }
  }

  function updateEstatus($id){
    $eliminacionExitosa = $this->alumnoModel->updateEstatusById($id);
    if ($eliminacionExitosa) {
        // Redirigir a la página anterior si la eliminación fue exitosa
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER'] . "&mensaje=eliminacion_exitosa");
        } else {
            // Si no hay referencia, redirige al index.php
            header("Location: index.php?mensaje=eliminacion_exitosa");
        }
        exit;
    } else {
        // Redirigir a la página anterior si hubo un error en la eliminación
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER'] . "&mensaje=error_eliminar");
        } else {
            // Si no hay referencia, redirige al index.php
            header("Location: index.php?mensaje=error_eliminar");
        }
        exit;
    }
}


}
?>