<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sucursales extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->model('cadena_models');
        $this->load->model('pais_models');
        $this->load->model('sucursal_models');
        $this->load->model('funciones_models');
    }

    public function registro() {
        $data['cadena'] = $this->cadena_models->getMostrar();
        $data['pais'] = $this->pais_models->getMostrar();
        $this->load->view('admin/registro_sucursal', $data);
    }

    public function filtroColonias() {
        $data['cadena'] = $this->cadena_models->getMostrar();
        $data['pais'] = $this->pais_models->getMostrar();
        $data['delegacion'] = $this->input->get('delegacion');
        $this->load->helper('xml');
        $xmlRaw = file_get_contents("" . site_url('') . "resourceadmin/infodirecciones.xml");
        $this->load->library('simplexml');
        $xmlData = $this->simplexml->xml_parse($xmlRaw);
        $data["xmlData"] = $xmlData;
        $this->load->view('admin/coloniasfiltro_viwer', $data);
    }

    public function filtrocp() {
        $data['cadena'] = $this->cadena_models->getMostrar();
        $data['pais'] = $this->pais_models->getMostrar();
        $data['delegacion'] = $this->input->get('delegacion');
        $data['colonia'] = $this->input->get('colonia');
        $this->load->helper('xml');
        $xmlRaw = file_get_contents("" . site_url('') . "resourceadmin/infodirecciones.xml");
        $this->load->library('simplexml');
        $xmlData = $this->simplexml->xml_parse($xmlRaw);
        $data["xmlData"] = $xmlData;
        $this->load->view('admin/cpfiltro_viwer', $data);
    }

    public function guardar() {


        $fecha = time();
        $id = date("ymdhis", $fecha);
        $reg = date("Y-m-d H:i:s", $fecha);
        $email = $this->input->post('email');
        $nombres = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $notifiaciones = 'Aceptar';
        $var = rand();
        $idSucursalger = $this->funciones_models->sanear_string($this->input->post('empresa'));
        $data = array('idSucursal' => $idSucursalger,
            'Sucursal' => $this->input->post('empresa'),
            'telefono' => $this->input->post('tel'),
            'email' => $email,
            'estado' => 1,
            'url' => 'perfil.png',
            'contrasena' => 'admin',
            'Nombre' => $nombres,
            'Apellido' => $apellido,
            'idCadena' => $this->input->post('cadena'),
            'pais_idpais' => $this->input->post('pais'),
            'direccion' => $this->input->post('dir'),
            'delgSucursal' => $this->input->post('delg'),
            'colSucursal' => $this->input->post('col'),
            'cp' => $this->input->post('cp'),
            'Numero' => $this->input->post('numext'),
            'Frases' => trim($this->input->post('fraces')),
            'palabrasClaves' => trim($this->input->post('palabras')),
            'termino' => 'Aceptar',
            'notifiaciones' => $notifiaciones,
            'pagoenLinea' => $this->input->post('paglin'),
            'envioGratis' => $this->input->post('pgraris'),
            'disponiblerecoger' => $this->input->post('disrecoger'),
            'aceptobonos' => $this->input->post('bonos'),
            'EntregaAprox' => $this->input->post('aprixima'),
            'costoenvio' => $this->input->post('costo'),
            'promociones' => $this->input->post('promociones'),
            'pedidominimo' => $this->input->post('pedidominimo'),
            'registro' => $reg);
        $query = $this->sucursal_models->comprobaremail($email);
        if ($query->num_rows() > 0) {
            
        } else {

            $this->sucursal_models->insertar($data);
            session_start();
            $_SESSION["idSucursalActualizar"] = $idSucursalger;
            echo $idSucursalger;
        }
    }

    public function sucursalesver() {
        //session_start();


        $uri_segment = 0;
        $limite = 10;
        $palabra = "op";
        $offset = $this->input->get('per_page');



        if ($offset == "") {
            $offset = 0;
        }
        $data['sucursales'] = $this->sucursal_models->getMostrarlimit($offset, $limite);
        $query = $this->sucursal_models->getMostrar();
        $config['base_url'] = base_url() . 'Sucursales/sucursalesver?string=' . $palabra; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
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


        $this->pagination->initialize($config); //inicializamos la paginación        
        $data["pagination"] = $this->pagination->create_links();


        $this->load->view('admin/sucursales_viwer', $data);
    }

    public function delete() {
        $id = $this->input->get('idsucuarsal');
        $erro = $this->sucursal_models->delete($id);
    }

    public function actualizarposicion() {
        $posicion =$this->input->get('posicion');
        $id =$this->input->get('id');
        $data = array('posicion' => $posicion);
        $this->sucursal_models->update($id, $data);
        echo $id;
    }

    public function editar() {

        $idSucursal = $this->input->get('idsucuarsal');
        session_start();
        $idsicod = base64_decode($idSucursal);
        $_SESSION["idSucursalActualizar"] = $idsicod;
        $data['sucursal'] = $this->sucursal_models->buscar($idsicod);
        $this->load->model('cadena_models');
        $this->load->model('pais_models');
        $data['cadena'] = $this->cadena_models->getMostrar();
        $data['pais'] = $this->pais_models->getMostrar();
        $this->load->view('admin/editar_sucursal_viwer', $data);
    }

    public function mostraimgen() {
        session_start();
        $id = $_SESSION["idSucursalActualizar"];
        // $this->load->model('sucursal_models');          
        $sucursal = $this->sucursal_models->buscar($id);
        $row = $sucursal->row_array();
        echo $row['url'];
    }

    public function procate() {
        session_start();
        $idSucursal = $this->input->get('idsucuarsal');
        $_SESSION["idSucursalActivax"] = $idSucursal;
        redirect(site_url('') . "adminvendedor/perfil", 'refresh');
    }

}
