<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  function insertar($data){   
        $this->db->insert('producto',$data);
    }

  function gerarId(){   
   $query = $this->db->query("SELECT CURDATE() + 0 as fecha,(select count(*)+1 from producto) as total");//limit 0,20
   $row = $query->row(); 
   $folio= $row->fecha."".$row->total;     
   return $folio;
       }

 function getproductos($idSucursal){
     $query = $this->db->query("SELECT * 
FROM
    producto p,
    subcategoria s,
    categorias cte,
    sucursal su,
    categoriasubcate ct
WHERE
    ct.idCategoriaSubcate = p.idCategoriaSubcate
        and ct.idCategorias = cte.idCategorias
        and ct.idSubcategoria = s.idSubcategoria
        and p.idSucursal = su.idSucursal
        AND p.idSucursal like '%$idSucursal%'");//
     return $query->num_rows();
    
   }
    function getproductoslim($idSucursal,$offset, $limite){
     $query = $this->db->query("SELECT 
    p.idProducto id,
    p.Nombre AS nombre,
    p.Descripcion AS descripcion,
    cte.Nombre as categoria,
    (SELECT 
            i.url
        FROM
            imagenes i
        where
            i.idProducto = p.idProducto
        limit 1) as img,
    s.Nombre as subcategoria,
    (SELECT 
            concat(s.Descripcion, ' $ ', s.precio)
        FROM
            subproductos s
        where
            s.idProducto = p.idProducto
        limit 1) as precio,
    su.Sucursal sucursal
FROM
    producto p,
    subcategoria s,
    categorias cte,
    sucursal su,
    categoriasubcate ct
WHERE
    ct.idCategoriaSubcate = p.idCategoriaSubcate
        and ct.idCategorias = cte.idCategorias
        and ct.idSubcategoria = s.idSubcategoria
        and p.idSucursal = su.idSucursal
        AND p.idSucursal like '%$idSucursal%' limit $offset,$limite");//
     return $query;
    
   } 

     function delete($id){   
        
        $this->db->where('idProducto', $id);
        return $this->db->delete('producto');
    }

    function buscar($id){ 


      $sSQL="SELECT 
    p.idProducto id,
    p.Nombre AS nombre,
    p.Descripcion AS descripcion,
    s.Nombre as subcategoria,
    cte.Nombre as categoria,
    s.idSubcategoria as idSubcategoria,
    cte.idCategorias as idCategoria
FROM
    producto p,
    subcategoria s,
    categorias cte,
    categoriasubcate cs
WHERE
    s.idSubcategoria = cs.idSubcategoria
        and p.idCategoriaSubcate = cs.idCategoriaSubcate
        and cte.idCategorias = cs.idCategorias
        AND p.idProducto='$id'";

      $query = $this->db->query($sSQL);//limit 0,20
      return $query;
    }




  function update($id, $data) {

    $this->db->where('idProducto', $id);
    return $this->db->update('producto', $data);
  }
 


  function getProSucu($idSucursa,$idCategoria,$idsub){
    $query = $this->db->query("SELECT 
    p.idProducto id,
    p.Nombre AS nombre,
    p.Descripcion AS descripcion,
    cte.Nombre as categoria,
    (SELECT 
            i.url
        FROM
            imagenes i
        where
            i.idProducto = p.idProducto
        limit 1) as img,
    s.Nombre as subcategoria,
    s.idSubcategoria as idsub,
    (SELECT 
            s.precio
        FROM
            subproductos s
        where
            s.idProducto = p.idProducto
        limit 1) as precio,
    (SELECT 
            s.Descripcion
        FROM
            subproductos s
        where
            s.idProducto = p.idProducto
        limit 1) as desc2
FROM
    producto p,
    subcategoria s,
    categorias cte,
    categoriasubcate cs
WHERE
    p.idCategoriaSubcate = cs.idCategoriaSubcate
        and s.idSubcategoria = cs.idSubcategoria
        and cte.idCategorias = cs.idCategorias
        AND p.idSucursal = '$idSucursa'
        and cte.idCategorias = '$idCategoria'
        and s.idSubcategoria = '$idsub'
group by p.idProducto");//limit 0,20
         return $query;
        
       }
}