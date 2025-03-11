<?php include("Views/modales.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Public/css/style_modales.css">
    <link rel="stylesheet" href="Public/css/style-extras.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="Public/css/style-index.css">
    <link rel="stylesheet" href="Public/css/style_dashboard.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBTis130</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Agrega Swiper JS -->
    


</head>
<body>
    <?php include("Views/Layouts/navbars.php"); ?> 
    
    <div class="TitleIndex">
        <div class="Title-container">
            <h1><?php echo $actividad[0]; ?></h1>
        </div>
        <div class="contenedor-alumnos">
            <?php switch ($id) {
                case 1:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad1.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 2:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad2.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 3:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad3.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 4:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad4.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 5:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad5.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 6:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad6.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 7:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad7.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 8:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad8.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 9:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad9.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 10:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad10.jpg" alt=""> 
                        </div>
                    <?php
                    break;
                case 11:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad11.jpeg" alt=""> 
                        </div>
                    <?php
                    break;
                case 12:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad12.jpeg" alt=""> 
                        </div>
                    <?php
                    break;
                case 13:
                    ?> 
                        <div class="imagen">
                            <img src="Public/imagenes/actividad13.jpg" alt=""> 
                        </div>
                    <?php
                    break;                                     
                default:
                    header('Location: index.php?message=Vista-No-Valida');
                    break;
            } ?>
            
            <div class="TituloExtracurricular-Image2"></div>
        </div>
    </div>
    <div class="DescExtra">
            <?php switch ($id) {
                case 1:
                    ?> <p>La actividad de fútbol varonil es una plataforma emocionante donde los estudiantes perfeccionan sus habilidades futbolísticas. A través de intensos entrenamientos y apasionantes partidos, los participantes no solo mejoran su destreza con el balón, sino que también cultivan valores fundamentales como la camaradería, la disciplina y el respeto hacia el juego y sus compañeros de equipo.</p>
                    <?php
                    break;
                case 2:
                    ?> <p>Enfocado en la destreza física y la coordinación, el vóleyball varonil no solo es un deporte competitivo, sino también un escenario donde los estudiantes aprenden a trabajar juntos en un entorno de alta intensidad. La habilidad para comunicarse eficazmente en la cancha y tomar decisiones rápidas se convierten en aspectos clave de esta actividad.</p> <?php
                    break;
                case 3:
                    ?> <p>La competencia de baloncesto varonil no solo pone a prueba la agilidad y la habilidad de tiro, sino que también fomenta la lealtad y la competitividad deportiva. Los estudiantes, a través de prácticas y juegos, refinan sus habilidades técnicas, fortalecen sus lazos como equipo y se sumergen en una experiencia deportiva inolvidable.</p> <?php
                    break;
                case 4:
                    ?> <p>La actividad de fútbol femenil va más allá del campo de juego, empoderando a las estudiantes a través del deporte. Estas jóvenes atletas no solo perfeccionan sus habilidades físicas, sino que también cultivan la confianza en sí mismas, la cooperación y el respeto mutuo, formando una hermandad a través del fútbol.</p>
                    <?php
                    break;
                case 5:
                    ?> <p>En el vóleyball femenil, las estudiantes encuentran un terreno donde desarrollar habilidades técnicas y tácticas, al tiempo que fortalecen los lazos emocionales con sus compañeras de equipo. La comunicación en la cancha y la capacidad para enfrentar desafíos se convierten en aspectos esenciales de esta dinámica actividad.</p> <?php
                    break;
                case 6:
                    ?> <p>La competencia de baloncesto femenil no solo destaca la agilidad y la destreza de las participantes, sino que también promueve valores de trabajo en equipo, perseverancia y fair play. Las jugadoras, a lo largo de la temporada, construyen una comunidad unida que trasciende el campo de juego.</p> <?php
                    break;
                case 7:
                    ?> <p>El grupo de artes ofrece un espacio creativo donde los estudiantes exploran diversas formas de expresión artística, desde la pintura hasta la manualidad. Este grupo no solo fomenta la creatividad, sino que también nutre la apreciación estética y el desarrollo de habilidades artísticas únicas.</p>
                    <?php
                    break;
                case 8:
                    ?> <p>En la actividad de fotografía, los participantes capturan momentos significativos y expresan su visión del mundo a través de la lente. Explorando técnicas de composición, iluminación y postproducción, los estudiantes no solo desarrollan habilidades técnicas, sino también una apreciación más profunda por la narrativa visual.</p> <?php
                    break;
                case 9:
                    ?> <p>En el grupo de canto, los estudiantes no solo perfeccionan sus habilidades vocales, sino que también experimentan la alegría de la interpretación musical. Esta actividad fomenta la autoexpresión, la armonía grupal y el aprecio por la diversidad musical.</p> <?php
                    break;
                case 10:
                    ?> <p>La actividad de teatro sumerge a los estudiantes en el mundo de la actuación, la dirección y la producción. Más allá de las tablas, esta actividad promueve la confianza en sí mismos, la capacidad para comprender y comunicar emociones, y el trabajo en equipo necesario para llevar a cabo producciones teatrales exitosas.</p>
                    <?php
                    break;
                case 11:
                    ?> <p>Las porristas no solo son animadoras entusiastas en eventos deportivos, sino también embajadoras del espíritu escolar. A través de coreografías creativas y la generación de energía positiva, este grupo fomenta la participación estudiantil y el orgullo por la institución.</p> <?php
                    break;
                case 12:
                    ?> <p>El grupo de escolta participa en ceremonias y eventos importantes, donde la disciplina, la responsabilidad y el respeto son fundamentales. Los estudiantes, a través de su participación en este grupo, desarrollan habilidades de coordinación, resiliencia y un sentido de pertenencia a la comunidad escolar.</p> <?php
                    break;
                case 13:
                    ?> <p>La actividad de danza ofrece a los participantes la oportunidad de explorar la expresión corporal a través de diversos estilos y coreografías. Más allá de los movimientos, la danza fomenta la coordinación, la gracia artística y la colaboración en un entorno creativo que celebra la diversidad de talentos.</p> <?php
                    break;
                default:
                    header('Location: index.php?message=Vista-No-Valida');
                    break;
            } ?>
    </div>
    
    <div class="informacion">
        <div class="HorarioEnt-cont">
            <div class="horario">
                <h1>Horario</h1>
                <div class="horario-imagen">
                    <?php if ($permiso===true) { ?>
                        <div class="editar" onclick="horarios(<?php echo $id ?>)"> <i class="fas fa-pen"></i> </div>
                    <?php } ?>
                    <img class="imagen" src="<?php echo $horario[1]; ?>" alt="">
                </div>
                
            </div>
            
            <div class="entrenador">
                <h1 class="titulo">Entrenador(es)</h1>
                <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($entrenador as $row){?>
                        <div class="swiper-slide">
                            <div class="cardent">
                                <div class="entimg-container">
                                    <img src="<?php echo $row['imagen']; ?>" alt="">
                                </div>
                                <div class="NombreEnt">
                                    <h1><?php echo ($row['nombre']." ".$row['paterno']." ".$row['materno']); ?></h1>
                                </div>
                                <div class="DescEnt">
                                    <p><?php echo $row['descripcion']; ?></p>
                                </div>
                                <div class="ContactoEnt">
                                    <p>Num: <?php echo $row['telefono']; ?></p>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                        </div>
                    <?php } ?>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                </div>
            </div>
        </div>
        <button onclick="inscribirse()">¿Desea unirse a la actividad extracurricular?</button>
    </div>
    
    <div class="secciones">
        <div class="titulo">
            <h1>Actividad</h1>
        </div>
        <div class="publicaciones">
        <?php foreach($resultado as $row){  
                include("Views/layouts/publicaciones.php");
            }?> 
        </div>
    </div>
</body>
<?php include("Views/Layouts/footer.php"); ?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>


  document.addEventListener("DOMContentLoaded", function () {
    var mySwiper = new Swiper(".swiper-container", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 1,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 3000,      
      },
    });
  });
</script>
</html>