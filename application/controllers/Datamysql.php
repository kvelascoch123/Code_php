
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
use RestServer\libraries\REST_Controller;

class Datamysql extends REST_Controller {

	//constructor para inicializar Db
	public function __construct(){

		// CONTROLLER HEADERS
		   header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    header("Access-Control-Allow-Origin: *");

		parent::__construct();
		//$this->load->database();
		$this->load->database('mysql_db');

	}

// HTTP , consumir API...
	public function send_get(){

       //obtener data
        $user =file_get_contents('http://localhost/API_wordpress/index.php/prueba/obtener_datos');
        $someArray = json_decode($user, true); //transformar data
       // print_r($someArray);        // Dump all data of the Array
        //recorrer data   
        for ($i=0; $i < count($someArray) ; $i++) { 
            //insertar campos 
            $insertar = array('nombre'=> $someArray[$i]["nombre"],
                              'detalle' => $someArray[$i]["valorUn"]);
            $this->db->insert('users_test', $insertar);
        
        }

}



public function test_get(){
     // JSON string
  $someJSON = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';

  // Convert JSON string to Array
  $someArray = json_decode($someJSON, true);
  print_r($someArray);        // Dump all data of the Array
  echo $someArray[0]["name"]; // Access Array data

  // Convert JSON string to Object
  $someObject = json_decode($someJSON);
  print_r($someObject);      // Dump all data of the Object
  echo $someObject[0]->name; // Access Object data

}
}

//CODIGOS DE AYUDA
    // ****FORMAR UN FICHERO ********
/*
      $fichero = 'fichero.json';
      $actual = file_get_contents($fichero);
      file_put_contents($fichero, $valor);
*/


   // *** INSERT EXPLODE , ****
     /*   $str = 'one,two,three,four';
        $items = explode(',', $str);
        foreach ($items as &$key) {
            $insertar = array('nombre'=> $key);
            $this->db->insert('users_test', $insertar);
        }
        */

    //******INSERT EXPLODE CON FOREACH KEY VALUE */
/*

$data="How to ,split a ,string ,using explode";
$splittedstring=explode(" ,",$data);
foreach ($splittedstring as $key => $value) {
echo "splittedstring[".$key."] = ".$value."<br>";
 $insertar = array('nombre'=> $key, 'detalle' => $value);
 $this->db->insert('users_test', $insertar);
*/

