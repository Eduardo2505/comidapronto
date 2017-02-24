<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Restaurantes extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('encrypt');
        session_start();
        //header('Content-type: image/jpeg');
    }

    public function index() {
        $this->load->model('sucursal_models');
        $this->load->model('cadena_models');
        $this->load->helper('url');
        // session_start();
        //echo $_SESSION["idcolonia"];
        if (!isset($_SESSION["idcolonia"])) {
            $data['sucursales'] = $this->sucursal_models->getMostrarSurcursalesfull();
            //$data['opcion']="eroor";
            
        } else {
            $idcolo = $_SESSION["idcolonia"];
            $data['sucursales'] = $this->sucursal_models->getMostrarSurcursales($idcolo);
            //$data['opcion']="activo";
        }

        $data['cadenas'] = $this->cadena_models->getCadenasActivas();
        $data['orden'] = 's.idSucursal';
        $data['tipo'] = '';
        $this->load->view('guia/restaurantes', $data);
    }

    public function filtro() {
        $this->load->model('cadena_models');
        $this->load->model('sucursal_models');
        $strig = $this->input->get('tipo');
        $idt = $this->input->get('idt');

        $orden = base64_decode($this->input->get('orden'));
        $porcionesx = explode("-", $strig);
        $remplazar = "";
        if (in_array($idt, $porcionesx)) {
            $remplazar.=str_replace($idt, "", $strig);
        }




        $porciones = explode("-", $remplazar);
        for ($i = 0; $i < count($porciones); $i++) {
            if ($i != 0) {
                
            }
        }

        $data['tipo'] = $remplazar;
        $data['orden'] = $orden;
        $data['cadenas'] = $this->cadena_models->getCadenasActivas();
        $data['sucursales'] = $this->sucursal_models->getfiltronavegar("and s.disponiblerecoger=1", $orden);
        $this->load->view('guia/restaurantes', $data);
    }

    public function filtroComida() {
        $this->load->model('sucursal_models');
        $this->load->model('cadena_models');
        $this->load->helper('url');
        $strig = $this->input->get('tipo');
        
        if (!isset($_SESSION["idcolonia"])) {
             $data['sucursales'] = $this->sucursal_models->getSurcursalesComida($strig,"","");
            //$data['opcion']="eroor";
        } else {
            $idcolo = $_SESSION["idcolonia"];
            $data['sucursales'] = $this->sucursal_models->getSurcursalesComida($strig,$idcolo,"");
            //$data['opcion']="activo";
        }
      
        $data['cadenas'] = $this->cadena_models->getCadenasActivas();
        $data['orden'] = 's.idSucursal';
        $data['tipo'] = '';
        $this->load->view('guia/restaurantes', $data);
    }
      public function filtroSucursal() {
        $this->load->model('sucursal_models');
        $this->load->model('cadena_models');
        $this->load->helper('url');
        $strig = $this->input->get('tipo');
        
        if (!isset($_SESSION["idcolonia"])) {
             $data['sucursales'] = $this->sucursal_models->getSurcursalesComida("","",$strig);
            //$data['opcion']="eroor";
        } else {
            $idcolo = $_SESSION["idcolonia"];
            $data['sucursales'] = $this->sucursal_models->getSurcursalesComida("",$idcolo,$strig);
            //$data['opcion']="activo";
        }
      
        $data['cadenas'] = $this->cadena_models->getCadenasActivas();
        $data['orden'] = 's.idSucursal';
        $data['tipo'] = '';
        $this->load->view('guia/restaurantes', $data);
    }

    public function categorias() {

        $this->load->model('categoria_models');
        $this->load->model('sucursal_models');
        $strig = $this->input->get('idSucursal');
        $data['idSucursal'] = $strig;
        $data['categoria'] = $this->categoria_models->getCategoriasSucursal($strig);
        $data['sucursalbus'] = $this->sucursal_models->buscar($strig);
        $this->load->view('guia/categoria_viwer', $data);
    }

    public function productos() {


        $this->load->model('subcategoria_models');
        $this->load->model('producto_models');
        $this->load->model('sucursal_models');
        $this->load->model('pedidosproductos_models');

        $strig = $this->input->get('idSucursal');
        $idcate = $this->input->get('idCategoria');

        $this->load->model('subproductos_models');
        $subcategoria = $this->subcategoria_models->getsuCategoriasSucursal($strig, $idcate);


        $stron = '';
        if (isset($subcategoria)) {
            foreach ($subcategoria->result() as $row) {
                $stron.='   <article class="search-menu-list lnch">
                <div class="head">
                  <img src="' . site_url('') . '_assets/images/food-menu-icon.png" alt="">
                  <h2>' . $row->sub . '</h2>
                  <h6>Delicioso</h6>
                </div>
                <div class="menu-items-wrapper" >
                  <ul class="lnchSlider clearfix">';
                $productos = $this->producto_models->getProSucu($strig, $idcate, $row->idsub);
                if (isset($productos)) {
                    foreach ($productos->result() as $rowp) {

                        // 
                        $stron.='<li class="own">
                      <div class="search-menu-items clearfix">
                        <figure>
                           <img src="' . site_url('') . 'uploads/' . $rowp->img . '" >
                        </figure>
                        <div class="figcaption clearfix">
                           <div>
                             <h3>' . $rowp->nombre . '</h3>
                             <p>' . $rowp->descripcion . '<br><h3>$ ' . $rowp->precio . '( ' . $rowp->desc2 . ')</h3><br></p>
                           </div>';



                        $precios = $this->subproductos_models->getsubProductos($rowp->id);
                        if (!isset($_SESSION["idcolonia"])) {


                            $stron.='<div style="text-align:center">
									  <a class="button red-btn disp" href="#modalz">Agergar</a>
									</div>';
                        } else {

                            if ($precios->num_rows() != 1) {
                                $stron.='<div style="text-align:center">
								 <a class="button red-btn disp" name="' . $rowp->id . '&idsucursal=' . $strig . '" href="#modal">Agergar</a>
								 </div>';
                            } else {


                                foreach ($precios->result() as $rowpp) {

                                    $stron.='<div style="text-align:center">
												<a class="button red-btn agrgardirec" name="' . $rowpp->idSubproductos . '&idsucursal=' . $strig . '&precio=' . $rowpp->precio . '&cantidad=1" href="#add">Agergar</a>
											  </div>';
                                }
                            }
                        }









                        $stron.='    </div>
                      </div>
                    </li>';
                    }
                }
                $stron.=' </ul>
                  <div class="nav-btns">
                    <a class="left-btn" href="javascript:void(0)"><i class="fa fa-angle-left"></i></a>
                    <a class="right-btn" href="javascript:void(0)"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </article>';
            }
        }


        $data['productos'] = $stron;
        $data['idSucursalx'] = $strig;
        $data['idcategoriax'] = $idcate;
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!isset($_SESSION["idcolonia"])) {
            $data['sesscionac'] = "errr";
        } else {
            $data['sesscionac'] = "apli";
        }




        // echo $ip;
        //$data['compras']=$this->pedidosproductos_models->mostrarCompra($ip);

        $data['countproductos'] = $this->pedidosproductos_models->ContarCompras($ip);

        //echo $resul->num_rows();

        $data['sucursalbus'] = $this->sucursal_models->buscar($strig);
        $this->load->view('guia/productos_viwer', $data);
    }

    /* public function productos()
      {

      $this->load->model('subcategoria_models');
      $this->load->model('producto_models');
      $this->load->model('sucursal_models');
      $this->load->model('pedidosproductos_models');

      $strig=$this->input->get('idSucursal');
      $idcate=$this->input->get('idCategoria');

      $this->load->model('subproductos_models');
      $subcategoria=$this->subcategoria_models->getsuCategoriasSucursal($strig,$idcate);


      $stron='';
      if (isset($subcategoria)) {
      foreach($subcategoria->result() as $row)
      {

      $stron.='<article class="search-menu-list lnch"><div class="head"><img src="'.site_url('') .'_assets/images/food-menu-icon.png" alt=""><h2>'.$row->sub.'</h2></div>';

      $stron.='<div class="menu-items-wrapper" >
      <ul class="lnchSlider clearfix">';

      $productos=$this->producto_models->getProSucu($strig,$idcate,$row->idsub);
      if (isset($productos)) {
      foreach($productos->result() as $rowp)
      {

      //


      $stron.='<li class="own">

      <div>
      <div class="search-menu-items clearfix" >
      <figure>
      <img src="'.site_url('') .'uploads/'.$rowp->img.'" style="width:228px;height=200px" >
      </figure>
      <div class="figcaption clearfix" >
      <div>
      <h3>'.$rowp->nombre.' ('.$rowp->desc2.')</h3>
      <p>'.$rowp->descripcion.'</p>
      <h2>$ '.$rowp->precio.'</h2>

      </div>';

      $precios=$this->subproductos_models->getsubProductos($rowp->id);
      if (!isset($_SESSION["idcolonia"])){


      $stron.='<div style="text-align:center">
      <a class="button red-btn disp" href="#modalz">Agergar</a>
      </div>';
      }else{

      if ($precios->num_rows()!=1)
      {
      $stron.='<div style="text-align:center">
      <a class="button red-btn disp" name="'.$rowp->id.'&idsucursal='.$strig.'" href="#modal">Agergar</a>
      </div>';
      }else{


      foreach($precios->result() as $rowpp)
      {

      $stron.='<div style="text-align:center">
      <a class="button red-btn agrgardirec" name="'.$rowpp->idSubproductos.'&idsucursal='.$strig.'&precio='.$rowpp->precio.'&cantidad=1" href="#add">Agergar</a>
      </div>';


      }



      }



      }









      $stron.='


      </div>
      </div>

      </li>';
      }
      }
      $stron.='</ul></div>';

      }
      }


      $data['productos']=$stron;
      $data['idSucursalx']=$strig;
      $data['idcategoriax']=$idcate;
      $ip = $_SERVER['REMOTE_ADDR'];
      if (!isset($_SESSION["idcolonia"])){
      $data['sesscionac']="errr";
      }else{
      $data['sesscionac']="apli";

      }




      // echo $ip;
      //$data['compras']=$this->pedidosproductos_models->mostrarCompra($ip);

      $data['countproductos']=$this->pedidosproductos_models->ContarCompras($ip);

      //echo $resul->num_rows();

      $data['sucursalbus']=$this->sucursal_models->buscar($strig);
      $this->load->view('guia/productos_viwer',$data);


      } */

    public function precios() {
        $strig = $this->input->get('idProducto');
        $idsucur = $this->input->get('idsucursal');
        $this->load->model('subproductos_models');
        $precios = $this->subproductos_models->getsubProductos($strig);
        $stron = '
  <script type="text/javascript">


   $(document).ready(function() {
    $("#from' . $strig . '").submit(function() {
      var data = $(this).serialize();

      $("#precioscon").html("<img src=\"' . site_url('') . 'resourceadmin/loader.gif\" >").fadeOut(1000);
      $.get("' . site_url('') . 'restaurantes/guardarPedido", data, function(respuesta) {                           
      //  $(".countpro").html(respuesta);
       $(location).attr("href",""); 
            
      // $("#precioson").fadeIn(1000).html("SE AGREGO CORRECTAMENTE <BR><HR><a class=\"remodal-confirm\" id=\"btnconfirmar\" href=\"#\" >ACEPTAR</a>"); 
       // $(".remodal-close").click();

        




      });

return false;
});
});


$(document).ready(function() {
  $(".radiobtnx").click(function(){
    var user = $(this).attr("title");
    $("#inpu").val(user);




  });


});
</script>
<form id="from' . $strig . '">
  <input type="hidden" name="idProductoAsigan" id="inpu">
  <input type="hidden" name="idsucursal" value="' . $idsucur . '">';


        foreach ($precios->result() as $rowpp) {

            $stron.='
   <input type="radio" name="precio" class="radiobtnx" title="' . $rowpp->idSubproductos . '" value="' . $rowpp->precio . '" required> ' . $rowpp->Descripcion . ' ($' . $rowpp->precio . ')<br> ';
        }


        $stron.=' <br>  <input type="tel"  class="button" required maxlength="5" name="cantidad" onkeypress="ValidaSoloNumeros()" placeholder="Cantidad"><hr>

 <input type="submit" class="button green-btn" value="Agregar">


</form>';



        echo $stron;
    }

    public function guardarPedido() {

        $this->load->model('pedido_models');
        $this->load->model('pedidosproductos_models');
        $ip = $_SERVER['REMOTE_ADDR'];

        $strig = $this->input->get('idProductoAsigan');
        $cantida = $this->input->get('cantidad');
        $precio = $this->input->get('precio');
        // $idsucursal=$this->input->post('idsucursal'); 

        $fecha = time();
        $registro = date("Y-m-d H:i:s", $fecha);

        $data = array('idPedido' => $ip);


        $resul = $this->pedido_models->buscar($ip);

        if ($resul->num_rows() > 0) {
            $idSunupdate = $this->pedidosproductos_models->ContarProducto($ip, $strig);

            if ($idSunupdate == "") {
                $this->pedidosproductos_models->insertar($strig, $precio, $cantida, $ip, $registro);
            } else {
                $cantidadAC = $this->pedidosproductos_models->buscarCantidad($idSunupdate);
                $sumita = $cantidadAC + $cantida;
                $this->pedidosproductos_models->updateCantidad($idSunupdate, $sumita);
            }
        } else {

            $this->pedido_models->insertar($data);

            $this->pedidosproductos_models->insertar($strig, $precio, $cantida, $ip, $registro);
        }

        echo $this->pedidosproductos_models->ContarCompras($ip);
    }

    public function eliminarpro() {

        $this->load->model('pedidosproductos_models');
        $strig = $this->input->get('idPedidosProductos');
        $data['idSucursalx'] = $this->input->get('idSucusal');
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->pedidosproductos_models->eliminar($strig);
        $data['compras'] = $this->pedidosproductos_models->mostrarCompra($ip);
        $this->load->view('guia/compras_viwer', $data);
    }

    public function updatepedido() {

        $this->load->model('pedidosproductos_models');
        $strig = $this->input->get('idPedidosProductos');
        $cantidad = $this->input->get('cantidad');
        $data['idSucursalx'] = $this->input->get('idSucusal');
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->pedidosproductos_models->updateCantidad($strig, $cantidad);
        $data['compras'] = $this->pedidosproductos_models->mostrarCompra($ip);
        $this->load->view('guia/compras_viwer', $data);
    }

    public function mostrarShoping() {

        $this->load->model('pedidosproductos_models');
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->load->model('colonias_models');
        $data['idSucursalx'] = $this->input->get('idSucusal');
        $data['compras'] = $this->pedidosproductos_models->mostrarCompra($ip);
        $this->load->view('guia/compras_viwer', $data);
    }

    public function cantidaditems() {
        $this->load->model('pedidosproductos_models');
        $ip = $_SERVER['REMOTE_ADDR'];
        echo $this->pedidosproductos_models->ContarCompras($ip);
    }

    public function agregarPedio() {
        $this->load->model('pedido_models');
        $this->load->model('cliente_models');
        $this->load->model('diralternavitas_models');

        $nombre = $this->input->get('nombre');
        $email = $this->input->get('correo');
        $calle = $this->input->get('calle');
        $nuint = $this->input->get('nuint');
        $numext = $this->input->get('numext');
        $delga = $_SESSION["delg"];
        $cp = $_SESSION["cp"];
        $tel = $this->input->get('tel');
        $idcolonia = $_SESSION["idcolonia"];
        $colonia = $_SESSION["colonniases"];
        $calles = $this->input->get('calles');
        $mensaje = $this->input->get('mensaje');
        $Personas = $this->input->get('personas');
        $pago = $this->input->get('pago');
        $tipo = $this->input->get('tipo');
        $total = $this->input->get('total');
        $idSucursal = $this->input->get('idSucursal');


        $fecha = time();
        $id = date("ymdhis", $fecha);
        $reg = date("Y-m-d H:i:s", $fecha);


        $datac = array('idCliente' => $id,
            'Nombre' => $nombre,
            'email' => $email,
            'sexo' => "",
            'registro' => $reg,
            'password' => '1234',
            'edad' => 0,
            'img' => 'perfil.png',
            'tipo_registro' => 'rapido',
            'estado' => "Activo");
        $query = $this->cliente_models->comprobaremail($email);
        if ($query->num_rows() > 0) {

            echo "Erro";
        } else {

            $datadir = array('calle' => $calle,
                'numint' => $nuint,
                'numex' => $numext,
                'telefono' => $tel,
                'idCliente' => $id,
                'idColonias' => $idcolonia);



            $this->cliente_models->insertar($datac);

            $ip = $_SERVER['REMOTE_ADDR'];

            $this->diralternavitas_models->insertar($datadir);
            $querydir = $this->diralternavitas_models->buscararary($datadir);
            $rowdir = $querydir->row_array();
            $iddiral = $rowdir['iddiralternavitas'];
            $data = array('tipopago' => $tipo,
                'impreso' => 0,
                'registro' => $reg,
                'personas' => $Personas,
                'billeteTarjeta' => $pago,
                'estado' => 'Pendiante',
                'total' => $total,
                'calles' => $calles,
                'mensaje' => $mensaje,
                'idPedido' => $id,
                'idSucursal' => $idSucursal,
                'iddiralternavitas' => $iddiral,
                'idCliente' => $id);
            $this->pedido_models->updateConfirmacion($ip, $data);

            echo $id;
        }
    }

    public function buscarcp() {
        $this->load->model('colonias_models');
        $idsucursal = $this->input->post('idsucursal');
        $idcategoria = $this->input->post('idcategoria');
        $cp = $this->input->post('cp');
        $direc = $this->colonias_models->getMostrar($cp);

        if ($direc->num_rows() > 0) {
            $stron = '<h2>Quiso decir</h2>';
            foreach ($direc->result() as $rowpp) {


                $stron.='<a href="' . site_url('') . 'restaurantes/sessionCp?idcolonia=' . $rowpp->idColonias . '&colonia=' . $rowpp->Colonia . '&cp=' . $rowpp->CP . '&delg=' . $rowpp->Delegacion . '&idsucursal=' . $idsucursal . '&idcategoria=' . $idcategoria . '">Col. ' . $rowpp->Colonia . ', C.P. ' . $rowpp->CP . ' , DELG. ' . $rowpp->Delegacion . '</a><br><br>';
            }
        } else {
            $stron = '<h2>NO HAY NINGUN RESULTADO</h2>';
        }


        echo $stron;
    }

    public function sessionCp() {

        $idcolonia = $this->input->get('idcolonia');
        $colonia = $this->input->get('colonia');
        $cp = $this->input->get('cp');
        $delg = $this->input->get('delg');

        $idsucursal = $this->input->get('idsucursal');
        $idcategoria = $this->input->get('idcategoria');

        $_SESSION["idcolonia"] = $idcolonia;
        $_SESSION["colonniases"] = $colonia;
        $_SESSION["cp"] = $cp;
        $_SESSION["delg"] = $delg;
        $this->load->model('colsucural_models');
        $buscar = $this->colsucural_models->Comprobarcol($idsucursal, $idcolonia);
        if ($buscar->num_rows() > 0) {
            redirect(site_url('') . 'restaurantes/productos?idSucursal=' . $idsucursal . '&idCategoria=' . $idcategoria, 'refresh');
        } else {
            redirect(site_url('') . 'restaurantes', 'refresh');
        }
    }

}
