<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clasificacion_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function getClasificacion(){
     $this->db->where('estado',1); 
     $query = $this->db->get('clasificacion');
     return $query;
    
   } 
           

 
}