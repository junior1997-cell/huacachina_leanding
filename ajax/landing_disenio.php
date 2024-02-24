<?php
ob_start();
    
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
  
  
  switch ($_GET["op"]) {   
    
    // :::::::::::::::::::::::::: S E C C I O N   D I S E N I O   ::::::::::::::::::::::::::
    case 'mostrar_data':
      $rspta = $landing_disenio->mostrar_data();
      echo json_encode($rspta, true);
    break;       
  
    // :::::::::::::::::::::::::: S E C C I O N   _ _ _ _ _ _  :::::::::::::::::::::::::: 
    

    default: 
      $rspta = ['status'=>'error_code', 'message'=>'Te has confundido en escribir en el <b>swich.</b>', 'data'=>[]]; echo json_encode($rspta, true); 
    break;
  }

ob_end_flush();
?>
