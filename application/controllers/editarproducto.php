<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editarproducto extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		
		
	}
	

	public function buscar()
	{

		session_start();
		$idProducto=$this->input->get('idProducto');
		$this->load->model('producto_models');
		$producresul=$this->producto_models->buscar(base64_decode($idProducto));
		$data['busproduc']=$producresul;
		$data['idSucursal']=$_SESSION["idSucursal"];
		$_SESSION["opAct"] = "actualizar";
		$rowpro=$producresul->row_array();
		$this->load->model('subproductos_models');
		$data['precios']=$this->subproductos_models->getsubProductos($rowpro['id']);
		$this->load->model('imagenes_models');
		$data['imagenes']=$this->imagenes_models->getimagenes($rowpro['id']);
		$data['idProdutoimg']=$rowpro['id'];
		$idsucurs=$_SESSION["idSucursalActivax"];
	    $this->load->model('categoria_models');
	    $data['categoria']=$this->categoria_models->getCategoriasSucursal($idsucurs);
		$this->load->view('adminvendedor/editarproducto',$data);
		

	}	

	public function eliminarimg()
	{
		
		$idimg=$this->input->post('idimg');
		$idProducto=$this->input->post('idProducto');
		$this->load->model('imagenes_models');
		$this->imagenes_models->delete($idimg);
		$data['idProdutoimg']=$idProducto;
		$data['imagenes']=$this->imagenes_models->getimagenes($idProducto);
		$this->load->view('adminvendedor/viwer_img',$data);
	}	


   public function eliminarprecio()
	{
		
		$idimg=$this->input->post('id');
		$divtitle=$this->input->post('divtitle');		
		$this->load->model('subproductos_models');
		$this->subproductos_models->delete($idimg);

		if($divtitle=='divpe1'){
          echo '<div class="form-group">
                    <label class="col-lg-4 control-label"> Precio (1)</label>
                    <div class="col-lg-8">
                      <input type="text"  class="form-control" id="tam1" placeholder="Tamaño" required>
                      <input type="hidden" value=""  id="id1">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label"></label>
                    <div class="col-lg-8">

                      <input type="tel" value="" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec1" placeholder="Precio" required>
                    </div>
                  </div>';

		}
		else if($divtitle=='divpe2'){

			echo '<div class="form-group">
                    <label class="col-lg-4 control-label"> Precio (2)</label>
                    <div class="col-lg-8">
                      <input type="text"  class="form-control" id="tam2" placeholder="Tamaño" required>
                      <input type="hidden" value=""  id="id2">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label"></label>
                    <div class="col-lg-8">

                      <input type="tel" value="" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec2" placeholder="Precio" required>
                    </div>
                  </div>';
		}else {

        echo '<div class="form-group">
                    <label class="col-lg-4 control-label"> Precio (3)</label>
                    <div class="col-lg-8">
                      <input type="text"  class="form-control" id="tam3" placeholder="Tamaño" required>
                      <input type="hidden" value=""  id="id3">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label"></label>
                    <div class="col-lg-8">

                      <input type="tel" value="" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec3" placeholder="Precio" required>
                    </div>
                  </div>';
		}
		
	}


	public function updatenom()
	{


		$id=$this->input->post('id');
		$this->load->model('producto_models');
		$data = array('Nombre'=>$this->input->post('nom'),
			'Descripcion'=>$this->input->post('desc'));
		$producresul=$this->producto_models->update($id,$data);
		

	}

	public function updatesubcate()
	{


		$id=$this->input->post('id');
		$this->load->model('producto_models');
		$data = array('idCategoriaSubcate'=>$this->input->post('idsubcategoria'));
		$producresul=$this->producto_models->update($id,$data);
		

	}


	public function guardar()
	{


		
		$tam1=$this->input->get('tam1');
		$tam2=$this->input->get('tam2');
		$tam3=$this->input->get('tam3');
		$prec1=$this->input->get('prec1');
		$prec2=$this->input->get('prec2');
		$prec3=$this->input->get('prec3');

		$id1=$this->input->get('id1');
		$id2=$this->input->get('id2');
		$id3=$this->input->get('id3');

		$idproductos=$this->input->get('idProducto');



		$this->load->model('subproductos_models');
		$fecha = time (); 
		$regvc=date("His",$fecha);
		if($id1==''){
 			if($prec1!=""){
				$idsub=$this->subproductos_models->gerarId(); 
				$data1 = array('idSubproductos' =>$idsub.''.$regvc,
					'precio'=>$prec1,
					'Descripcion'=>$tam1,
					'idProducto'=>$idproductos);
				$this->subproductos_models->insertar($data1);
			}
		}else{
			$data1 = array('precio'=>$prec1,
				'Descripcion'=>$tam1);
			$this->subproductos_models->update($id1,$data1);
		}
		if($id2==''){

			if($prec2!=""){
				$idsub=$this->subproductos_models->gerarId(); 
				$data2 = array('idSubproductos' =>$idsub.''.$regvc,
					'precio'=>$prec2,
					'Descripcion'=>$tam2,
					'idProducto'=>$idproductos);
				$this->subproductos_models->insertar($data2);
			}

		}else{
			$data2 = array('precio'=>$prec2,
				'Descripcion'=>$tam2);
			$this->subproductos_models->update($id2,$data2);

		}
		if($id3==''){

			if($prec3!=""){
					$idsub=$this->subproductos_models->gerarId(); 
					$data3 = array('idSubproductos' =>$idsub.''.$regvc,
						'precio'=>$prec3,
						'Descripcion'=>$tam3,
						'idProducto'=>$idproductos);
					$this->subproductos_models->insertar($data3);
			}

		}else{
			$data3 = array('precio'=>$prec3,
				'Descripcion'=>$tam3);
			$this->subproductos_models->update($id3,$data3);

		}
		session_start();
		$_SESSION["idproducto"] =$idproductos;
		echo "entro";

	}	
}
