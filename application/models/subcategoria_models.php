<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subcategoria_models extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getSubCatagorias($idCategoria) {
        $query = $this->db->query("SELECT 
    cte.idCategoriaSubcate, s.idSubcategoria, s.Nombre
FROM
    subcategoria s,
    categoriasubcate cte
where
    s.idSubcategoria = cte.idSubcategoria
        and cte.idCategorias = '$idCategoria'"); //limit 0,20
        return $query;
    }

    function verlimit($idSucursal, $offset, $limite) {
        $this->db->where('idSucursal', $idSucursal);
        $this->db->where('estado', 1);
        $this->db->limit($limite, $offset);
        $query = $this->db->get('subcategoria');
        return $query;
    }
    function verls($idSucursal) {
        $this->db->where('idSucursal', $idSucursal);
        $this->db->where('estado', 1);      
        $query = $this->db->get('subcategoria');
        return $query;
    }

    function ver($idSucursal) {
        $this->db->where('idSucursal', $idSucursal);
        $this->db->where('estado', 1);
        $query = $this->db->get('subcategoria');
        return $query->num_rows();
    }

    function insertar($data) {
        $this->db->insert('subcategoria', $data);
    }

    function update($id, $data) {

        $this->db->where('idSubcategoria', $id);
        return $this->db->update('subcategoria', $data);
    }

    function buscar($id) {

        $this->db->where('idSubcategoria', $id);
        $query = $this->db->get('subcategoria');
        return $query;
    }

    function buscarSucur($id, $idSucursal) {

        $this->db->where('idSubcategoria', $id);
        $this->db->where('idSucursal', $idSucursal);
        $query = $this->db->get('subcategoria');
        return $query;
    }

    function delete($id) {

        $this->db->where('idSubcategoria', $id);
        return $this->db->delete('subcategoria');
    }

    function getsuCategoriasSucursal($idSucursa, $idCategoria) {
        $query = $this->db->query("SELECT 
    cte.idCategorias as idcategoria,
    cte.Nombre as categoria,
    s.Nombre as sub,
    s.idSubcategoria as idsub
FROM
    subcategoria s,
    categorias cte,
    categoriasubcate cs
WHERE
    s.idSubcategoria = cs.idSubcategoria
        and cte.idCategorias = cs.idCategorias
        AND cte.idSucursal = '$idSucursa'
        and cte.idCategorias = '$idCategoria'
group by s.idSubcategoria order by cs.posicion"); //limit 0,20
        return $query;
    }

    function getsuCategoriasSucursalxlimit($idSucursa, $offset, $limite) {
        $query = $this->db->query("SELECT 
    s.Nombre as Nombre,
    cte.Nombre as categoria,
    s.Descripcion as Descripcion,
    s.idSubcategoria as idSubcategoria,
    subcte.idCategoriaSubcate as idcatesub,
    s.url as img,subcte.posicion posicion,subcte.idCategoriaSubcate   
FROM
    subcategoria s,
    categorias cte,
    categoriasubcate subcte
WHERE
    cte.idCategorias = subcte.idCategorias
        and subcte.idSubcategoria = s.idSubcategoria
        AND s.idSucursal = '$idSucursa' order by subcte.posicion  limit $offset,$limite "); //
        return $query;
    }

    function getsuCategoriasSucursalx($idSucursa) {
        $query = $this->db->query("SELECT 
    s.Nombre as Nombre,
    cte.Nombre as categoria,
    s.Descripcion as Descripcion,
    s.idSubcategoria as idSubcategoria,
    subcte.idCategoriaSubcate as idcatesub,
    s.url as img
FROM
    subcategoria s,
    categorias cte,
    categoriasubcate subcte
WHERE
    cte.idCategorias = subcte.idCategorias
        and subcte.idSubcategoria = s.idSubcategoria
        AND s.idSucursal = '$idSucursa' "); //
        return $query->num_rows();
    }

}