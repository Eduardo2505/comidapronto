<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diralternavitas_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function insertar($data){   
        $this->db->insert('diralternavitas',$data);
    } 


    function buscar($id){
     $this->db->where('idCliente', $id);
     $query = $this->db->get('diralternavitas');
     return $query;
    
   } 
   function buscararary($array){
      $this->db->where($array); 
     $query = $this->db->get('diralternavitas');
     return $query;
    
   } 
   function buscardir($id){
     $this->db->where('iddiralternavitas', $id);
     $query = $this->db->get('diralternavitas');
     return $query;
    
   } 
 
}