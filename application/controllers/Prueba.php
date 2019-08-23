<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
use RestServer\libraries\REST_Controller;

class Prueba extends REST_Controller {

	//constructor para inicializar Db
	public function __construct(){

		// CONTROLLER HEADERS
		   header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    header("Access-Control-Allow-Origin: *");

		parent::__construct();
		$this->load->database();
	}

	public function index(){
		echo "Hola Prueba";
	}


 // TEST POSTGRES : http://localhost/API_wordpress/index.php/prueba/obtener_datos
	public function obtener_datos_get(){

	$query = $this->db->query('SELECT * FROM users');
	
    $data = $query->result_array();
   
	$this->response( $data); // mismo formato JSON

}


}
