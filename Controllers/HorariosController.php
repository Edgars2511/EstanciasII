<?php
require_once 'Models/HorarioModel.php';

class HorariosController
{
  private $horarioModel;
  private $pdo;
    
  public function __construct($pdo)
  {
    $this->horarioModel = new HorarioModel($pdo);
    $this->pdo = $pdo;
  }

  function updateHorario($id){
    if(isset($_POST['actualizarHorario']))
    {
      $nombreimg=$_FILES['nuevoHorario']['name'];
      $archivo=$_FILES['nuevoHorario']['tmp_name'];

      $ruta0="Public/imagenes";
      
      //imagen1
      $ruta=$ruta0."/".$nombreimg;
      move_uploaded_file($archivo,$ruta);
      
      $resultado = $this->horarioModel->updateHorarioById($id, $ruta);   

     
      if ($resultado===true) {
          // La inserción fue exitosa, redirige a la vista de lista de publicaciones o muestra un mensaje de éxito.
          header("Location: index.php?p=actividad&id=$id");
          exit;
      } elseif($resultado===false) {
          // Ocurrió un error al agregar la publicación, redirige a la vista del formulario de agregar o muestra un mensaje de error.
          header("Location: index.php?mensaje=error_actualizar_imagen");
          exit;
      }
    } 

    
  }


}
?>