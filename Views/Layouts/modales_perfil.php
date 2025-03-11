<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="Public/css/style_modales.css">

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



<!--Modal formulario editar imagen de perfil-->
<div id="modal_edit_perfil" class="modal_form">
<div class="modal-content">
    <span class="close_edit_perfil close_form">&times;</span>
    <div class="closer">
        <h2>Editar Perfil</h2>
    </div> 
    <form method="POST" style="padding-right: 2rem; display: flex; flex-direction: column; " id="EditEntrenador" action="index.php?m=actualizarImagen" enctype="multipart/form-data">

                <div style="display: none; align-self: center; width: 30rem; height: 30rem;" class="imagePreview" id="agregarIMGent"></div>
                <div class="perfil">
                    <label for="file-inpEnt" class="agregarIMG" >+ Subir Imagen</label>
                </div>
                <input style="display: none;" type="file" id="file-inpEnt" name="nuevaImagenAl" class="upload-button" onchange="displayImagePreview('file-inpEnt', 'agregarIMGent')" >

        <div class="submit" style="padding-right: 0;">
            <input type="submit" value="Guardar Imagen" name="actualizarImagenAl">
        </div>
    </form>
</div>
</div>

<!--Modal formulario editar papeleria-->
<div id="modal_edit_papeleria" class="modal_form">
<div class="modal-content">
    <span class="close_edit_papeleria close_form">&times;</span>
    <div class="closer">
        <h2 >Editar Papeleria</h2>
    </div> 
    <form method="POST" id="formPapeleria" action="index.php?al=actualizarPapeleria" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>
            <div class="docs-cont" id="docs-cont">

            </div>
        </scroll-page>
        </scroll-container>

        <div class="submit">
            <input type="submit" value="Guardar Cambios" name="actualizarPapeleria">
        </div>
    </form>
</div>
</div>

<!--Modal formulario editar informacion de perfil del alumno-->
<div id="modal_edit_info" class="modal_form">
<div class="modal-content">
    <span class="close_edit_alumno_info close_form">&times;</span>
    <div class="closer">
        <h2>Editar Perfil</h2>
    </div> 
    <form method="POST" action="index.php?al=actualizarInformacion" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>
        <label for="Numero">Numero de telefono</label>
            <input type="text" id="telefonoEdit" name="telefonoEdit" placeholder="Numero de telefono" required>

            <label for="Numero">Nombre de Papá</label>
            <input type="text" id="nombrePapaEdit" name="nombrePapaEdit" placeholder="Nombre de Papá" required>

            <label for="Numero">Numero de telefono Papá</label>
            <input type="text" id="telefonoPapaEdit" name="telefonoPapaEdit" placeholder="Numero de Papá" required>

            <label for="Numero">Nombre de Mamá</label>
            <input type="text" id="nombreMamaEdit" name="nombreMamaEdit" placeholder="Numero de mama" required>

            <label for="Numero">Numero de telefono Mamá</label>
            <input type="text" id="telefonoMamaEdit" name="telefonoMamaEdit" placeholder="Numero de mama" required>


            <label for="selextor">Talla de camisa</label>
            <div class="content-select">
                <select name="tallaCamisaEdit">
                    <option value="" id="tallaCamisaEdit"></option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>
            
            <label for="selextor">Talla de pantalon de mujers</label>
            <div class="content-select">
                <select name="tallaPantalonEdit">
                <option value="" id="tallaPantalonEdit"></option>
                    <option value="28">28</option>
                    <option value="30">30</option>
                    <option value="32">32</option>
                    <option value="34">34</option>
                </select>
            </div>




        </scroll-page>
        </scroll-container>

        <div class="submit">
            <input type="submit" value="Guardar Cambios" name="actualizarInformacion">
        </div>
    </form>
</div>
</div>

<!--Modal formulario editar perfil del entrenador-->
<div id="modal_edit_ent" class="modal_form" style="">
<div class="modal-content">
    <span class="close_edit_info close_form">&times;</span>
    <div class="closer">
        <h2>Edita tu perfil</h2>
    </div> 
    <form method="POST" action="index.php?en=actualizar" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>

            <label for="descripcion">Nombre de Usuario</label>
            <input type="text" id="userEntrenador" name="userEntrenador" required>

            <label for="descripcion">Descripción</label>
            <input type="text" id="descEntrenador" name="descEntrenador" required>

            <label for="telefono">Télefono</label>
            <input type="text" id="telEntrenador" name="telEntrenador"  required>

            <label for="correo">Correo</label>
            <input type="text" id="correoEntrenador" name="correoEntrenador" required>
            
        </scroll-page>
        </scroll-container>

        <div class="submit">
            <input type="submit" value="Guardar Cambios" name="actualizarEntrenador">
        </div>
    </form>
</div>
</div>



<!--Modal formulario editar contraseña del usuario-->
<div id="modal_edit_cont" class="modal_form" style="">
<div class="modal-content">
    <span class="close_edit_cont close_form">&times;</span>
    <div class="closer">
        <h2>Editar Contraseña</h2>
    </div> 
    <form method="POST" action="index.php?m=actualizarCont" enctype="multipart/form-data">
        <scroll-container id="modal">
        <scroll-page>
            <label for="contraseña">Contraseña Actual</label>
            <input type="password" id="apellido_paterno" name="contActual" placeholder="Escribe tu contraseña actual" class="center-input" required>

            <label for="correo">Contraseña Nueva</label>
            <input type="password" id="correo" name="contNueva" placeholder="Contraseña Nueva" class="center-input" required>

            <label for="correo">Confirmar Contraseña Nueva</label>
            <input type="password" id="correo" name="confConNueva" placeholder="Confirmar Contraseña Nueva" class="center-input" required>

        </scroll-page>
        </scroll-container>

        <div class="submit">
            <input type="submit" value="Guardar Contraseña" name="actualizarCont">
        </div>
    </form>
</div>
</div>

<!--Modal formulario eliminar alumno-->
<div id="modal_elim_alumno" class="modal_form">
<div class="modal-content">
    <span class="close_elim_alumn close_form">&times;</span>
    <div class="closer">
        <h2>Confirmar Eliminacion</h2>
    </div> 

    <div id="botonesCancelar">
    </div>
</div>
</div>


<script src="Public/js/main.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', () => {
    const titulo = document.querySelector('.nombreDoc');
    let lineHeight = parseInt(window.getComputedStyle(titulo).lineHeight);
    let maxHeight = lineHeight * 2; // Dos líneas de altura

    titulo.style.maxHeight = maxHeight + 'px';
});

</script>