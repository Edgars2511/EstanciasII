<?php
require_once 'Models/ActividadModel.php';

class ActividadesController
{
  private $actiModel;
  private $pdo;
    
  public function __construct($pdo)
  {
    $this->actiModel = new ActividadModel($pdo);
    $this->pdo = $pdo;
  }

  function visualizar(){
    require "Views/actividad.php";
  }
}
?>