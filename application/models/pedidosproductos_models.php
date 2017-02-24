<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidosproductos_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }


  function insertar($data1,$data2,$data3,$ip,$registro){  


      $this->db->insert('pedidosproductos',array('idPedido' => $ip,
       'cantidad'=>$data3,
       'precio'=>$data2,
       'idSubproductos'=>$data1,
       'registro'=>$registro
       ));
    }


     function updateCantidad($id, $cantidad) {
              $data = array(
             'cantidad' => $cantidad
              );
             $this->db->where('idPedidosProductos', $id);
             return $this->db->update('pedidosproductos', $data);
        }

        function eliminar($id)
        {
          $this->db->where('idPedidosProductos', $id);
          return $this->db->delete('pedidosproductos');
        }

     function buscar($ip){
     $this->db->where('idPedido',$ip);
     $query = $this->db->get('pedidosproductos');
     return $query;
   } 

    function buscarCantidad($idpedido){
     $this->db->where('idPedidosProductos', $idpedido);
     $query = $this->db->get('pedidosproductos');
     $row = $query->row(); 
     return $row->cantidad;
   } 


   function mostrarCompra($ip){


      $query = $this->db->query("SELECT 
    pe.idPedidosProductos AS idPedidosproductos,
    p.Nombre AS Nombre,
    s.Descripcion AS descr,
    pe.cantidad AS cantidad,
    pe.precio AS precio,
    (SELECT 
            i.url
        FROM
            imagenes i
        WHERE
            i.idProducto = p.idProducto
        LIMIT 1) AS url
FROM
    subproductos s,
    pedidosproductos pe,
    producto p
WHERE
    pe.idSubproductos = s.idSubproductos
        AND s.idProducto = p.idProducto
        AND pe.idPedido = '$ip'
GROUP BY pe.idPedidosProductos");


     return $query;
   }

    function ContarCompras($ip){

     $SQL="SELECT 
    sum(cantidad) as suma
FROM
    pedidosproductos
where
    idPedido = '$ip'";
      $query = $this->db->query($SQL);
      $row = $query->row(); 
    
      return $row->suma;
   }

   function ContarProducto($ip,$idProducto){

     $SQL="SELECT 
    *
FROM
    pedidosproductos
where
    idPedido = '$ip'
        and idSubproductos = '$idProducto'";

    
      $query = $this->db->query($SQL);
      $vlor="";
      if($query->num_rows() > 0){
        $row = $query->row(); 
        $vlor=$row->idPedidosProductos;
       }
     
      return $vlor;
   }
}

