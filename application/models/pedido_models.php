<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

//### insertar compuesto productos
    function insertar($datos){  
   
      $this->db->insert('pedido',$datos);
    }


function buscar($id){
   
     $this->db->where('idPedido', $id);
     $query = $this->db->get('pedido');
     return $query;
    
   } 


   //paypalproductos
   

   
    function updateConfirmacion($id, $data) {

    $this->db->where('idPedido', $id);
    return $this->db->update('pedido', $data);
  }

   



}