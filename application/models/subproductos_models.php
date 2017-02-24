<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subproductos_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  function insertar($data){   
        $this->db->insert('subproductos',$data);
    }

    function gerarId(){   
   $query = $this->db->query("SELECT CURDATE() + 0 as fecha,(select count(*)+1 from subproductos) as total");//limit 0,20
   $row = $query->row(); 
   $folio= $row->fecha."".$row->total;     
   return $folio;
       }

 function getsubProductos($idproducto){
     
     $this->db->where('idProducto',$idproducto); 
     $query = $this->db->get('subproductos');
     return $query;
    
   } 
 

   function update($id, $data) {

    $this->db->where('idSubproductos', $id);
    return $this->db->update('subproductos', $data);
  }

    function delete($id){   
        
        $this->db->where('idSubproductos', $id);
        return $this->db->delete('subproductos');
    }
}