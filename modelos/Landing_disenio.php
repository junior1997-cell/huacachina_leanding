<?php
require "../config/Conexion_v2.php";

class Landing_disenio
{
  //Implementamos nuestro variable global
  public $id_usr_sesion;

  //Implementamos nuestro constructor
  public function __construct($id_usr_sesion = 0)
  {
    $this->id_usr_sesion = $id_usr_sesion;
  }

  public function mostrar_data(){
		$sql="SELECT * FROM nosotros WHERE idnosotros = '1' AND estado = '1' AND estado_delete = '1';";
		$empresa = ejecutarConsultaSimpleFila($sql); if ($empresa['status'] == false) { return $empresa; }

    $sql="SELECT * FROM landing_disenio WHERE idlanding_disenio = '1' AND estado = '1' AND estado_delete = '1';";
		$disenio = ejecutarConsultaSimpleFila($sql); if ($disenio['status'] == false) { return $disenio; }

    $results = [
      "status" => true,
      "data" => [
        "disenio" => $disenio['data'] ,
        "empresa" => $empresa['data'] ,        
      ],
      "message"=> 'Todo oka'
    ];
    return $results;
	}
  
}
