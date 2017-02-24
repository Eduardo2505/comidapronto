<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categoriasubcate_models extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function buscar($id) {

        $this->db->where('idCategoriaSubcate', $id);
        $query = $this->db->get('categoriasubcate');
        return $query;
    }

    function insertar($data) {
        $this->db->insert('categoriasubcate', $data);
    }

    function delete($id) {

        $this->db->where('idCategoriaSubcate', $id);
        return $this->db->delete('categoriasubcate');
    }

    function update($id, $data) {

        $this->db->where('idCategoriaSubcate', $id);
        return $this->db->update('categoriasubcate', $data);
    }

}