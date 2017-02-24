<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function update($id, $data) {

    $this->db->where('idCliente', $id);
    return $this->db->update('cliente', $data);
  }


  function insertar($data){   
        $this->db->insert('cliente',$data);
    }

function comprobaremail($email){
     $this->db->where('tipo_registro',"Registrado");
     $this->db->where('estado',"Activo");
     $this->db->where('email', $email);
     $query = $this->db->get('cliente');
     return $query;
    
   }
  function buscar($id){
   
     $this->db->where('idCliente', $id);
     $this->db->where('tipo_registro',"rapido");
     $this->db->where('estado', "Activo");
     $query = $this->db->get('cliente');
     return $query;
    
   } 
   function verificarClienteFre($email,$tel){
   
      $SQL="select 
    count(c.idCliente) as contar
from
    cliente c,
    diralternavitas d,
    pedido p
where
    c.idCliente = d.idCliente
        and p.idCliente = c.idCliente
        and c.email = '$email'
        and d.telefono = '$tel'
        and p.estado = 'Autorizado'";
      $query = $this->db->query($SQL);
      $row = $query->row(); 
    
      return $row->contar;
    
   } 
}