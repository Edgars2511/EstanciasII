<?php
require_once 'Models/PublicacionModel.php';
require_once 'Models/ActividadModel.php';
require_once 'Models/EntrenadorModel.php';
require_once 'Models/AlumnoModel.php';
require_once 'Models/HorarioModel.php';

class ViewsController
{
  private $publiModel;
  private $actModel;
  private $entModel;
  private $alumModel;
  private $horModel;
    
  public function __construct($pdo)
  {
    $this->publiModel = new PublicacionModel($pdo);
    $this->actModel = new ActividadModel($pdo);
    $this->entModel = new EntrenadorModel($pdo);
    $this->alumModel = new AlumnoModel($pdo);
    $this->horModel = new HorarioModel($pdo);
  }

  public function index(){
    $resultado = $this->publiModel->getLast6Publicaciones();
    if (!empty($_SESSION['id_usuario'])) {
      $imagen = $this->ImagenPerfil();
      
    }
    if (!empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
      $id = $_SESSION['id_usuario'];
      $actividadesEntrenador = $this->entModel->getAllActividadesById($id);
    }
    require_once("Views/index.php");
  }

  
  private function ImagenPerfil()
  {
    $id = $_SESSION['id_usuario'];
    if(!empty($_SESSION['rol']) && $_SESSION['rol'] != 3){
      $imagen = $this->entModel->getImagenEntrenadorById($id); 
    } elseif (!empty($_SESSION['rol']) && $_SESSION['rol'] == 3) {
      $imagen = $this->alumModel->getImagenAlumnoById($id); 
    } 
    if (empty($imagen)) {
      $imagen[0] = "public/imagenes/sin-foto.png";
    }
    return $imagen;
  }



  public function DashboardActividad($id)
  {
    $actividad = $this->actModel->getActById($id);
    if (!empty($_SESSION['rol']) && $actividad == true) {
      
      if ($_SESSION['rol'] == 1) {
        $id_user = $_SESSION['id_usuario'];
        $actividades = $this->entModel->getActividadesById($id_user);
        $cantidadResultados = count($actividades);
        $permiso = false;

        for ($i = 0; $i < $cantidadResultados; $i++) {
          $act = $actividades[$i][0];
          if ($act == $id) {
              $permiso = true;
              break; // Detiene el bucle si encuentra una coincidencia
          }
        }

        if ($permiso == false) {
          header('Location: index.php?message=Vista-No-Valida');
          exit;
        }
        $actividadesEntrenador = $this->entModel->getAllActividadesById($id_user);
        
      }
      

      
      $resultado = $this->alumModel->getAlumnosByActividad($id);
      $imagen = $this->ImagenPerfil();
      require_once("Views/dashboard_actividad.php");
      
    } else {
      header('Location: index.php?message=Vista-No-Valida');
      exit;
    }
  }


  function MiPerfil(){
    if (!empty($_SESSION['rol'])) {
      $id = $_SESSION['id_usuario'];
      $imagen = $this->ImagenPerfil();

      if($_SESSION['rol'] == 1){
        $entrenador = $this->entModel->getEntrenadorById($id);
        $actividades = $this->entModel->getNombreActividadesById($id);
        $actividadesEntrenador = $this->entModel->getAllActividadesById($id);
        require "Views/PerfilEntrenador.php";
      } 
      elseif ($_SESSION['rol'] == 3) {
        $alumno = $this->alumModel->getAlumnoById($id);
        $info = $this->alumModel->getInformacionAlumnoById($id);
        $documento = $this->alumModel->getDocumentosAlumnoById($id);
        require "Views/dashboard_alumnos.php";
      } 
      else{
          header('Location: index.php?message=VistaInvalida');
          exit;
      }

    } else{
        header('Location: index.php?message=VistaInvalida');
        exit;
    }
    
  }

  function PerfilAlumno($id_alum){
    $alumno = $this->alumModel->getAlumnoById($id_alum);  
    if (!empty($_SESSION['rol']) && $_SESSION['rol'] != 3 && $alumno == true) {
        $imagen = $this->ImagenPerfil();

      if ($_SESSION['rol'] == 2) {
        $info = $this->alumModel->getInformacionAlumnoById($id_alum);
        $documento = $this->alumModel->getDocumentosAlumnoById($id_alum);
        require "Views/dashboard_alumnos.php";

      } elseif ($_SESSION['rol'] == 1) {
        
        $id_user = $_SESSION['id_usuario'];
        $actividades = $this->entModel->getActividadesById($id_user);
        $cantidadResultados = count($actividades);
        $permiso = false;

        $id_alum_act = $alumno['id_actividad'];

        for ($i = 0; $i < $cantidadResultados; $i++) {
          $act = $actividades[$i][0];
          if ($act == $id_alum_act) {
              $permiso = true;
              break; // Detiene el bucle si encuentra una coincidencia
          }
        }

        if ($permiso == false) {
          header('Location: index.php?message=Vista-No-Valida');
          exit;
        }else {
          $actividadesEntrenador = $this->entModel->getAllActividadesById($id_user);

          $info = $this->alumModel->getInformacionAlumnoById($id_alum);
          $documento = $this->alumModel->getDocumentosAlumnoById($id_alum);
          require "Views/dashboard_alumnos.php";
        }
        
        

      } else{
        header('Location: index.php?message=VistaInvalida');
        exit;
      }

    } else{
        header('Location: index.php?message=VistaInvalida');
        exit;
    }
    
  }

  public function actividad($id){
    $actividad = $this->actModel->getActById($id);
    if (!empty($actividad)) {
      $permiso = false;
      if (!empty($_SESSION['rol']) && $_SESSION['rol'] == 2) {
        $permiso = true;
      } elseif (!empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        $id_usuario = $_SESSION['id_usuario'];
        $actividadesEntrenador = $this->entModel->getAllActividadesById($id_usuario);

        $actividades = $this->entModel->getActividadesById($id_usuario);
        $cantidadResultados = count($actividades);

        for ($i = 0; $i < $cantidadResultados; $i++) {
          $act = $actividades[$i][0];
          if ($act == $id) {
              $permiso = true;
              break; // Detiene el bucle si encuentra una coincidencia
          }
        }       

      } 
      $entrenador = $this->entModel->getEntrenadorByActividad($id);
      $resultado = $this->publiModel->getLast12PublicacionesByActividad($id);
      $horario = $this->horModel->getHorarioByActId($id);
      if (!empty($_SESSION['id_usuario'])) {
        $imagen = $this->ImagenPerfil();
      }
      require_once("Views/actividad.php");
    } else {
      header('Location: index.php?message=Vista-No-Valida');
    } 
    
  }

  public function publicacion($id){
    if (!empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
      $id_usuario = $_SESSION['id_usuario'];
      $actividadesEntrenador = $this->entModel->getAllActividadesById($id_usuario);
    }
    $publi = $this->publiModel->getPublicacionById($id);
    $ultima = $this->publiModel->getLastPublicacionExept($id);
    $ultimas4 = $this->publiModel->getLast4Publicaciones($id);
    if (!empty($_SESSION['id_usuario'])) {
      $imagen = $this->ImagenPerfil();
    }
    require_once("Views/publicacion.php");
  }
}
?>