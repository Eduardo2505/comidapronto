<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Colsucural_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function Comprobarcol($idSucursal,$idColonia){
     $this->db->where('idColonias',$idColonia);
     $this->db->where('idSucursal',$idSucursal);
     $query = $this->db->get('colsucural');
     return $query;
    }
   
 
}