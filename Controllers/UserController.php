<?php

require_once 'Models/AlumnoModel.php';
require_once 'Models/EntrenadorModel.php';


class UserController
{
  private $alumnoModel;
  private $entrenadorModel;
  
  public function __construct($pdo)
  {
      $this->alumnoModel = new AlumnoModel($pdo);
      $this->entrenadorModel = new EntrenadorModel($pdo);
  }  

  function actualizarImagen(){
    if(isset($_POST['actualizarImagenAl']))
    {
      $id = $_SESSION['id_usuario'];

      $nombreimg=$_FILES['nuevaImagenAl']['name'];
      $archivo=$_FILES['nuevaImagenAl']['tmp_name'];

      $ruta0="Public/imagenes";
      if (empty($nombreimg)) {
        header("Location: index.php?p=MiPerfil");
        exit;
      }
      //imagen1
      $ruta=$ruta0."/".$nombreimg;
      move_uploaded_file($archivo,$ruta);
      
      if(!empty($_SESSION['rol']) && $_SESSION['rol'] != 3){
        $resultado = $this->entrenadorModel->actualizarImagenByEntrenadorId($id, $ruta);  
      } elseif (!empty($_SESSION['rol']) && $_SESSION['rol'] == 3) {
        $resultado = $this->alumnoModel->actualizarImagenByAlumnoId($id, $ruta);  
      } else {
          header('Location: index.php?message=MetodoNoPermitido');
          exit;
      }    

     
      if ($resultado===true) {
          // La inserción fue exitosa, redirige a la vista de lista de Paciones o muestra un mensaje de éxito.
          header("Location: index.php?p=MiPerfil&mensaje=Imagen_actualizada");
          exit;
      } elseif($resultado===false) {
          // Ocurrió un error al agregar la publicación, redirige a la vista del formulario de agregar o muestra un mensaje de error.
          header("Location: index.php?p=MiPerfil&mensaje=error_actualizar_imagen");
          exit;
      }
    } 
  }

  function actualizarCont(){
    if(isset($_POST['actualizarCont']))
    {
      $resultado = false;
      if(!empty($_SESSION['rol'])){
        $id = $_SESSION['id_usuario']; 
      } else {
          header('Location: index.php?message=VistaInvalida');
      }

      $contActual=$_POST['contActual'];

      $contNueva=$_POST['contNueva'];
      $confConNueva=$_POST['confConNueva'];
      

      if(!empty($_SESSION['rol']) && $_SESSION['rol'] != 3){
        $contModel = $this->entrenadorModel->getContraseñaEntrenadorById($id); 
        
        if ($contActual === $contModel[0] && $contNueva === $confConNueva) {
          $resultado = $this->entrenadorModel->actualizarContraseña($id, $contNueva);   
        }

      } elseif (!empty($_SESSION['rol']) && $_SESSION['rol'] == 3) {
        $contModel = $this->alumnoModel->getContraseñaAlumnoById($id); 

        if ($contActual === $contModel[0] && $contNueva === $confConNueva) {
          $resultado = $this->alumnoModel->actualizarContraseña($id, $contNueva);   
        }

      } else {
          header('Location: index.php?message=MetodoNoPermitido');
          exit;
      }   

      if ($resultado===true) {
        // La inserción fue exitosa, redirige a la vista de lista de publicaciones o muestra un mensaje de éxito.
        header("Location: index.php?p=MiPerfil&mensaje=Contraseña_actualizada");
        exit;

      } elseif($resultado===false) {
        // Ocurrió un error al agregar la publicación, redirige a la vista del formulario de agregar o muestra un mensaje de error.
        header("Location: index.php?p=MiPerfil&mensaje=error_actualizar_contraseña");
        exit;
      }
      
      
      
    }
  }

  public function login()
  {
    session_destroy();
    if (isset($_POST['submit'])) {
      session_start();
      $usuario=$_POST['txtusuario'];
      $contra=$_POST['txtcontraseña'];

      $user = $this->entrenadorModel->getEntrenadorByUsername($usuario);
      if ($user) {
        if ($contra === $user['contraseña']) {
          $id = $user['id'];
          
          if ($user['id_rol'] == 1) {
            $ultimo_acceso = $this->entrenadorModel->updateUltimoAccesoById($id);
            $actividades = $this->entrenadorModel->getActividadesById($id);
            $cantidadResultados = count($actividades);

            for ($i = 0; $i < $cantidadResultados; $i++) {
                $_SESSION['id_actividad' . ($i + 1)] = $actividades[$i];
            }
            $_SESSION['actividades_total'] = $cantidadResultados;
          }
          
          $_SESSION['id_usuario'] = $id;
          $_SESSION['rol']=$user['id_rol']; 

  
          header('Location: index.php');
          exit;
        } else {
          header('Location: index.php?message=EntrenadorInvalido');
          exit;
        }
      }else {
        $user = $this->alumnoModel->getAlumnoByCurp($usuario);
        if ($user && $contra == $user['contraseña']) {
          $_SESSION['id_usuario'] = $user['id'];
          $_SESSION['rol']=$user['id_rol']; 
          $_SESSION['id_act']=$user['id_actividad']; 
  
          header('Location: index.php');
          exit;
        } else {
          header('Location: index.php?message=AlumnoInvalido');
          exit;
        }
      }
      
    } else {
      require "Views/login.php";
    }
  }

  public function logout(){
    session_destroy();
    header("Location: index.php");
  }
}
