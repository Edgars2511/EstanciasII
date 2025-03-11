<?php
require_once 'Models/EntrenadorModel.php';

class EntrenadoresController
{
  private $entModel;
  private $pdo;
    
  public function __construct($pdo)
  {
    $this->entModel = new EntrenadorModel($pdo);
    $this->pdo = $pdo;
  }


  function visualizar(){
    if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 1){
      $id = $_SESSION['id_usuario']; 
      $row = $this->entModel->getEntrenadorById($id);
      if ($row) {
        $datos = array(
          "id" => $row['id'],
          "telefono" => $row['telefono'],
          "correo" => $row['correo'],
          "descripcion" => $row['descripcion'],
          "usuario" => $row['usuario']
        );
        echo json_encode($datos);
      }else {
        echo json_encode(null);
      }
    } else {
        header('Location: index.php?message=VistaInvalida');
        exit;
    }
    
  }

  function actualizar(){
    if(isset($_POST['actualizarEntrenador']))
    {
      $user=$_POST['userEntrenador'];
      $desc=$_POST['descEntrenador'];
      $tel=$_POST['telEntrenador'];
      $correo=$_POST['correoEntrenador'];
    
      $userId = $_SESSION['id_usuario'];

      echo $correo;
      
      $resultado = $this->entModel->actualizarEntrenador($userId, $user, $desc, $tel, $correo);     
      
        if ($resultado===true) {
          // La inserción fue exitosa, redirige a la vista de lista de publicaciones o muestra un mensaje de éxito.
          header("Location: index.php?p=MiPerfil&mensaje=actualizado_exitoso");
          exit;
        } elseif($resultado===false) {
          // Ocurrió un error al agregar la publicación, redirige a la vista del formulario de agregar o muestra un mensaje de error.
          header("Location: index.php?p=MiPerfil&mensaje=error_actualizar");
          exit;
        }
    }
  }
}
?>