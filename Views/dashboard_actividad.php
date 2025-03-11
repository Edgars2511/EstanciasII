<!DOCTYPE html>
<html lang="en">
<?php
include("Views/Layouts/head.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancias 1</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/4ff92c0a62.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css-->
    <link rel="stylesheet" href="Public/css/style_dashboard.css">
    <link rel="stylesheet" href="Public/css/style_modales.css">
    <link rel="stylesheet" href="Public/css/style-publicacion.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Slider -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

</head>

<body>
<?php include("Views/Layouts/navbars.php"); 
include("Views/Layouts/modales_perfil.php"); ?> 


<div class="cont">
    <div class="encabezado">
        <h1><?php echo($actividad[0]);?></h1>  
    </div>
    <div class="tabla">
      <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Matricula</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <?php foreach($resultado as $row){  
          $id = $row['id'];
          $nombre =  $row['nombre'];
          $paterno =  $row['paterno'];
          $materno =  $row['materno'];
          $numero_control =  $row['numero_control'];
          $imagenAlumno = $row['imagen'];
          $estatus = $row['numero_consultas_documentos'];
          $id_actividad =  $row['id_actividad'];
        ?> <tbody>
          <tr>
              <td class="user"> <a href="index.php?p=PerfilAlumno&id=<?php echo($id)?>"> <img src="<?php echo($imagenAlumno)?>" alt=""> <?php echo($nombre ." ". $paterno ." ". $materno);?> </a></td>
              <td><a href="index.php?p=PerfilAlumno&id=<?php echo($id)?>">  <?php echo($numero_control)?></a> </td>
              <td class="status"><a href="index.php?p=PerfilAlumno&id=<?php echo($id)?>"> 
                <?php if ($estatus < 6) { ?>
                  <i class="fas fa-times-circle"></i> Incompleto</a>
                <?php } else { ?>
                  
                  <i class="fas fa-check-circle"></i> Completo</a>
                <?php } ?>
                  
              </td>
              <td><a class="eliminar" style="color: white;"  onclick="eliminarAlm(<?php echo($id)?>)" >Eliminar</a></td>
          </tr>
          </tbody>
         
        <?php } ?> 

    </table>
    </div>
</div>


    

</body>
<?php include("Views/Layouts/footer.php"); ?>
<script src="Public/js/main.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</html>