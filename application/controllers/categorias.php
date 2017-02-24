<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Controller {
  
  
  
  
    function __construct(){
		parent::__construct();
		 session_start();

		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('pagination');
		$this->load->model('sucursal_models');
		$this->load->model('categoria_models');
		$this->load->model('funciones_models'); 
		
		
		
	}
	
	
	public function registro()
	{
		
		$data['sucursales']=$this->sucursal_models->getMostrar();
		$data['idsucusalse']=$_SESSION["idSucursalActivax"];
		$this->load->view('adminvendedor/categoriasregistrar_viwer',$data);
	}

	public function eliminar()
	{
		$id=$this->input->get('id');
		$this->categoria_models->delete($id);
		
	}
    public function actualizarposicion()
	{
		$posicion=$this->input->get('posicion');
        $id=$this->input->get('id');
        $data = array('posicion' => $posicion);
		$this->categoria_models->update($id,$data);
        echo $id;
		
	}

	public function editar()
	{

		
		$id=$this->input->get('id');	
		$data['catebus']=$this->categoria_models->buscar(base64_decode($id));
		$data['idsucusalse']=$_SESSION["idSucursalActivax"];
		$this->load->view('adminvendedor/categoriaseditar_viwer',$data);
		

	}	
	public function guardar()
	{
		$nombre=trim($this->input->get('nombre'));
		$descripcion=trim($this->input->get('descripcion'));
		$sucursales=$this->input->get('sucursales');
        $id=$this->funciones_models->sanear_string($nombre)."-".$sucursales;
        $reslt=$this->categoria_models->buscar($id);
         if ($reslt->num_rows() > 0)
			{
			  
              echo "Erro";
			}else{

		        $data = array('idCategorias' => $id,
		       'Nombre'=>$nombre,
		       'Descripcion'=>$descripcion,
		       'url'=>'default.jpg',
		       'estado'=>1,
		       'idSucursal'=>$sucursales);
				$this->categoria_models->insertar($data);				
				$_SESSION["idCategoriaRegistro"] =$id; 
	   }
		
	}

	public function editarregistro()
	{
		$nombre=trim($this->input->get('nombre'));
		$descripcion=trim($this->input->get('descripcion'));
		$sucursales=$this->input->get('sucursales');
		$idCategoria=$this->input->get('idCategoria');
        $id=$this->funciones_models->sanear_string($nombre)."-".$sucursales;
        $reslt=$this->categoria_models->buscar($id);

        if($idCategoria==$id){
        	    $data = array('idCategorias' => $id,
		        'Nombre'=>$nombre,
		       'Descripcion'=>$descripcion,
		       'estado'=>1,
		       'idSucursal'=>$sucursales);
				$this->categoria_models->update($idCategoria,$data);				
		        $_SESSION["idCategoriaRegistro"] = $id;

		        echo $id;


        }else{
        	   if ($reslt->num_rows() > 0)
			  {
			  
            //  echo "Erro";
		    	 }else{

		        $data = array('idCategorias' => $id,
		        'Nombre'=>$nombre,
		       'Descripcion'=>$descripcion,
		       'estado'=>1,
		       'idSucursal'=>$sucursales);
				$this->categoria_models->update($idCategoria,$data);					
		        $_SESSION["idCategoriaRegistro"] = $id;

		        echo $id;
				
	         }


        }
         
		
	}
	public function mostrar()
	{
		
        $idsucursal=$_SESSION["idSucursalActivax"];
        
	
        $uri_segment=0;
        $limite=10;       
        $palabra="op";
        $offset=$this->input->get('per_page');
        
        if($offset==""){
         $offset=0;

        }
        $data['categorias'] = $this->categoria_models->getCatagoriaslimit($idsucursal,$offset,$limite);          
        $query=$this->categoria_models->getCatagorias($idsucursal);       
        $config['base_url'] = base_url().'categorias/mostrar?string='.$palabra; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $query;  
        $config['per_page'] = $limite; //Número de registros mostrados por páginas
        $config['num_links'] = 3; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';//primer link
        $config['last_link'] = 'Ultima';//último link
        $config["uri_segment"] = $uri_segment;//el segmento de la paginación+
        $config['page_query_string'] = true;
        //$config['use_page_numbers'] = true;
        $config['next_link'] = 'Siguiente';//siguiente link
        $config['prev_link'] = 'Anterior';//anterior link
        $config['full_tag_open'] = '<ul class="pagination pull-right">';//el div que debemos maquetar
        $config['full_tag_close'] = ' </ul>';//el cierre del div de la paginació
        
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
        
		$this->load->view('adminvendedor/categoriasmostra_vie',$data);
	}
}


