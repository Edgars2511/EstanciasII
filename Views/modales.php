<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="Public/css/style_modales.css">

<!--Modal imagen-->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img src="Public/imagenes/image 2.png" alt="Imagen" class="modal-content">
</div>


<style>
.imagePreview {
    width: 10rem;
    height: 10rem;
    border: 1px solid #ccc;
    overflow: hidden;
    margin-right: 10px;
    border-radius: 0.5rem;x
}
.imagePreview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

</style>

<!--Modal horario-->
<div id="modal_edit_horario" class="modal_form">
<div class="modal-content">
    <span class="close_form close_horario">&times;</span>
    <div class="closer">
        <h2>Editar Horario</h2>
    </div> 
    <form method="POST" style="padding-right: 2rem; display: flex; flex-direction: column; " id="EditHorario" action="index.php?ho=updateHorario" enctype="multipart/form-data">

                <div style="display: none; align-self: center; width: 30rem; height: 30rem;" class="imagePreview" id="agregarIMGent"></div>
                <div class="perfil">
                    <label for="file-inpEnt" class="agregarIMG" >+ Subir Imagen</label>
                </div>
                <input style="display: none;" type="file" id="file-inpEnt" name="nuevoHorario" class="upload-button" onchange="displayImagePreview('file-inpEnt', 'agregarIMGent')" >

        <div class="submit" style="padding-right: 0;">
            <input type="submit" value="Editar Imagen" name="actualizarHorario">
        </div>
    </form>
</div>
</div>

<!--Modal formulario agregar-->
<div id="modal_formu" class="modal_form">
<div class="modal-content">
    <span class="close_form">&times;</span>
    <div class="closer">
        <h2>Agregar</h2>
    </div> 
    <form method="POST" action="index.php?c=agregar" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>
            <label for="nombre">Titular</label>
            <textarea id="titular" name="titular" rows="3" maxlength="150" cols="50" placeholder="Titular" oninput="actualizarContador()" required></textarea>
            <div id="contador">0/150 caracteres</div>

            <label for="email">Cuerpo</label>
            <textarea id="titular" name="cuerpo" rows="10" cols="50" placeholder="Cuerpo de la publicacion" required></textarea>
            
            <?php if(!empty($_SESSION['id_usuario']) and $_SESSION['id_usuario']!=3){ ?>
            <label for="selector">Actividad</label>
            <div class="content-select">
                <select name="selector">
                    <?php if ($_SESSION['id_usuario']==1) {
                     foreach($actividadesEntrenador as $row){?>
                        <div class="opcion">
                            <option value="<?php echo($row['id']); ?>"><?php echo($row['actividad']); ?></option>
                        </div>
                    <?php } } else { ?>
                        <option value="1">Futbol Varonil</option>
                        <option value="2">Voleibol Varonil</option>
                        <option value="3">Basquetbol Varonil</option>
                        <option value="4">Futbol Femenil</option>
                        <option value="5">Voleibol Femenil</option>
                        <option value="6">Basquetbol Femenil</option>
                        <option value="7">Grupo de Artes</option>
                        <option value="8">Fotografia</option>
                        <option value="9">Canto</option>
                        <option value="10">Teatro</option>
                        <option value="11">Porristas</option>
                        <option value="12">Escolta</option>
                        <option value="13">Danza</option>
                        <option value="14">Ajedrez</option>
                    <?php } ?>
                </select>
            </div>
            <?php } ?>

            <label for="selextor">Numero de Imagenes</label>
            <div class="content-select">
                <select id="selector" onchange="mostrarInputs()">
                    <option value="1">1 Imagen</option>
                    <option value="2">2 Imagenes</option>
                    <option value="3">3 Imagenes</option>
                </select>
            </div>
            <div class="imagenes" id="inputsContainer">
                <div class="img">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 1: </label>
                        <div class="imagePreview" id="imagePreview1"></div>
                        <input type="file" id="file-input1" name="imagen1" class="upload-button" onchange="displayImagePreview('file-input1', 'imagePreview1')" required>
                    </label>                        
                </div>
            </div>
        </scroll-page>
        </scroll-container>

        <div class="submit">
            <input type="submit" value="Añadir" name="agregar">
        </div>
    </form>
</div>
</div>

