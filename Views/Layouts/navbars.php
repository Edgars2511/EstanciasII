 <!-- Jquery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
<div class="navbar">
    <input type="checkbox" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    
    <a href="index.php" class="titulo">
        <img src="Public/imagenes/logo.png">
        <h1>CBTis 130</h1>  
    </a>

    <div class="menu">
        <a href="index.php">Home</a>
        <a href="index.php#novedades">Novedades</a>
        <div class="dropdownAct2">
            <a onclick="toggleDropdown()">Actividades</a>
            <div id="myDropdown" class="dropdownActi-content">
                <a onclick="showOptions('extraOptions')">Masculino</a>
                <div id="extraOptions" class="extraOptions">
                    <ul>
                        <a href="index.php?p=Actividad&id=1">Futbol</a>
                        <a href="index.php?p=Actividad&id=2">Voleibol</a>
                        <a href="index.php?p=Actividad&id=3">Basquetball</a>
                    </ul>
                </div>

                <a onclick="showOptions('extraOptions2')">Femenino</a>
                <div id="extraOptions2" class="extraOptions">
                    <ul>
                        <a href="index.php?p=Actividad&id=4">Futbol</a>
                        <a href="index.php?p=Actividad&id=5">Voleibol</a>
                        <a href="index.php?p=Actividad&id=6">Basquetball</a>
                    </ul>
                </div>

                <a onclick="showOptions('extraOptions3')">Cultural</a>
                <div id="extraOptions3" class="extraOptions">
                    <ul>
                        <a href="index.php?p=Actividad&id=7">Grupo de artes</a>
                        <a href="index.php?p=Actividad&id=8">Fotografia</a>
                        <a href="index.php?p=Actividad&id=9">Canto</a>
                        <a href="index.php?p=Actividad&id=10">Teatro</a>
                        <a href="index.php?p=Actividad&id=11">Porristas</a>
                        <a href="index.php?p=Actividad&id=12">Escolta</a>
                        <a href="index.php?p=Actividad&id=13">Danza</a>
                        <a href="index.php?p=Actividad&id=14">Ajedrez</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="dropdownAct">
            <a>Actividades</a>
            <div class="content">
                <?php include("Views/Layouts/menus.php") ?> 
            </div>
        </div>
    
    
    <?php if(!empty($_SESSION['rol']) && $_SESSION['rol'] == 1){ ?>
    </div> 
    
    <div class="iconos">
        <div>
            <a onclick="agregar()" class="agregar"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="dropdownUser">
            <div class="icon">
                <img src="<?php echo $imagen[0]; ?>" alt="">
            </div>
            <div class="dropdownUser_content">
                <div class="opcion">
                    <a href="index.php?p=MiPerfil"> Perfil </a>
                </div>
                <?php foreach($actividadesEntrenador as $row){?>
                    <div class="opcion">
                        <a href="index.php?p=DashboardActividad&id=<?php echo($row['id']); ?>"> Mi Actividad (<?php echo($row['actividad']); ?>)</a>
                    </div>
                <?php } ?>
                
                <div class="opcion" id="final">
                    <a href="index.php?m=logout"> Logout </a>
                </div>
            </div>
        </div>   
    </div>
    <?php } elseif(!empty($_SESSION['rol']) && $_SESSION['rol'] == 2){ ?>
        <div class="dropdownAct2">
    <a onclick="toggleDropdown2()">Actividades de alumnos</a>
    <div id="myDropdown2" class="dropdownActi-content">
        <a onclick="showOptions2('extraOptions4')">Varonil</a>
            <div id="extraOptions4" class="extraOptions">
                <ul>
                        <a href="index.php?p=DashboardActividad&id=1">Futbol</a>
                        <a href="index.php?p=DashboardActividad&id=2">Voleibol</a>
                        <a href="index.php?p=DashboardActividad&id=3">Basquetball</a>
                </ul>
            </div>
        <a onclick="showOptions2('extraOptions5')">Femenil</a>
        <div id="extraOptions5" class="extraOptions">
            <ul>
                        <a href="index.php?p=DashboardActividad&id=4">Futbol</a>
                        <a href="index.php?p=DashboardActividad&id=5">Voleiboll</a>
                        <a href="index.php?p=DashboardActividad&id=6">Basquetball</a>
            </ul>
        </div>
        
        <a onclick="showOptions2('extraOptions6')">Mixto</a>
        <div id="extraOptions6" class="extraOptions">
            <ul>
                        <a href="index.php?p=DashboardActividad&id=7">Grupo de artes</a>
                        <a href="index.php?p=DashboardActividad&id=8">Fotografia</a>
                        <a href="index.php?p=DashboardActividad&id=9">Canto</a>
                        <a href="index.php?p=DashboardActividad&id=10">Teatro</a>
                        <a href="index.php?p=DashboardActividad&id=11">Porristas</a>
                        <a href="index.php?p=DashboardActividad&id=12">Escolta</a>
                        <a href="index.php?p=DashboardActividad&id=13">Danza</a>
                        <a href="index.php?p=DashboardActividad&id=14">Ajedrez</a>
            </ul>
        </div>
    </div>
</div>

        <div class="dropdownAct">
            <a>Alumnos Actividades</a>
            <div class="content">
            <div class="menu">
    <div class="column">
        <div class="category">Varonil</div>
        <div class="button-container">
            <a href="index.php?p=DashboardActividad&id=1" class="button">Fútbol</a>
            <a href="index.php?p=DashboardActividad&id=2" class="button">Voleibol</a>
            <a href="index.php?p=DashboardActividad&id=3" class="button">Basquetball</a>
        </div>
    </div>
    <div class="column">
        <div class="category">Femenil</div>
        <div class="button-container">
            <a href="index.php?p=DashboardActividad&id=4" class="button">Ftbol</a>
            <a href="index.php?p=DashboardActividad&id=5" class="button">Voleibol</a>
            <a href="index.php?p=DashboardActividad&id=6" class="button">Basquetball</a>
        </div>
    </div>

    <div class="column">
        <div class="category">Cultural</div>
        <div class="button-container">
            <a href="index.php?p=DashboardActividad&id=7" class="button">Grupo de pintura, dibujo y cómic</a>
            <a href="index.php?p=DashboardActividad&id=8" class="button">Club de fotografía</a>
            <a href="index.php?p=DashboardActividad&id=9" class="button">Canto</a>
            
        </div>
    </div>
    <div class="column">
        <div class="category" style="color: white;">Cultural</div>
        <div class="button-container">
            <a href="index.php?p=DashboardActividad&id=10" class="button">Teatro</a>
            <a href="index.php?p=DashboardActividad&id=11" class="button">Porristas</a>
            <a href="index.php?p=DashboardActividad&id=12" class="button">Escolta</a>
            <a href="index.php?p=DashboardActividad&id=13" class="button">Danza</a>
            <a href="index.php?p=DashboardActividad&id=14" class="button">Ajedrez</a>
        </div>
    </div>
</div>
</div>
</div>
</div> 

    <div class="iconos">
        <div>
        <a onclick="agregar()" class="agregar"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="dropdownUser">
            <div class="icon">
                <img src="<?php echo $imagen[0]; ?>" alt="">
            </div>
            <div class="dropdownUser_content">
                <div class="opcion" id="final">
                    <a href="index.php?m=logout"> Logout </a>
                </div>
            </div>
        </div>   
    </div>
    
    <?php } elseif(!empty($_SESSION['rol']) && $_SESSION['rol'] == 3){ ?>

    </div> 
    <div class="iconos">
        <div class="dropdownUser">
            <div class="icon">
                <img src="<?php echo $imagen[0]; ?>" alt="">
            </div>
            <div class="dropdownUser_content">
                <div class="opcion">
                    <a href="index.php?p=MiPerfil"> Perfil </a>
                </div>
                <div class="opcion" id="final">
                    <a href="index.php?m=logout"> Logout </a> 
                </div> 
            </div>
        </div>   
    </div>
    
    <?php } else{?> 

    </div> 
    
    <div class="iconos">
        <a class="login" href="index.php?m=login">Login</a>
    </div>
    <?php }?> 
