<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Colonias_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function getMostrar($cp){
     
     $this->db->where('CP',$cp);
     $query = $this->db->get('colonias');
     return $query;
    
   }
    function getBuscar($id){
     
     $this->db->where('idColonias',$id);
     $query = $this->db->get('colonias');
     return $query;
    
   }  

 
}