<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagenes_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function update($id, $data) {

    $this->db->where('idSucursal', $id);
    return $this->db->update('imagenes', $data);
  }


  function insertar($data){   
        $this->db->insert('imagenes',$data);
    }

   
   function getimagenes($idproducto){
     
     $this->db->where('idProducto',$idproducto); 
     $query = $this->db->get('imagenes');
     return $query;
    
   } 
 

    function delete($id){   
        
        $this->db->where('idimagenes', $id);
        return $this->db->delete('imagenes');
    }
}