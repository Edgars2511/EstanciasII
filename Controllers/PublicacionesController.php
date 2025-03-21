<?php
require_once 'Models/PublicacionModel.php';

class PublicacionesController
{
  private $publiModel;
  private $pdo;
    
  public function __construct($pdo)
  {
    $this->publiModel = new PublicacionModel($pdo);
    $this->pdo = $pdo;
  }

  function visualizar($id){
    $row = $this->publiModel->getPublicacionById($id);
    if ($row) {
      // Crear un nuevo array asociativo con los nombres de las columnas
      $datos = array(
        "id" => $row['id'],
        "titular" => $row['titular'],
        "fecha" => $row ['fecha'],
        "cuerpo" => $row['cuerpo'],
        "imagen1" => $row['imagen1'],
        "imagen2" => $row['imagen2'],
        "imagen3" => $row['imagen3'],
        "actividad" => $row['actividad'],
        "id_departamento" => $row['id_actividad'] 
      );
      // Convertir los datos en un arreglo JSON y enviarlos como respuesta
      echo json_encode($datos);
    }else {
      echo json_encode(null); // Si no se encuentra el registro, devolver null
    }
  }
  function agregar(){
    if(isset($_POST['agregar']))
    {
      $titular=$_POST['titular'];
      date_default_timezone_set('America/Mexico_City');
      $fecha = date('d/m/Y');
      $cuerpo=$_POST['cuerpo'];
    
      $nombreimg1=$_FILES['imagen1']['name'];
      $archivo1=$_FILES['imagen1']['tmp_name'];
    
      $nombreimg2=$_FILES['imagen2']['name'];
      $archivo2=$_FILES['imagen2']['tmp_name'];
    
      $nombreimg3=$_FILES['imagen3']['name'];
      $archivo3=$_FILES['imagen3']['tmp_name'];
    
      $userId = $_SESSION['id_usuario'];
      
      $actividad = $_POST["selector"];
      

      $ruta0="Public/imagenes";
      
      //imagen1
      $ruta1=$ruta0."/".$nombreimg1;
      move_uploaded_file($archivo1,$ruta1);
    
      //imagen2
      $ruta2 = null;
      if (!empty($nombreimg2)) {
          $ruta2 = $ruta0 . "/" . $nombreimg2;
          move_uploaded_file($archivo2, $ruta2);
      }
  
      //imagen3
      $ruta3 = null;
      if (!empty($nombreimg3)) {
          $ruta3 = $ruta0 . "/" . $nombreimg3;
          move_uploaded_file($archivo3, $ruta3);
      }

      $resultado = $this->publiModel->agregarPublicacion($titular, $fecha, $cuerpo, $ruta1, $ruta2, $ruta3, $userId, $actividad);     
      
      if ($resultado===true) {
        // La inserción fue exitosa, redirige a la vista de lista de publicaciones o muestra un mensaje de éxito.
        header("Location: index.php?mensaje=agregado_exitoso");
        exit;
      } elseif($resultado===false) {
        // Ocurrió un error al agregar la publicación, redirige a la vista del formulario de agregar o muestra un mensaje de error.
        header("Location: index.php?mensaje=error_agregar");
        exit;
      }
    }
  }

  function actualizar($id){
    if(isset($_POST['actualizar']))
    {
      $titular=$_POST['titular'];
      $cuerpo=$_POST['cuerpo'];
    
      $nombreimg1=$_FILES['Editimagen1']['name'];
      $archivo1=$_FILES['Editimagen1']['tmp_name'];
    
      $nombreimg2=$_FILES['Editimagen2']['name'];
      $archivo2=$_FILES['Editimagen2']['tmp_name'];
    
      $nombreimg3=$_FILES['Editimagen3']['name'];
      $archivo3=$_FILES['Editimagen3']['tmp_name'];
    
      $userId = $_SESSION['id_usuario'];

      if (!empty($userId) and $userId == 2) {
        $act = $_POST["Editselector"];
      } else {
        $act = $_SESSION['id_act'];;
      }
      
      $numImagenes=$_POST["numImg"];

      $ruta0="Public/imagenes";
      
      //imagen1
      $ruta1 = null;
      if (!empty($nombreimg1)) {
      $ruta1=$ruta0."/".$nombreimg1;
      move_uploaded_file($archivo1,$ruta1);
      }
      //imagen2
      $ruta2 = null;
      if (!empty($nombreimg2)) {
          $ruta2 = $ruta0 . "/" . $nombreimg2;
          move_uploaded_file($archivo2, $ruta2);
      }
  
      //imagen3
      $ruta3 = null;
      if (!empty($nombreimg3)) {
          $ruta3 = $ruta0 . "/" . $nombreimg3;
          move_uploaded_file($archivo3, $ruta3);
      }
      $resultado = $this->publiModel->actualizarPublicacion($id,$titular, $cuerpo, $ruta1, $ruta2, $ruta3, $act, $numImagenes);     
      
        if ($resultado===true) {
          // La inserción fue exitosa, redirige a la vista de lista de publicaciones o muestra un mensaje de éxito.
          header("Location: index.php?mensaje=actualizado_exitoso");
          exit;
        } elseif($resultado===false) {
          // Ocurrió un error al agregar la publicación, redirige a la vista del formulario de agregar o muestra un mensaje de error.
          header("Location: index.php?mensaje=error_actualizar");
          exit;
        }
    }
  }

  function eliminar($id){
    $eliminacionExitosa = $this->publiModel->eliminarPublicacion($id);
    if ($eliminacionExitosa) {
      header("Location: index.php?mensaje=eliminacion_exitosa");
      exit;
    } else {
      header("Location: index.php?mensaje=error_eliminar");
      exit;
    }
  }
}
?>