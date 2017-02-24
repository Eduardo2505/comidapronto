<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ingresar extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index() {
        $this->load->view('Ingresar');
    }

    public function login() {
        $this->load->model('sucursal_models');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $sucursal = $this->sucursal_models->login($email, $pass);
        if ($sucursal->num_rows() > 0) {
            $row = $sucursal->row_array();
            session_start();
            $_SESSION["idSucursal"] = $row['idSucursal'];
        } else {
            echo "Error";
        }
    }

    public function loginmovil() {
        $this->load->model('sucursal_models');
        $email = $this->input->get('email');
        $pass = $this->input->get('pass');
        $sucursal = $this->sucursal_models->login($email, $pass);
        if ($sucursal->num_rows() > 0) {
            $row = $sucursal->row_array();

            $response = array(
                'logged' => true,
                'name' => $row['idSucursal'],
                'email' => $row['email']
            );
            echo json_encode($response);
        } else {
            $response = array(
                'logged' => false,
                'message' => 'Verifique Usuario'
            );
            echo json_encode($response);
        }
    }

}
