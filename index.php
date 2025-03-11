<?php
session_start();

require_once("Models/Database.php");
require_once("Controllers/UserController.php");
require_once("Controllers/PublicacionesController.php");
require_once("Controllers/ViewsController.php");
require_once("Controllers/ActividadesController.php");
require_once("Controllers/AlumnosController.php");
require_once("Controllers/EntrenadoresController.php");
require_once("Controllers/HorariosController.php");

$database = new Database();
$pdo = $database->conectar();


if (isset($_GET['m'])) {
    $metodo = $_GET['m'];
    $clase = new UserController($pdo);
    $clase->$metodo();
} elseif (isset($_GET['p'])) {
    $metodo = $_GET['p'];
    $clase = new ViewsController($pdo);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $clase->$metodo($id);
    }else {
        $clase->$metodo();
    }
} elseif (isset($_GET['c'])) {
    $metodo = $_GET['c'];
    $clase = new PublicacionesController($pdo);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $clase->$metodo($id);
    }else {
        $clase->$metodo();
    }
} elseif (isset($_GET['a'])) {
    $metodo = $_GET['a'];
    $clase = new ActividadesController($pdo);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $clase->$metodo($id);
    }else {
        $clase->$metodo();
    }
} elseif (isset($_GET['al'])) {
    $metodo = $_GET['al'];
    $clase = new AlumnosController($pdo);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $clase->$metodo($id);
    }else {
        $clase->$metodo();
    }
} elseif (isset($_GET['en'])) {
    $metodo = $_GET['en'];
    $clase = new EntrenadoresController($pdo);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $clase->$metodo($id);
    }else {
        $clase->$metodo();
    }
} elseif (isset($_GET['ho'])) {
    $metodo = $_GET['ho'];
    $clase = new HorariosController($pdo);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $clase->$metodo($id);
    }else {
        $clase->$metodo();
    }
}else {
    $clase = new ViewsController($pdo);
    $clase->index();
}
