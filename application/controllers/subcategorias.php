<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subcategorias extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('categoria_models');
        $this->load->model('funciones_models');
        $this->load->model('subcategoria_models');
        $this->load->model('categoriasubcate_models');
        $this->load->library('pagination');
        session_start();
    }

    public function registro() {
        $idsucursal = $_SESSION["idSucursalActivax"];
        //echo $idsucursal;
        $data['categorias'] = $this->categoria_models->getCatagoriaslist($idsucursal);
        $this->load->view('adminvendedor/subcategoriasregistrar_viwer', $data);
    }

    public function eliminar() {
        $id = $this->input->get('id');
        $this->subcategoria_models->delete($id);
    }

    public function actualizarposicion() {
        $posicion=$this->input->get('posicion');
        $id=$this->input->get('id');
        $data = array('posicion' => $posicion);
		$this->categoriasubcate_models->update($id,$data);
        echo $id;
    }
    
    public function eliminarasig() {
        $id = $this->input->get('id');
        $this->categoriasubcate_models->delete($id);
    }

    public function asiganar() {
        $idSubcate = $this->input->get('idSubcate');
        $idCate = $this->input->get('idCate');
        $idunion = $idSubcate . "-" . $idCate;

        $resut = $this->categoriasubcate_models->buscar($idunion);

        if ($resut->num_rows() > 0) {
            $data['error'] = "<h2>Ya se encuentra asigando este tipo</h2>";
        } else {
            $datax = array('idCategoriaSubcate' => $idunion,
                'idCategorias' => $idCate,
                'idSubcategoria' => $idSubcate);
            $this->categoriasubcate_models->insertar($datax);
            $data['error'] = "";
        }



        //	echo $idunion;
        $idsucursal = $_SESSION["idSucursalActivax"];
        $uri_segment = 0;
        $limite = 10;
        $palabra = "op";
        $offset = $this->input->get('per_page');
        if ($offset == "") {
            $offset = 0;
        }
        $data['subcategorias'] = $this->subcategoria_models->getsuCategoriasSucursalxlimit($idsucursal, $offset, $limite);
        $query = $this->subcategoria_models->getsuCategoriasSucursalx($idsucursal);
        $config['base_url'] = base_url() . 'subcategorias/mostrar?string=' . $palabra; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
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
        
        $this->load->view('adminvendedor/subcategoriasresult', $data);
    }

    public function editar() {


        $id = $this->input->get('id');
        $data['catebus'] = $this->subcategoria_models->buscar(base64_decode($id));
        $data['categorias'] = $this->categoria_models->verCatagorias();
        $this->load->view('adminvendedor/subcategoriaseditar_viwer', $data);
    }

    public function guardar() {
        $nombre = $this->input->get('nombre');
        $descripcion = $this->input->get('descripcion');
        $cate = $this->input->get('cate');
        $idsucursal = $_SESSION["idSucursalActivax"];
        $id = $idsucursal . "-" . $this->funciones_models->sanear_string($nombre);
        $idunion = $id . "-" . $cate;
        $reslt = $this->subcategoria_models->buscarSucur($id, $idsucursal);
        if ($reslt->num_rows() > 0) {

            echo "Erro";
        } else {

            $data = array('idSubcategoria' => $id,
                'Nombre' => $nombre,
                'Descripcion' => $descripcion,
                'url' => 'default.jpg',
                'estado' => 1,
                'idSucursal' => $idsucursal);
            $this->subcategoria_models->insertar($data);

            /* $datax = array('idCategoriaSubcate' => $idunion,
              'idCategorias'=>$cate,
              'idSubcategoria'=>$id);
              $this->categoriasubcate_models->insertar($datax); */


            //session_start();
            //$_SESSION["idsubCategoriaRegistro"] =$id; 
        }
    }

    public function editarregistro() {
        $nombre = $this->input->get('nombre');
        $descripcion = $this->input->get('descripcion');
        $idcategorias = $this->input->get('categorias');
        $idsubCategoria = $this->input->get('idsubCategoria');
        $id = $this->funciones_models->sanear_string($nombre);
        $reslt = $this->subcategoria_models->buscar($id);
        $idsucursal = $_SESSION["idSucursalActivax"];

        if ($idsubCategoria == $id) {
            $data = array(
                'Descripcion' => $descripcion);
            $this->subcategoria_models->update($id, $data);
            //session_start();	
            $_SESSION["idsubCategoriaRegistro"] = $id;

            echo $id;
        } else {
            if ($reslt->num_rows() > 0) {

                //  echo "Erro";
            } else {

                $data = array('idSubcategoria' => $id,
                    'Nombre' => $nombre,
                    'Descripcion' => $descripcion,
                    'idSucursal' => $idsucursal);
                $this->subcategoria_models->update($idsubCategoria, $data);




                ///	session_start();	
                $_SESSION["idsubCategoriaRegistro"] = $id;

                echo $id;
            }
        }
    }

    public function mostrar() {

        $idsucursal = $_SESSION["idSucursalActivax"];
        $data['categorias'] = $this->categoria_models->getCatagoriaslist($idsucursal);
        //$data['subcategorias']=$this->subcategoria_models->getsuCategoriasSucursalx($idsucursal);	
        $data['subcategoriasx'] = $this->subcategoria_models->verls($idsucursal);


        //############### Se crea la paginiacion de la categorias ##############
        $uri_segment = 0;
        $limite = 10;
        $palabra = "op";
        $offset = $this->input->get('per_page');
        if ($offset == "") {
            $offset = 0;
        }
        $data['subcategorias'] = $this->subcategoria_models->getsuCategoriasSucursalxlimit($idsucursal, $offset, $limite);
        $query = $this->subcategoria_models->getsuCategoriasSucursalx($idsucursal);
        $config['base_url'] = base_url() . 'subcategorias/mostrar?string=' . $palabra; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
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

        //##################  FIN ####################




        $this->load->view('adminvendedor/subcategoriasmostra_vie', $data);
    }

    public function mostrarVer() {

        $idsucursal = $_SESSION["idSucursalActivax"];


        //############### Se crea la paginiacion de la categorias ##############
        $uri_segment = 0;
        $limite = 10;
        $palabra = "op";
        $offset = $this->input->get('per_page');
        if ($offset == "") {
            $offset = 0;
        }
        $data['subcategoriasx'] = $this->subcategoria_models->verlimit($idsucursal, $offset, $limite);
        $query = $this->subcategoria_models->ver($idsucursal);
        $config['base_url'] = base_url() . 'subcategorias/mostrarVer?string=' . $palabra; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
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

        //##################  FIN ####################





        $this->load->view('adminvendedor/subcategorias_vie', $data);
    }

}

