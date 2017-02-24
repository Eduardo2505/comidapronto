<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminvendedor extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('sucursal_models');
        $this->load->library('pagination');
    }

    public function perfil() {

        session_start();

        if (isset($_SESSION["idSucursal"])) {
            $uri_segment = 0;
            $limite = 10;
            $palabra = "op";
            $offset = $this->input->get('per_page');


            if ($offset == "") {
                $offset = 0;
            }
            $data['sucursales'] = $this->sucursal_models->getMostrarlimit($offset, $limite);
            $query = $this->sucursal_models->getMostrar();
            $config['base_url'] = base_url() . 'adminvendedor/perfil?string=' . $palabra; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $query;
            $config['per_page'] = $limite; //Número de registros mostrados por páginas
            $config['num_links'] = 3; //Número de links mostrados en la paginación
            $config['first_link'] = 'Primera'; //primer link
            $config['last_link'] = 'Ultima'; //último link
            $config["uri_segment"] = $uri_segment; //el segmento de la paginación+
            $config['page_query_string'] = true;
            //$config['use_page_numbers'] = true;
            $config['next_link'] = 'Siguiente'; //siguiente link
            $config['prev_link'] = 'Anterior'; //anterior link
            $config['full_tag_open'] = '<ul class="pagination pull-right">'; //el div que debemos maquetar
            $config['full_tag_close'] = ' </ul>'; //el cierre del div de la paginació

            $config['cur_tag_open'] = '<li><a  style="background-color:#E1E1E1;" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';


            $this->pagination->initialize($config); //inicializamos la paginación        
            $data["pagination"] = $this->pagination->create_links();

            $this->load->view('adminvendedor/perfil', $data);
        } else {
            redirect(site_url(''), 'refresh');
        }
    }

    public function contrasena() {
        session_start();

        if (isset($_SESSION["idSucursal"])) {
            $data['sucursal'] = $_SESSION["idSucursal"];
            $this->load->view('adminvendedor/contrasena', $data);
        } else {
            redirect(site_url(''), 'refresh');
        }
    }

    public function productos() {
        $this->load->model('producto_models');
        session_start();
        $idsucurs = $_SESSION["idSucursalActivax"];


        $uri_segment = 0;
        $limite = 10;
        $palabra = "op";
        $offset = $this->input->get('per_page');


        if ($offset == "") {
            $offset = 0;
        }
        $data['productos'] = $this->producto_models->getproductoslim($idsucurs, $offset, $limite);
        $query = $this->producto_models->getproductos($idsucurs);
        $config['base_url'] = base_url() . 'adminvendedor/productos?string=' . $palabra; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $query;
        $config['per_page'] = $limite; //Número de registros mostrados por páginas
        $config['num_links'] = 3; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera'; //primer link
        $config['last_link'] = 'Ultima'; //último link
        $config["uri_segment"] = $uri_segment; //el segmento de la paginación+
        $config['page_query_string'] = true;
        //$config['use_page_numbers'] = true;
        $config['next_link'] = 'Siguiente'; //siguiente link
        $config['prev_link'] = 'Anterior'; //anterior link
        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //el div que debemos maquetar
        $config['full_tag_close'] = ' </ul>'; //el cierre del div de la paginació

        $config['cur_tag_open'] = '<li><a  style="background-color:#E1E1E1;" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';


        $this->pagination->initialize($config); //inicializamos la paginación        
        $data["pagination"] = $this->pagination->create_links();


        $this->load->view('adminvendedor/productos', $data);
    }

    //############################
    public function updatePassword() {

        // $this->load->model('sucursal_models'); 
        $idSuculsa = $this->input->post('idSucursal');
        $contrasenaactual = $this->input->post('contrasenaactual');
        $contrasenanueva = $this->input->post('contrasenanueva');
        $resul = $this->sucursal_models->comprobarContrasena($idSuculsa, $contrasenaactual);
        //echo $resul->num_rows();
        if ($resul->num_rows() > 0) {
            $data = array('contrasena' => $contrasenanueva);
            $this->sucursal_models->update($idSuculsa, $data);
        } else {

            echo "Erro";
        }
    }

    //##############################
    public function producto() {


        session_start();

        if (isset($_SESSION["idSucursal"])) {

            $idsucurs = $_SESSION["idSucursalActivax"];
            $_SESSION["opAct"] = "Nuevo";
            $this->load->model('categoria_models');
            $data['categoria'] = $this->categoria_models->getCategoriasSucursal($idsucurs);
            echo $idsucurs;
            $this->load->view('adminvendedor/nuevoproducto', $data);
        } else {
            redirect(site_url(''), 'refresh');
        }
    }

// eliminar producto
    public function deleteproducto() {
        $this->load->model('producto_models');
        $id = $this->input->get('idProducto');
        $erro = $this->producto_models->delete($id);
    }

    //############ Producto ##################
    public function agregarproducto() {

        $this->load->view('adminvendedor/nuevoproducto');
    }

    //#############################
    public function salir() {
        session_start();
        // remove all session variables
        session_unset();

        // destroy the session 
        session_destroy();
        redirect(site_url(''), 'refresh');
    }

    public function UpdateDatos() {

        $id = $this->input->post('idSucursal');
        $data = array('Sucursal' => $this->input->post('empresa'),
            'direccion' => $this->input->post('dir'),
            'delgSucursal' => $this->input->post('delg'),
            'colSucursal' => $this->input->post('col'),
            'Numero' => $this->input->post('numext'),
            'telefono' => $this->input->post('tel'),
            'cp' => $this->input->post('cp'),
            'email' => $this->input->post('email'),
            'Nombre' => $this->input->post('nombre'),
            'Apellido' => $this->input->post('apellido'),
            'idCadena' => $this->input->post('cadena'),
            'pais_idpais' => $this->input->post('pais'),
            'palabrasClaves' => trim($this->input->post('palabras')),
            'pagoenLinea' => $this->input->post('paglin'),
            'envioGratis' => $this->input->post('pgraris'),
            'disponiblerecoger' => $this->input->post('disrecoger'),
            'aceptobonos' => $this->input->post('bonos'),
            'EntregaAprox' => $this->input->post('aprixima'),
            'costoenvio' => $this->input->post('costo'),
            'pedidominimo' => $this->input->post('pedidominimo'),
            'promociones' => $this->input->post('promociones'),
            'Frases' => trim($this->input->post('fraces')));
        $this->sucursal_models->update($id, $data);
        echo $id;
    }

    public function mostraimgen() {
        session_start();
        $id = $_SESSION["idSucursal"];
        // $this->load->model('sucursal_models');          
        $sucursal = $this->sucursal_models->buscar($id);
        $row = $sucursal->row_array();
        echo $row['url'];
    }

}