<!--Modal formulario editar-->
<div id="modal_edite" class="modal_form">
<div class="modal-content">
    <span class="close_edit close_form">&times;</span>
    <div class="closer">
        <h2>Editar</h2>
    </div> 
    <form method="POST" id="EditForm" action="index.php?c=actualizar" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>
            <label for="Edititular">Titular</label>
            <textarea id="Edititular" name="titular" rows="3" maxlength="150" cols="50" placeholder="Titular" oninput="actualizarContadorEdit()" required></textarea>
            <div id="Editcontador">0/150 caracteres</div>

            <label for="Editcuerpo">Cuerpo</label>
            <textarea id="Editcuerpo" name="cuerpo" rows="10" cols="50" placeholder="Cuerpo de la publicacion" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem. </textarea>
            
            
            <?php if(!empty($_SESSION['id_usuario']) and $_SESSION['id_usuario'] == 2){ ?>
                <div class="departamentos">
                    <label>Actividad</label>
                    <p>Actividad actual: <span id="depactual"></span></p>
                    <div class="content-select">
                        <select name="Editselector">
                            <option value="0">Escoger actividad</option>
                            <option value="1">Futbol Varonil</option>
                            <option value="2">Voleibol Varonil</option>
                            <option value="3">Basquetbol Varonil</option>
                            <option value="4">Futbol Femenil</option>
                            <option value="5">Voleibol Femenil</option>
                            <option value="6">Basquetbol Femenil</option>
                            <option value="7">Grupo de Artes</option>
                            <option value="8">Fotografia</option>
                            <option value="9">Canto</option>
                            <option value="10">Teatro</option>
                            <option value="11">Porristas</option>
                            <option value="12">Escolta</option>
                            <option value="13">Danza</option>
                            <option value="14">Ajedrez</option>
                        </select>
                    </div>
                </div>
            <?php } ?>

            <div class="imagenes" id="inputsContainer">
                <div class="img" id="img1">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 1: </label>
                        <div class="imagePreview" id="imageE1"></div>
                        <input type="file" id="file-inpEd1" name="Editimagen1" class="upload-button" onchange="displayImagePreview('file-inpEd1', 'imageE1')" >
                    </label>   
                </div>
                <div class="img" id="img2">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 2: </label>
                        <div class="imagePreview" id="imageE2"></div>
                        <input type="file" id="file-inpEd2" name="Editimagen2" class="upload-button" onchange="displayImagePreview('file-inpEd2', 'imageE2')">
                    </label>  
                </div>
                <div class="img" id="img3">
                    <label for="file-input" class="custom-file-upload">
                        <label for="email">Imagen 3: </label>
                        <div class="imagePreview" id="imageE3"></div>
                        <input type="file" id="file-inpEd3" name="Editimagen3" class="upload-button" onchange="displayImagePreview('file-inpEd3', 'imageE3')">
                    </label>  
                </div>
            </div>
            <Label>Contador de imagenes</Label>
            <div class="contador">
                <div id="counterDisplay" class="counter">1</div>
                <a id="incrementButton" onclick="decrementCounter()">-</a>
                <a id="incrementButton" onclick="incrementCounter()">+</a>
            </div>
            <input type="text" id="numImg" name="numImg"  hidden>
        </scroll-page>
        </scroll-container>

        <div class="submit">
            <input type="submit" value="Añadir" name="actualizar" >
        </div>
    </form>
</div>
</div>


<!--Modal formulario inscribirse-->
<div id="modal_ins" class="modal_form">
<div class="modal-content">
    <span class="close_ins close_form">&times;</span>
    <div class="closer">
        <h2>Ingreso a Actividad Extracurricular</h2>
    </div> 
    <form method="POST" action="index.php?al=agregar" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>
            <label for="actividad">Actividad</label>
            <div class="content-select">
                <select name="actividad" id="actividad">
                    <option value="1">Futbol Varonil</option>
                    <option value="2">Voleibol Varonil</option>
                    <option value="3">Basquetbol Varonil</option>
                    <option value="4">Futbol Femenil</option>
                    <option value="5">Voleibol Femenil</option>
                    <option value="6">Basquetbol Femenil</option>
                    <option value="7">Grupo de Artes</option>
                    <option value="8">Fotografia</option>
                    <option value="9">Canto</option>
                    <option value="10">Teatro</option>
                    <option value="11">Porristas</option>
                    <option value="12">Escolta</option>
                    <option value="13">Danza</option>
                    <option value="14">Ajedrez</option>
                </select>
            </div>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" class="center-input" required>

            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="Escribe tu apellido paterno" class="center-input" required>

            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno" placeholder="Escribe tu apellido materno" class="center-input">

            <label for="especialidad">Especialidad</label>
            <div class="content-select">
                <select name="especialidad" id="especialidad">
                    <option value="Administracion de Recursos Humanos">Administracion de Recursos Humanos</option>
                    <option value="Laboratorista Clinico">Laboratorista Clinico</option>
                    <option value="Produccion Industrial de Alimentos">Produccion Industrial de Alimentos</option>
                    <option value="Programacion">Programacion</option>
                    <option value="Logistica">Logistica</option>
                </select>
            </div>

            <label for="curp">CURP</label>
            <input type="text" id="curp" name="curp" placeholder="Escribe tu CURP" class="center-input" required>
    
            <label for="turno">Turno</label>
            <div class="content-select">
                <select name="turno" id="turno">
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                </select>
            </div>

            <label for="numero_control">Número de Control</label>
            <input type="text" id="numero_control" name="numero_control" placeholder="Escribe tu número de control" class="center-input" required>

            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" placeholder="Escribe tu correo" class="center-input" required>
        </scroll-page>
        </scroll-container>

        <div class="submit">
            <input type="submit" value="Añadir" name="agregarAlumno">
        </div>
    </form>
</div>
</div>
<script src="Public/js/main.js"></script>


</div>