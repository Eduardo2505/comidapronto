<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pais_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function getMostrar(){
     
     $query = $this->db->get('pais');
     return $query;
    
   }   

 
}