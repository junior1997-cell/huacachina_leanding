$(document).ready(function () {

  mostrar_detalle();  

  // ══════════════════════════════════════ G U A R D A R   F O R M ══════════════════════════════════════
  
});

function mostrar_detalle() {
  $.post("ajax/landing_disenio.php?op=mostrar_data",  function (e, status) {
    e = JSON.parse(e); console.log(e);
    if (e.status == true) {      

      // ::::::::::::::::::::: FONDO :::::::::::::::::::::
      
      $('body').css({
        'background': `linear-gradient(to bottom, rgba(2, 32, 14, 0.863), rgba(2, 32, 14, 0.863)), 
        url("https://adminlanding.huacachinadelnorte.pe/assets/modulo/landing_disenio/${e.data.disenio.fe_img_fondo}")`,   
        'background-size': 'cover',
        'background-position': 'center'     
      });      

      // ::::::::::::::::::::: TITULOS :::::::::::::::::::::
     
      $('.landing-titulo').html(` ${e.data.disenio.fe_titulo}` );      
      $('.landing-descripcion').html(` ${e.data.disenio.fe_descripcion}` );        

      // ::::::::::::::::::::: CONTACTANOS :::::::::::::::::::::
      $('.landing-facebook').attr('href', `${e.data.empresa.rs_facebook}`);
      $('.landing-instagram').attr('href', `${e.data.empresa.rs_instagram}`);
      $('.landing-whatsapp').attr('href', `https://api.whatsapp.com/send?phone=+51${e.data.empresa.celular}&text=*Hola buenos dias, vengo de tu pagina web!!*`);  
      $('.landing-grupo-whatsapp').attr('href', `${e.data.empresa.link_grupo_whats}`);  
      
    } else {
      ver_errores(e);
    }
  }).fail(function (e) { ver_errores(e); });
}
