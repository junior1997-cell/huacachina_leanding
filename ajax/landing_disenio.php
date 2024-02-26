<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
ob_start();
  //Load Composer's autoloader
  require '../vendor/autoload.php';
    
  require_once "../modelos/Landing_disenio.php";

  $landing_disenio  = new Landing_disenio();
  
  date_default_timezone_set('America/Lima');  $date_now = date("d_m_Y__h_i_s_A");
  $toltip = '<script> $(function () { $(\'[data-toggle="tooltip"]\').tooltip(); }); </script>';
  $scheme_host =  ($_SERVER['HTTP_HOST'] == 'localhost' ? 'http://localhost/front_jdl/admin/' :  $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].'/');

  // :::::::::::::::::::::::::::::::::::: D A T O S   D I S E N I O ::::::::::::::::::::::::::::::::::::::
  $idlanding_disenio       = isset($_POST["idlanding_disenio"]) ? limpiarCadena($_POST["idlanding_disenio"]) : "";

  $titulo       = isset($_POST["titulo"]) ? limpiarCadena($_POST["titulo"]) : "";
  $descripcion  = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
  $imagen       = isset($_POST["doc1"]) ? limpiarCadena($_POST["doc1"]) : "";


  // :::::::::::::::::::::::::::::::::::: D A T O S  C O R R E O ::::::::::::::::::::::::::::::::::::::
  $nombres_apellidos  = isset($_POST["nombres_apellidos"]) ? limpiarCadena($_POST["nombres_apellidos"]) : "";
  $telefono           = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
  
  switch ($_GET["op"]) {   
    
    // :::::::::::::::::::::::::: S E C C I O N   D I S E N I O   ::::::::::::::::::::::::::
    case 'mostrar_data':
      $rspta = $landing_disenio->mostrar_data();
      echo json_encode($rspta, true);
    break;       
  
    /* ══════════════════════════════════════ C O R R E O   ══════════════════════════════════ */        
      
    case 'enviar_correo':
      
      
      $rspta_c = $landing_disenio->crear_correo( $nombres_apellidos,$telefono);
      $rspta_e = $landing_disenio->mostrar_data( );
      
      // Info del correo
      $link_facebook  = $rspta_e['data']['empresa']['rs_facebook'];
      $link_instagram = $rspta_e['data']['empresa']['rs_instagram'];
      $link_celular   = $rspta_e['data']['empresa']['celular'];
      $link_correo    = $rspta_e['data']['empresa']['correo'];
      $link_whatsapp  = "https://api.whatsapp.com/send?phone=+51".$rspta_e['data']['empresa']['celular']."&text=*Hola buenos dias, vengo de tu pagina web!!*";

      $titulo_correo  = $rspta_e['data']['disenio']['f_titulo'];

      if ($rspta_c['status'] == true) {         
      
        //Importar clases PHPMailer en el espacio de nombres global
        //Estos deben estar en la parte superior de su secuencia de comandos, no dentro de una función        

        //Crear una instancia; pasar `true` permite excepciones
        $mail = new PHPMailer(true);

        try {
          //Configuración del servidor
          $mail->SMTPDebug  = 0;                          # Habilitar salida de depuración detallada con: SMTP::DEBUG_SERVER | deshablita con: 0
          $mail->isSMTP();                                # Enviar usando SMTP
          $mail->CharSet    = 'UTF-8';                    # Habilita UTF-8
          $mail->Host       = 'smtp.gmail.com';           # Configurar el servidor SMTP para enviar a través
          $mail->SMTPAuth   = true;                       # Habilitar autenticación SMTP
          $mail->Username   = 'jdltechnology19@gmail.com'; # nombre de usuario SMTP
          $mail->Password   = 'nigfxgbtonebancl';         # Contraseña SMTP
          $mail->SMTPSecure = 'tls';                      # Habilitar el cifrado TLS implícito
          $mail->Port       = 587;                        # Puerto TCP para conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Destinatarios
          $mail->setFrom('jdltechnology19@gmail.com', 'Landing Page');              # Correo y nombre de empresa
          $mail->addAddress('marketing@huacachinadelnorte.pe', $nombres_apellidos); # Agregar un destinatario, El nombre es opcional
          // $mail->addAddress($correo_email, $nombre_email);                       # Agregar un destinatario, El nombre es opcional
          // $mail->addReplyTo('info@example.com', 'Information');                  # replicar envio
          // $mail->addCC('cc@example.com');                                        # otros destinatarios en copia (CC) 
          // $mail->addBCC('bcc@example.com');                                      # copia oculta (BCC)

          //Archivos adjuntos
          // $mail->addAttachment('/var/tmp/file.tar.gz');                          # Agregar archivos adjuntos
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');                     # Nombre opcional

          // llamamos a la plantilla
          $message = file_get_contents('../assets/correo/plantilla_correo_tours.html'); # Optenemos la plantilla
          $message = str_replace('%e_nombre_cliente%', $nombres_apellidos, $message);   # Agregar el nombre
          $message = str_replace('%e_telefono%', $telefono, $message);                  # Agregar el telefono

          $message = str_replace('%e_link_facebook%', $link_facebook, $message);     # Agregar el facebook
          $message = str_replace('%e_link_instagram%', $link_instagram, $message);   # Agregar el instagram
          $message = str_replace('%e_link_whatsapp%', $link_whatsapp, $message);     # Agregar el whatsapp
          $message = str_replace('%e_link_celular%', $link_celular, $message);       # Agregar el celular
          $message = str_replace('%e_link_correo%', $link_correo, $message);         # Agregar el correo

          //Content
          $mail->isHTML(true);                        # Establecer el formato de correo electrónico en HTML
          $mail->Subject = $titulo_correo;            # Titulo del Correo
          $mail->Body    = $message;                  # Cargamos el mensaje
          // $mail->AltBody = $mensaje_email;         # Cuerpo alternativo

          $mail->send();
          $rspta = ['status'=> true, 'message'=>'Correo enviado con exito', 'data'=>[]];
          echo json_encode($rspta);
        } catch (Exception $e) {          
          $rspta = ['status'=> 'error_personalizado', 'user'=>$nombres_apellidos, 'message'=>"El correo no se pudo enviar. Tenemos este error: {$mail->ErrorInfo}", 'data'=>[]];
          echo json_encode($rspta);
        }
      } else {
        echo json_encode($rspta);
      }
    break;
    

    default: 
      $rspta = ['status'=>'error_code', 'message'=>'Te has confundido en escribir en el <b>swich.</b>', 'data'=>[]]; echo json_encode($rspta, true); 
    break;
  }

ob_end_flush();
?>
