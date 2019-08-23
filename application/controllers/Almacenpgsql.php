<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
use RestServer\libraries\REST_Controller;

class Almacenpgsql extends REST_Controller {

	//constructor para inicializar Db
	public function __construct(){

		// CONTROLLER HEADERS
		   header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    header("Access-Control-Allow-Origin: *");

		parent::__construct();
		$this->load->database('pgsql_db');
	}

	// TEST POSTGRES : http://localhost/API_wordpress/index.php/prueba/obtener_datos
	public function getData_get(){

	$query = $this->db->query("select
    Inv.documentno as numeroFactura,
    Br.name as nombreVendedor,
    Inv.created as FechaEmisionFactura,
    Inv.em_sswh_expirationdate as fechaCaducidadFactura,
    Inv.ispaid as Pagado,
    Inv.totallines as TotalFactura
    from c_invoice as Inv
    inner join c_bpartner as Br
    on Inv.c_bpartner_id = Br.c_bpartner_id
    where Br.isvendor= 'N'
    and ispaid = 'Y'");

    $data = $query->result_array();
   
	$this->response( $data); 

}


}
