<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categoria_models extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getCatagoriaslimit($idSurcal,$offset,$limite) {
        $this->db->limit($limite,$offset);
        $this->db->where('estado', 1);
        $this->db->order_by("posicion", "asc"); 
        $this->db->where('idSucursal', $idSurcal);
        $query = $this->db->get('categorias');
        return $query;
    }

    function getCatagorias($idSurcal) {
        $this->db->where('estado', 1);
        $this->db->where('idSucursal', $idSurcal);
        $query = $this->db->get('categorias');
        return $query->num_rows();
    }
    
     function getCatagoriaslist($idSurcal) {
        $this->db->where('estado', 1);
        $this->db->where('idSucursal', $idSurcal);
        $query = $this->db->get('categorias');
        return $query;
    }

    function verCatagorias() {
        $this->db->where('estado', 1);
        $query = $this->db->get('categorias');
        return $query;
    }

    function insertar($data) {
        $this->db->insert('categorias', $data);
    }

    function update($id, $data) {

        $this->db->where('idCategorias', $id);
        return $this->db->update('categorias', $data);
    }

    function buscar($id) {

        $this->db->where('idCategorias', $id);

        $query = $this->db->get('categorias');
        return $query;
    }

    function buscarx($id, $sucursales) {

        $this->db->where('idCategorias', $id);
        $this->db->where('idSucursal', $sucursales);
        $query = $this->db->get('categorias');
        return $query;
    }

    function delete($id) {

        $this->db->where('idCategorias', $id);
        return $this->db->delete('categorias');
    }

    function getCategoriasSucursal($idSucursa) {
        $sql="SELECT 
    cte.idCategorias as idcategoria,
    cte.Nombre as categoria,
    cte.url as url,
    s.Nombre as sub
FROM
    subcategoria s,
    categorias cte,
    categoriasubcate cs
WHERE
    s.idSubcategoria = cs.idSubcategoria
        and cte.idCategorias = cs.idCategorias
        AND cte.idSucursal = '$idSucursa'
group by cte.idCategorias order by cte.posicion";
        $query = $this->db->query($sql); //limit 0,20
        
        echo $sql;
        return $query;
    }

}