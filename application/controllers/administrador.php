<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrador extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function perfil() {
        $this->load->view('admin/perfil');
    }

    public function envio() {
        $this->load->view('admin/envio');
    }

    public function contrasena() {
        $this->load->view('admin/contrasena');
    }

    public function compras() {
        $this->load->view('admin/compras');

        //echo $id;
    }

    public function salir() {
        session_start();
        // remove all session variables
        session_unset();

        // destroy the session 
        session_destroy();
        redirect(site_url(''), 'refresh');
    }

}
