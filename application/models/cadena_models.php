<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadena_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function getMostrar(){
     $this->db->where('estado',1); 
     $query = $this->db->get('cadena');
     return $query;
    
   } 
function getCadenasActivas(){
	$SQL="SELECT 
    c.idCadena as idCadena, c.Nombre as Nombre
FROM
    sucursal s,
    cadena c
where
    s.idCadena = c.idCadena";
    $query = $this->db->query($SQL);//limit 0,20
         return $query;
        
       } 
 
}