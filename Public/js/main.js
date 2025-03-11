let currentCount = 1;
const maxCount = 3;
const minCount = 1;

//modal imagenes
var modal = document.getElementById("myModal");

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function cargarImagenEnModal(imagenSrc) {
  // Obtener referencias a los elementos del modal
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementsByClassName("modal-content")[0];
  
  // Mostrar el modal
  modal.style.display = "block";
  
  // Asignar la imagen al atributo src del elemento img en el modal
  modalImg.src = imagenSrc;
  
  // Agregar función para cerrar el modal al hacer clic en la "X"
  var closeBtn = document.getElementsByClassName("close")[0];
  closeBtn.onclick = function() {
    modal.style.display = "none";
  }
}


//Modal agregar
function agregar() {
  var modalForm = document.getElementById("modal_formu");
  var closeBtn = document.getElementsByClassName("close_form")[0];
  
  modalForm.style.display = "block";

  closeBtn.addEventListener("click", function() {
    modalForm.style.display = "none";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == modalForm) {
      modalForm.style.display = "none";
    }
  });
}

//Modal horarios
function horarios(id) {
  var formulario = $('#EditHorario');
  formulario.attr('action', formulario.attr('action') + '&id=' + id);
  
  var modalForm = document.getElementById("modal_edit_horario");
  var closeBtn = document.getElementsByClassName("close_horario")[0];
  
  modalForm.style.display = "block";

  closeBtn.addEventListener("click", function() {
    modalForm.style.display = "none";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == modalForm) {
      modalForm.style.display = "none";
    }
  });
}

//Modal inscribirse
function inscribirse() {
  var modalForm = document.getElementById("modal_ins");
  var closeBtn = document.getElementsByClassName("close_ins")[0];
  
  modalForm.style.display = "block";

  closeBtn.addEventListener("click", function() {
    modalForm.style.display = "none";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == modalForm) {
      modalForm.style.display = "none";
    }
  });
}

//Modal insceditar perfil
function editPerfil() {
  var modalForm = document.getElementById("modal_edit_perfil");
  var closeBtn = document.getElementsByClassName("close_edit_perfil")[0];
  
  modalForm.style.display = "block";

  closeBtn.addEventListener("click", function() {
    modalForm.style.display = "none";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == modalForm) {
      modalForm.style.display = "none";
    }
  });
}


//Eliminar alumno
function eliminarAlm(id) {
  var modalForm = document.getElementById("modal_elim_alumno");
  var closeBtn = document.getElementsByClassName("close_elim_alumn")[0];

  var botonAceptar = $('<a>', {
    href: 'index.php?al=updateEstatus&id=' + id,
    id: 'aceptar',
    text: 'Aceptar'
  });

  // Crear el botón Cancelar
  var botonCancelar = $('<a>', {
      href: '#', // Puedes agregar el enlace correspondiente para cancelar
      id: 'cancelar',
      text: 'Cancelar'
  });

  // Agregar los botones al div con ID 'botonesCancelar'
  $('#botonesCancelar').append(botonAceptar, botonCancelar);
          
  modalForm.style.display = "block";

  closeBtn.addEventListener("click", function() {
    modalForm.style.display = "none";
    $("#botonesCancelar").empty();
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == modalForm) {
      modalForm.style.display = "none";
      $("#botonesCancelar").empty();
    }
  });
}

//Modal insceditar info
function editInfo() {
  // Realizar una solicitud AJAX para obtener los datos del ID proporcionado
  $.ajax({
    type: "GET",
    url: "index.php?al=visualizarInformacion",
    dataType: "json",
    success: function (data) {
      // Procesar los datos recibidos y llenar el modal con ellos
      if (data) {
        
        var modal = document.getElementById("modal_edit_info");
        var close = document.getElementsByClassName("close_edit_alumno_info")[0];
        
        $("#telefonoEdit").val(data.telefono);
        $("#nombrePapaEdit").val(data.nombre_papa);
        $("#telefonoPapaEdit").val(data.telefono_papa);
        $("#nombreMamaEdit").val(data.nombre_mama);
        $("#telefonoMamaEdit").val(data.telefono_mama);
        $("#tallaCamisaEdit").val(data.talla_camisa).text("Talla actual: "+data.talla_camisa);
        $("#tallaPantalonEdit").val(data.talla_pantalon).text("Talla actual: "+data.talla_pantalon);

        // Mostrar el modal
        modal.style.display = "block";

        // Cerrar el modal al hacer clic fuera de él
        window.addEventListener("click", function (event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        });

        // Cerrar el modal al hacer clic en el botón de cierre
        close.addEventListener("click", function () {
          modal.style.display = "none";
        });
      }
    },
    error: function () {
      // Manejar el error si algo sale mal con la solicitud AJAX
      alert("Error al obtener los datos del servidor.");
    },
  });
}

//Editar papeleria

