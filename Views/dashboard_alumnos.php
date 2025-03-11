<?php include("Views/Layouts/head.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBTis130</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/4ff92c0a62.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css-->
    <link rel="stylesheet" href="Public/css/style_alumno.css">
    <link rel="stylesheet" href="Public/css/style_dashboard.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Slider -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

</head>

<body>
<?php 
include("Views/Layouts/navbars.php"); 
include("Views/Layouts/modales_perfil.php"); 
if(!empty($_SESSION['rol']) && $_SESSION['rol'] != 3){
?> 
    <div class="miga">
        <p><a href="index.php?p=DashboardActividad&id=<?php echo($alumno['id_actividad']); ?>"><?php echo($alumno['actividad']); ?></a> <span> > <?php echo($alumno['nombre'] ." ". $alumno['paterno'] ." ". $alumno['materno']);?></span></p>
    </div>
<?php } ?> 

<div class="cont">
    <?php 
    if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 3 && empty($info)){
    ?> 
        <div class="formulario">
            <h1>Formulario Inicial</h1>
            <form action="index.php?al=agregarInfo" method="POST">
                <label for="Numero">Numero de telefono</label>
                <input type="text" name="numero" placeholder="Numero de telefono" required>

                <label for="Numero">Nombre de Papá</label>
                <input type="text" name="nombrePapa" placeholder="Nombre de Papá" required>

                <label for="Numero">Numero de telefono Papá</label>
                <input type="text" name="numeroPapa" placeholder="Numero de Papá" required>

                <label for="Numero">Nombre de Mamá</label>
                <input type="text" name="nombreMama" placeholder="Numero de mama" required>

                <label for="Numero">Numero de telefono Mamá</label>
                <input type="text" name="numeroMama" placeholder="Numero de mama" required>


                <label for="selextor">Talla de camisa</label>
                <div class="content-select">
                    <select name="tallaCamisa">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <label for="selextor">Talla de pantalon</label>
                <div class="content-select">
                    <select name="tallaPantalon">
                        <option value="28">28</option>
                        <option value="30">30</option>
                        <option value="32">32</option>
                        <option value="34">34</option>
                    </select>
                </div>
                <div style="text-align: center;">
                    <input type="submit" value="Subir Informacion" name="SubirInfo">
                </div>
                
            </form>
            
        </div>
    <?php } else{?>
        <div class="alumno">
            <div class="perfil">
                <div class="imagen">
                    <div class="cont">
                        <img class="img" src="<?php echo($info['imagen']); ?>" alt="">
                        <?php if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 3){ ?> 
                            <div class="editar" onclick="editPerfil()"> <i class="fas fa-pen"></i> </div>
                        <?php } ?> 
                    </div>
                </div>

                <div class="informacion">
                    <h1><?php echo($alumno['nombre'] ." ". $alumno['paterno'] ." ". $alumno['materno']);?></h1>
                </div>
                <div class="inf">
                    <h2>Curp</h2>
                    <p><?php echo($alumno['curp']); ?></p>
                </div>
                <div class="inf">
                    <h2>Especialidad</h2>
                    <p><?php echo($alumno['especialidad']); ?></p>
                </div>
                <div class="inf">
                    <h2>Turno</h2>
                    <p><?php echo($alumno['turno']); ?></p>
                </div>
                <div class="inf">
                    <h2>Numero de control</h2>
                    <p><?php echo($alumno['numero_control']); ?></p>
                </div>
                <div class="inf" id="final">
                    <h2>Correo</h2>
                    <p><?php echo($alumno['correo_institucional']); ?></p>
                </div>
                
                <?php if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 3){ ?> 
                    <a onclick="editcontent()" class="editbut-cont">Cambiar contraseña</a>  
                <?php } ?> 

            </div>
            <div class="informacion-completa">
                <div class="info">
                    <h1>Informacion</h1>
                    <div class="inf">
                        <h2>Telefono</h2>
                        <p><?php echo($info['telefono']); ?></p>
                    </div>
                    <div class="inf">
                        <h2>Nombre de Papá</h2>
                        <p><?php echo($info['nombre_papa']); ?></p>
                    </div>
                    <div class="inf">
                        <h2>Telefono de Papá</h2>
                        <p><?php echo($info['telefono_papa']); ?></p>
                    </div>
                    <div class="inf">
                        <h2>Nombre de Mamá</h2>
                        <p><?php echo($info['nombre_mama']); ?></p>
                    </div>
                    <div class="inf">
                        <h2>Telefono de Mamá</h2>
                        <p><?php echo($info['telefono_mama']); ?></p>
                    </div>
                    <div class="inf">
                        <h2>Talla de camisa</h2>
                        <p><?php echo($info['talla_camisa']); ?></p>
                    </div>
                    <div class="inf" id="final">
                        <h2>Talla de pantalon</h2>
                        <p><?php echo($info['talla_pantalon']); ?></p>
                    </div>
                    
                    <?php if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 3){ ?> 
                        <div class="editar"> <a  onclick="editInfo()"> Editar</a> </div>
                    <?php } ?> 
                </div>
                <div class="papeleria">
                    <h1>Papeleria</h1>
                    <div class="cont">
                        <?php foreach($documento as $row){ 
                        if ($row['nombre'] != "vacio") {?> 
                            <div class="doc">
                                <h1><?php echo($row['tipo']); ?></h1>
                                <div class="pdf">
                                    <img src="Public/imagenes/image 19.png" alt="">
                                    <div class="nombre">
                                        <a href="<?php echo($row['documento']); ?>" download><?php echo($row['nombre']); ?></a>
                                    </div>
                                </div>
                            </div>   
                        <?php } ?> 
                             
                            
                        <?php } ?> 
                    </div>
                    <div class="editar" onclick="editPapeleria(<?php echo($alumno['id']); ?>)">
                        <a> Editar</a>  
                    </div>
                    
                </div>
            </div>
        </div>

    <?php } ?> 
</div>
</body>
<?php include("Views/Layouts/footer.php"); ?>
<script src="Public/js/main.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</html>