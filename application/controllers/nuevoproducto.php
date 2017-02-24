<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nuevoproducto extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		
		
	}
	public function categoriasviwer()
	{
	    $this->load->model('categoria_models'); 
		$idClasificacion=$this->input->post('idClasificacion');
		$data['img']=$this->input->post('img');
	    $data['categoria']=$this->categoria_models->getCatagorias($idClasificacion);			
		$this->load->view('adminvendedor/categorias',$data);
	}
	public function subcategoriasviwer()
	{
	    $this->load->model('subcategoria_models');
		$idCategoria=$this->input->post('idCategoria');		
	    $data['subcategorias']=$this->subcategoria_models->getSubCatagorias($idCategoria);			
		$this->load->view('adminvendedor/subcategoriasviwer',$data);
	}
	public function marcaviwer()
	{
	  //  $this->load->model('modelo_models');
		$data['idsubcategoria']=$this->input->post('idsubcategoria');		
	   // $data['modelo']=$this->modelo_models->getmarca($idsubcategoria);			
		$this->load->view('adminvendedor/confirmarviwer',$data);

	}

	public function guardar()
	{
        session_start();
		$idsubcaresul=$this->input->get('idsubcaresul');
		$idsucursal=$_SESSION["idSucursalActivax"];
		$nom=$this->input->get('nom');
		$desc=$this->input->get('desc');
		$tam1=$this->input->get('tam1');
		$tam2=$this->input->get('tam2');
		$tam3=$this->input->get('tam3');
		$prec1=$this->input->get('prec1');
		$prec2=$this->input->get('prec2');
		$prec3=$this->input->get('prec3');

		$this->load->model('producto_models');
		$this->load->model('subproductos_models');
		$fecha = time (); 
		$regvc=date("His",$fecha);
		$id=$this->producto_models->gerarId(); 
        $reg=date("Y-m-d H:i:s",$fecha);
        
      
	    $data = array('idProducto' => $id.''.$regvc,
       'Nombre'=>$nom,
       'Descripcion'=>$desc,
       'idSucursal'=>$idsucursal,
       'estado'=>1,
       'idCategoriaSubcate'=>$idsubcaresul,
       'registro'=>$reg);

      
		$query=$this->producto_models->insertar($data);
		 

	    $idsub=$this->subproductos_models->gerarId(); 
	    $data1 = array('idSubproductos' =>$idsub.''.$regvc,
       'precio'=>$prec1,
       'Descripcion'=>$tam1,
       'idProducto'=>$id.''.$regvc);
	    $this->subproductos_models->insertar($data1);
	    if($prec2!=""){	    
	    $idsub=$this->subproductos_models->gerarId(); 
	    $data1 = array('idSubproductos' =>$idsub.'-'.$regvc,
       'precio'=>$prec2,
       'Descripcion'=>$tam2,
       'idProducto'=>$id.''.$regvc);
	    $this->subproductos_models->insertar($data1);
	    }
	    if($prec3!=""){
	    $idsubv=$this->subproductos_models->gerarId(); 
	    $data1 = array('idSubproductos' =>$idsubv.'3'.$regvc,
       'precio'=>$prec3,
       'Descripcion'=>$tam3,
       'idProducto'=>$id.''.$regvc);
	    $this->subproductos_models->insertar($data1);
	    }

        $idPr=$id.''.$regvc;

        $imgde=$this->input->get('imgde');

        if($imgde!='on'){
        $this->load->model('imagenes_models');
        $data = array('url' => 'productodefaul.png',
           'idProducto'=>$idPr);
        $this->imagenes_models->insertar($data);
        }


       
	    $_SESSION["idproducto"] =$idPr;
	    echo "entro";

	}		
		
	
}
