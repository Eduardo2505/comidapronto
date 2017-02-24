<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }
function getmarca($idsubcategoria){
     $this->db->where('estado',1); 
     $this->db->where('idSubcategoria',$idsubcategoria); 
     $query = $this->db->get('modelo');
     return $query;
    
   } 
 
}