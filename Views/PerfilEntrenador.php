<?php 
include("Views/Layouts/modales_perfil.php"); 
include("Views/modales.php"); 
include("Views/Layouts/head.php");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Public/css/style_dashboard.css">
    <link rel="stylesheet" href="Public/css/style-extras.css">
    <link rel="stylesheet" href="Public/css/estilo_infoentrenador.css">
    <link rel="stylesheet" href="Public/css/style_modales.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBTis130</title>
</head>
<body>
    <?php include("Views/Layouts/navbars.php"); ?> 
    <div class="contenedor-entrenador">
        <div class="perfil-entrenador">
            <div class="cont">
                <img class="img" src="<?php echo $entrenador['imagen']; ?>" alt="">
                <div class="editar" onclick="editPerfil()">
                    <i class="fas fa-pen"></i>
                </div>
            </div>
            
            <h1><?php echo ($entrenador['nombre']." ".$entrenador['paterno']." ".$entrenador['materno']); ?></h1>
        </div>
        <div class="informacion-entrenador">
            <h1>Descripcion:</h1>
            <p><?php echo $entrenador['descripcion']; ?></p>
            <h1>Número de Teléfono:</h1>
            <p><?php echo $entrenador['telefono']; ?></p>
            <h1>Correo Electrónico:</h1>
            <p><?php echo $entrenador['correo']; ?></p>
            <h1>Actividad(es) Extracurricular(es):</h1>
            <?php foreach($actividades as $row){?>
                <p><?php echo $row['actividad']; ?></p>
            <?php } ?>
        </div>
        <div class="botones">
            <a onclick="editPerfilent()" class="editbut" type="submit">Editar Perfil</a>
            <a onclick="editcontent()" class="editbut-cont" type="submit">Cambiar usuario y contraseña</a>   
        </div>

    </div>
</body>
<?php include("Views/Layouts/footer.php"); ?>
</html>