</div>



<script>
    // Función para mostrar u ocultar el dropdown principal
    function toggleDropdown() {
        $('#myDropdown').slideToggle();
    }

    // Función para mostrar las opciones adicionales bajo la opción seleccionada
    function showOptions(optionId) {
        $('.extraOptions').not('#' + optionId).slideUp(); // Oculta todas las opciones adicionales excepto la seleccionada con animación
        $('#' + optionId).slideToggle(); // Muestra u oculta la opción seleccionada con animación
    }
    // Cerrar el dropdown si se hace clic fuera de él
    $(document).mouseup(function (e) {
        var container = $(".dropdownAct2");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#myDropdown').slideUp();
        }
    });

    // Ocultar los extraOptions al cargar la página
    $(document).ready(function () {
        $('.extraOptions').hide();
    });
</script>
<script>
    function toggleDropdown2() {
        $('#myDropdown2').slideToggle();
    }

    function showOptions2(optionId) {
        // Oculta todas las opciones adicionales excepto la seleccionada con animación
        $('.extraOptions').not('#' + optionId).slideUp();
        
        // Muestra u oculta la opción seleccionada con animación
        $('#' + optionId).slideToggle();
    }

    $(document).mouseup(function (e) {
        var container = $(".dropdownAct2");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#myDropdown2').slideUp();
        }
    });

    $(document).ready(function () {
        $('.extraOptions2').hide();
    });
</script>

