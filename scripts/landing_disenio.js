$(document).ready(function () {

  mostrar_detalle();  

  // ══════════════════════════════════════ G U A R D A R   F O R M ══════════════════════════════════════
	$("#guardar_registro_correo").on("click", function (e) { if ($(this).hasClass('send-data') == false) { $("#submit-form-correo").submit(); } });
  
});

function mostrar_detalle() {
  $.post("ajax/landing_disenio.php?op=mostrar_data",  function (e, status) {
    e = JSON.parse(e); console.log(e);
    if (e.status == true) {      

      // ::::::::::::::::::::: FONDO :::::::::::::::::::::
      
      $('body').css({
        'background': `linear-gradient(to bottom, rgba(2, 32, 14, 0.863), rgba(2, 32, 14, 0.863)), 
        url("https://adminlanding.huacachinadelnorte.pe/assets/modulo/landing_disenio/${e.data.disenio.f_img_fondo}")`,   
        'background-size': 'cover',
        'background-position': 'center'     
      });      

      // ::::::::::::::::::::: TITULOS :::::::::::::::::::::
     
      $('.landing-titulo').html(` ${e.data.disenio.f_titulo}` );      
      $('.landing-descripcion').html(` ${e.data.disenio.f_descripcion}` );      
        

      // ::::::::::::::::::::: CONTACTANOS :::::::::::::::::::::
      $('.landing-celular').attr('href', `tel:+51${e.data.empresa.celular}`);
      $('.landing-celular span').html(e.data.empresa.celular);
      $('.landing-web').attr('href', `${e.data.empresa.rs_web}`);
      $('.landing-web span').html(e.data.empresa.rs_web_etiqueta);
      $('.landing-facebook').attr('href', `${e.data.empresa.rs_facebook}`);
      $('.landing-facebook span').html(e.data.empresa.rs_facebook_etiqueta);
      $('.landing-instagram').attr('href', `${e.data.empresa.rs_instagram}`);
      $('.landing-instagram span').html(e.data.empresa.rs_instagram_etiqueta);
      $('.landing-mapa').html(e.data.empresa.mapa);
      $('.landing-mapa iframe').attr('width', '100%');
      $('.landing-whatsapp').attr('href', `https://api.whatsapp.com/send?phone=+51${e.data.empresa.celular}&text=*Hola buenos dias, vengo de tu pagina web!!*`);  
      // ::::::::::::::::::::: MAPA :::::::::::::::::::::
      $('.landing-direccion').html(e.data.empresa.direccion);      
      // $('.comida_html').html(e.data.resumen_comida);      
      
      // :::::::::::: BONO ::::::::::::::

      $('.landing-img-bono').html(`<img class="" src="https://adminlanding.huacachinadelnorte.pe/assets/modulo/landing_disenio/${e.data.disenio.f_img_promocion}" alt="">`); //limpiamos el div 

      // ::::::::::::::: FORMULARIO CORREO :::::::::::
      
    } else {
      ver_errores(e);
    }
  }).fail(function (e) { ver_errores(e); });
}

function guardar_y_editar_correo(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-agregar-correo")[0]);

  $.ajax({
    url: "ajax/landing_disenio.php?op=enviar_correo",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (e) {
      try {
        e = JSON.parse(e);  console.log(e);  
        if (e.status == true) {                  

          toastr_success('Enviado!!', 'Redirecionando');
          $(location).attr("href", "correo_enviado.php");

        } else {
          ver_errores(e);
        }
      } catch (err) { console.log('Error: ', err.message); toastr_error("Error temporal!!",'Puede intentalo mas tarde, o comuniquese con:<br> <i><a href="tel:+51921305769" >921-305-769</a></i> ─ <i><a href="tel:+51921487276" >921-487-276</a></i>', 700); }      

      $("#guardar_registro_correo").html('Enviar').removeClass('disabled send-data');
    },    
    beforeSend: function () {
      $("#guardar_registro_correo").html('<i class="fas fa-spinner fa-pulse fa-lg"></i>').addClass('disabled send-data');      
    },
    complete: function () {
      
    },
    error: function (jqXhr) { ver_errores(jqXhr); },
  });
}

// .....::::::::::::::::::::::::::::::::::::: V A L I D A T E   F O R M  :::::::::::::::::::::::::::::::::::::::..

$(function () {
  
  $("#form-agregar-correo").validate({
    ignore: "",
    rules: { 
      nombres_apellidos:  { required: true, minlength:5, maxlength:100 },
      telefono:           { required: true, number: true, minlength:2, maxlength:9 },      
    },
    messages: {
      nombres_apellidos:	{ required: "Campo requerido",  minlength:"Minimo {0} caracteres", maxlength:"Maximo {0} caracteres"  },
      telefono:           { required: "Campo requerido",  minlength:"Minimo {0} caracteres", maxlength:"Maximo {0} caracteres" },      
    },
        
    errorElement: "span",

    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },

    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },

    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid").addClass("is-valid");   
    },
    submitHandler: function (e) {
      $(".modal-body").animate({ scrollTop: $(document).height() }, 600); // Scrollea hasta abajo de la página
      guardar_y_editar_correo(e);      
    },
  });
  
});