function editPapeleria(id) {
  $.ajax({
    type: "GET",
    url: "index.php?al=visualizarPapeleria",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      // Procesar los datos recibidos y llenar el modal con ellos
      if (data) {
        var formulario = $('#EditForm');
        formulario.attr('action', formulario.attr('action') + '&id=' + data.id);


        var modalForm = document.getElementById("modal_edit_papeleria");
        var closeBtn = document.getElementsByClassName("close_edit_papeleria")[0];

        var formulario = $('#formPapeleria');
        formulario.attr('action', formulario.attr('action') + '&id=' + id);


        $.each(data, function(index, row) {
          var tipoSinEspacios = row.tipo.replace(/\s/g, '');
          const div = $('<div>').addClass('doc');
          const h1 = $('<h1>').text(row.tipo);
          const divPdf = $('<div>').addClass('pdf');
          const img = $('<img>').attr('src', 'Public/imagenes/image 19.png');
          const divNombre = $('<div>').addClass('nombre');
          const a = $('<a>').attr({'href': row.documento,
          'target': '_blank'}).text(row.nombre);
          a.attr('id', tipoSinEspacios + '_input');
          const divPerfil = $('<div>').addClass('perfil');
          const label = $('<label>').attr('for', tipoSinEspacios + '-Edit').addClass('agregarIMG').text('+ Subir');
          const input = $('<input>').attr({
            type: 'file',
            name: tipoSinEspacios + '-Edit',
            id: tipoSinEspacios + '-Edit',
            style: 'display: none;'
          });

          input.on('change', function() {
            actualizarNombreArchivo(this.id, a.attr('id')); // Llama a la función actualizarNombreArchivo con los IDs del input y el elemento <a>
          });
          
          divNombre.append(a);
          divPdf.append(img).append(divNombre);
          divPerfil.append(label).append(input);
          div.append(h1).append(divPdf).append(divPerfil);
          $('#docs-cont').append(div);

        });
                
        modalForm.style.display = "block";

        closeBtn.addEventListener("click", function() {
          modalForm.style.display = "none";
          $("#docs-cont").empty();
        });
        
        window.addEventListener("click", function(event) {
          if (event.target == modalForm) {
            modalForm.style.display = "none";
            $("#docs-cont").empty();
          }
        });
      }
    },
    error: function () {
      // Manejar el error si algo sale mal con la solicitud AJAX
      alert("Error al obtener los datos del servidor.");
    },
  });
}

function actualizarNombreArchivo(inputId, spanId) {
  var inputArchivo = document.getElementById(inputId);
  var spanNombreArchivo = document.getElementById(spanId);

  setTimeout(function() {
    spanNombreArchivo.textContent = inputArchivo.files[0] ? inputArchivo.files[0].name : "Ningún archivo seleccionado";
  }, 100); // Agrega una pequeña demora de 100 milisegundos antes de actualizar el nombre del archivo
}


//Modal editar perfil entrenador
function editPerfilent() {
  // Realizar una solicitud AJAX para obtener los datos del ID proporcionado
  $.ajax({
    type: "GET",
    url: "index.php?en=visualizar",
    dataType: "json",
    success: function (data) {
      // Procesar los datos recibidos y llenar el modal con ellos
      if (data) {
        
        var modal = document.getElementById("modal_edit_ent");
        var close = document.getElementsByClassName("close_edit_info")[0];
        
        $("#descEntrenador").val(data.descripcion);
        $("#telEntrenador").val(data.telefono);
        $("#correoEntrenador").val(data.correo);
        $("#userEntrenador").val(data.usuario);
        
        // Mostrar el modal
        modal.style.display = "block";

        // Cerrar el modal al hacer clic fuera de él
        window.addEventListener("click", function (event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        });

        // Cerrar el modal al hacer clic en el botón de cierre
        close.addEventListener("click", function () {
          modal.style.display = "none";
        });
      }
    },
    error: function () {
      // Manejar el error si algo sale mal con la solicitud AJAX
      alert("Error al obtener los datos del servidor.");
    },
  });
}

function editcontent() {
  var modalForm = document.getElementById("modal_edit_cont");
  var closeBtn = document.getElementsByClassName("close_edit_cont")[0];
  
  modalForm.style.display = "block";

  closeBtn.addEventListener("click", function() {
    modalForm.style.display = "none";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target == modalForm) {
      modalForm.style.display = "none";
    }
  });
}


