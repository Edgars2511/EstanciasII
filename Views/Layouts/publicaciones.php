<?php 
    $id = $row['id'];
    $titular = $row['titular']; 
    $fecha = $row['fecha']; 
    $imagen1 = $row['imagen1'];
    $imagen2 = $row['imagen2'];
    $imagen3 = $row['imagen3']; 
    $id_departamento = $row['id_actividad']; 
    $departamento = $row['actividad']; 
?>
<div class="publicacion">
<?php if ((!empty($_SESSION['rol']) && $_SESSION['rol'] == 2) || (!empty($permiso) && $permiso === true)) { ?>
    <div>
        <div class="dropdown">
            <a class="fas fa-ellipsis-v"></a>
            <div class="dropdown-content">
                <div class="iconos">
                    <a id="modal_btn_edit" class="borde"  onclick="editar(<?php echo $id ?>)"><i class="fas fa-edit"></i> Editar</a>
                    <a href="index.php?id=<?php echo $id ?>&c=eliminar" ><i class="fas fa-trash"></i> Eliminar</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

    <div class="imagen">
        
        <a href="index.php?p=publicacion&id=<?php echo $id?>"><img src="<?php echo $imagen1?>"></a>
    </div> 
    <div class="titulos">
        <p> <a href="index.php?p=departamentos&id=<?php echo $id_departamento?>"><span><?php echo $departamento?></span> </a></p>
    </div>
    
    
    <div class="descripcion">
        <a href="index.php?p=publicacion&id=<?php echo $id?>"><h1><?php echo $titular?></h1></a>
    </div>
</div>