// Modificar la función visualizar
function editar(id) {
  // Realizar una solicitud AJAX para obtener los datos del ID proporcionado
  $.ajax({
    type: "GET",
    url: "index.php?c=visualizar",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      // Procesar los datos recibidos y llenar el modal con ellos
      if (data) {
        
        var modal = document.getElementById("modal_edite");
        var close = document.getElementsByClassName("close_edit")[0];
        
        var formulario = $('#EditForm');
        formulario.attr('action', formulario.attr('action') + '&id=' + data.id);

        $("#Edititular").val(data.titular);
        $("#Editcuerpo").text(data.cuerpo);

        $("#imageE1").empty();
        $("#imageE2").empty();
        $("#imageE3").empty();

        $("#img2").css("display", "block");
        $("#img3").css("display", "block");

        $("#imageE1").append($("<img>").attr("src", data.imagen1));
        $("#imageE2").append($("<img>").attr("src", data.imagen2));
        $("#imageE3").append($("<img>").attr("src", data.imagen3));

        currentCount = 3;
        $("#counterDisplay").text(currentCount);
        if (data.imagen3 == null || data.imagen3 === "") {
          $("#img3").css("display", "none");
          currentCount = 2;
          $("#counterDisplay").text(currentCount);
        }

        if (data.imagen2 == null || data.imagen2 === "") {
          $("#img2").css("display", "none");
          currentCount = 1;
          $("#counterDisplay").text(currentCount);
        }

        $("#numImg").val(currentCount);
        


        $(".imagePreview").each(function() {
          $(this).css("display", "block");
        });
        
        $("#depactual").text(data.departamento);
        actualizarContadorEdit();

        
        // Mostrar el modal
        modal.style.display = "block";

        // Cerrar el modal al hacer clic fuera de él
        window.addEventListener("click", function (event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        });

        // Cerrar el modal al hacer clic en el botón de cierre
        close.addEventListener("click", function () {
          modal.style.display = "none";
        });
      }
    },
    error: function () {
      // Manejar el error si algo sale mal con la solicitud AJAX
      alert("Error al obtener los datos del servidor.");
    },
  });
}




//Menu hamburguesa
function miFuncion() {
  var checkbox = document.getElementById("toggler");
  var lat = document.getElementById("lateral");
  var label = document.querySelector('label[for="toggler"]');
      
  if (checkbox.checked) {
    // El checkbox está marcado, realiza alguna acción
    lat.style.display = "block"
    label.className = "fas fa-times";
    $("#navlat").text("Cerrar");
  } else {
    // El checkbox no está marcado, realiza alguna otra acción
    lat.style.display = "none"
    label.className = "fas fa-bars";
    $("#navlat").text("Departamentos");
  }
}


function mostrarInputs() {
  var selector = document.getElementById("selector");
  var valorSeleccionado = selector.value;

  var inputsContainer = document.getElementById("inputsContainer");
  inputsContainer.innerHTML = ""; // Limpiar el contenedor de inputs


  for (var i = 0; i < valorSeleccionado; i++) {
    var div = document.createElement("div");
    div.className = "img";

    var label = document.createElement("label");
    label.htmlFor = "file-input";
    label.className = "custom-file-upload";
    
    var labelImg = document.createElement("label");
    labelImg.innerText = "Imagen " + (i + 1) + ": ";

    var input = document.createElement("input");
    input.type = "file";
    input.id = "file-input" + (i + 1);
    input.name = "imagen" + (i + 1);
    input.className = "upload-button";
    input.setAttribute("onchange", "displayImagePreview('file-input"+ (i + 1)+"', 'imagePreview"+ (i + 1)+"')");
    if(i==0){
      input.required = true;
    }

    var imgPreview = document.createElement("div");
    imgPreview.id = "imagePreview" + (i + 1);
    imgPreview.className = "imagePreview";

    label.appendChild(labelImg);
    label.appendChild(imgPreview);
    label.appendChild(input);
    div.appendChild(label);
    inputsContainer.appendChild(div);
  }
}

function displayImagePreview(input, preview) {
    var inpu = document.getElementById(input);
    const file = inpu.files[0];

  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function(event) {
      const imagePreview = document.getElementById(preview);
      imagePreview.innerHTML = "";
      imagePreview.innerHTML = `<img src="${event.target.result}" alt="Imagen Cargada">`;
      imagePreview.style.display = "block";
      
    };
    reader.readAsDataURL(file);
  } else {
    alert("Por favor, selecciona una imagen válida.");
  }
}

function actualizarContador() {
  const textarea = document.getElementById("titular");
  const contador = document.getElementById("contador");
  const caracteresRestantes = textarea.value.length;
  contador.textContent = `${caracteresRestantes}/150 caracteres`;
}

function actualizarContadorEdit() {
  const textarea = document.getElementById("Edititular");
  const contador = document.getElementById("Editcontador");
  const caracteresRestantes = textarea.value.length;
  contador.textContent = `${caracteresRestantes}/150 caracteres`;
}





function incrementCounter() {
  if (currentCount < maxCount) {
    currentCount++;
    updateCounterDisplay();
  }
}

function decrementCounter() {
  if (currentCount > minCount) {
    currentCount--;
    updateCounterDisplay();
  }
}

function updateCounterDisplay() {
  document.getElementById("counterDisplay").innerText = currentCount;
  imagenesEdit();
}

function imagenesEdit() {
  var valorSeleccionado = currentCount;
  if (valorSeleccionado === 2) {
    $("#img2").css("display", "block");
    $("#img3").css("display", "none");
  } 
  if(valorSeleccionado === 3){
    $("#img2").css("display", "block");
    $("#img3").css("display", "block");
  } 
  if(valorSeleccionado === 1){
    $("#img2").css("display", "none");
    $("#img3").css("display", "none");
  }
  $("#numImg").val(valorSeleccionado);
}