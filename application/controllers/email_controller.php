<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_controller extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('pedido_models'); 
		$this->load->model('pedidosproductos_models'); 
		$this->load->model('cliente_models'); 
		$this->load->model('diralternavitas_models');
		$this->load->model('colonias_models');
		$this->load->model('sucursal_models');
		$this->load->model('key_models');
		$this->load->helper('file');
		
	}
	

	public function crearpedidoPrinter(){
		$idepedido =$this->input->get('idpedido'); 
			//Pedido
		$sucursal=$this->pedido_models->buscar($idepedido);	
		$row=$sucursal->row_array();
		$tipopago=$row['tipopago'];
		$registro=$row['registro'];
		$personas=$row['personas'];
		$billeteTarjeta=$row['billeteTarjeta'];
		$total=$row['total'];
		$calles=$row['calles'];
		$mensaje=$row['mensaje'];
		$idCliente=$row['idCliente'];
		$idsucursa=$row['idSucursal'];
		$iddiralternavitas=$row['iddiralternavitas'];
		//Datos clientes
		$clientero=$this->cliente_models->buscar($idCliente);
		$rowc=$clientero->row_array();
		$Nombre=$rowc['Nombre'];
		$email=$rowc['email'];
		//direccion del cliente
		$dirclie=$this->diralternavitas_models->buscardir($iddiralternavitas);
		$rowdir=$dirclie->row_array();
		$calle=$rowdir['calle'];
		$numint=$rowdir['numint'];
		$numex=$rowdir['numex'];
		$telefono=$rowdir['telefono'];
		$idColonias=$rowdir['idColonias'];
		$colclie=$this->colonias_models->getBuscar($idColonias);
		$rowcol=$colclie->row_array();
		$Colonia=$rowcol['Colonia'];
		$CP=$rowcol['CP'];
		$Delegacion=$rowcol['Delegacion'];

		$confre=$this->cliente_models->verificarClienteFre($email,$telefono);
		$compras=$this->pedidosproductos_models->mostrarCompra($idepedido);	
		$tipocliente='';
		if($confre!=0){
			$tipocliente.='(CLIENTE FRECUENTE)';
		}else{
			$tipocliente='(CLIENTE NUEVO)';

		}
		$a='';
		if($tipopago=="efectivo"){

			$a.='$';
		}
		$productoinfo='';


		$totalsum=0;
		$producto='';
		foreach($compras->result() as $rowp) 
		{ 
			$tprecio=($rowp->cantidad)*($rowp->precio);
			$totalsum+=$tprecio;
			$producto .="" . $rowp->Nombre . "%%$ " .$rowp->precio. " pz;" .$rowp->cantidad. ";$" .$tprecio. ";";
			

		}
		$empaque=$totalsum*.05;
		$tt=$totalsum+$empaque;
		

		$producto .="Servicio%%$" .number_format($empaque,2). ";1;$" .number_format($empaque,2). "";
		$productoinfo= "#13*1*" .$idepedido. "*".$producto.";*0*0;$" .number_format($tt,2). ";4;"
		. "" .$Nombre. "%%" .$tipocliente. "%%Tel." .$telefono. ";"
		. "" .$calle. "," .$numex. "%%" .$numint. "%%"
		. "Col. " .$Colonia. "%%C.P. " .$CP. "%%"
		. "Delg. " .$Delegacion. "%%"
		. "Pers. " .$personas. "%%"
		. "Entre que calle: "
		. "".$calles.";"
		. "" .$tipopago. " " .$a. "" .$billeteTarjeta. ";-;7;cod:;" .$telefono. ";*" .$mensaje. "#";



		//$data = 'HOLA'.PHP_EOL;
		/*$fecha = time (); 
		$reg=date("Y-m-d H:i:s",$fecha);
		$data = array('impreso'=>1,
			'registroImpresion'=>$reg);
		$this->pedido_models->updateConfirmacion($idepedido,$data);

        //echo  $productoinfo;
		$ruta=FCPATH."/uploads/pedidotxt/".$idsucursa.".txt";
           // $string = read_file($ruta);
		if (!file_exists($ruta)) {
			mkdir($ruta, DIR_WRITE_MODE, true);
		}
            //echo $ruta+"<BR>"+$string;
		if (!write_file($ruta, $productoinfo.PHP_EOL,"a")){
			//echo "<br>Errooror";
		}else{
			
			
		}*/
		$urlbase=$this->key_models->Crypto($productoinfo);
		echo $urlbase;

	}
	public function enviarConfimacion(){

		$idepedido =$this->input->get('idpedido');
        //Pedido
		$sucursal=$this->pedido_models->buscar($idepedido);	
		$row=$sucursal->row_array();
		$tipopago=$row['tipopago'];
		$registro=$row['registro'];
		$personas=$row['personas'];
		$billeteTarjeta=$row['billeteTarjeta'];
		$total=$row['total'];
		$calles=$row['calles'];
		$mensaje=$row['mensaje'];
		$idCliente=$row['idCliente'];
		$idsucursa=$row['idSucursal'];
		$iddiralternavitas=$row['iddiralternavitas'];
		//Datos clientes
		$clientero=$this->cliente_models->buscar($idCliente);
		$rowc=$clientero->row_array();
		$Nombre=$rowc['Nombre'];
		$email=$rowc['email'];
		//direccion del cliente
		$dirclie=$this->diralternavitas_models->buscardir($iddiralternavitas);
		$rowdir=$dirclie->row_array();
		$calle=$rowdir['calle'];
		$numint=$rowdir['numint'];
		$numex=$rowdir['numex'];
		$telefono=$rowdir['telefono'];
		$idColonias=$rowdir['idColonias'];
		$colclie=$this->colonias_models->getBuscar($idColonias);
		$rowcol=$colclie->row_array();
		$Colonia=$rowcol['Colonia'];
		$CP=$rowcol['CP'];
		$Delegacion=$rowcol['Delegacion'];
		//Sucuarsal
		$datasucursal=$this->sucursal_models->buscar($idsucursa);
		$rowsu=$datasucursal->row_array();
		$Sucursal=$rowsu['Sucursal'];
		$direccion=$rowsu['direccion'];
		$delgSucursal=$rowsu['delgSucursal'];
		$colSucursal=$rowsu['colSucursal'];
		$Numeros=$rowsu['Numero'];
		$telefonos=$rowsu['telefono'];
		$emails=$rowsu['email'];
		$cp=$rowsu['cp'];
		$pais_idpais=$rowsu['pais_idpais'];
		$diresu=$direccion.' '.$Numeros.', C.P'.$cp.', Col.'.$colSucursal.' Delg.'.$delgSucursal.' '.$pais_idpais;
		$datos='<h4>'.strtoupper ($Sucursal).'<br>Tel. '.$telefonos.' <br>Email: '.$emails.'</h4>';

		$compras=$this->pedidosproductos_models->mostrarCompra($idepedido);	
		

		$html="";
		$html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
			<title>Confimación de tu pedido</title>
			<script>
				<!--
			--></script>           
			<style type="text/css">


				.ReadMsgBody, .ExternalClass {width:100%; background-color: #f8f8f8;}
				.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
				body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
				body {margin:0; padding:0;}
				table {border-spacing:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}
				table td {border-collapse:collapse;}
				img { border: 0; }
				html {width: 100%; height: 100%;}


				/* Embedded CSS link color */
				a         {color:#000000; text-decoration:none;}
				a:link    {color:#000000; text-decoration:none;}
				a:visited {color:#000000; text-decoration:none;}
				a:focus   {color:#000000 !important;}
				a:hover   {color:#000000 !important;}

				/* End of Embedded CSS link color */

				/* Clickable phone numbers */
				a[href^="tel"], a[href^="sms"] {text-decoration:none; color:#353535; pointer-events:none; cursor:default;}
				.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:default; color:#000000 !important; pointer-events:auto; cursor:default;}
				/* End of Clickable phone numbers */

				/* Media Queries */

				@media only screen and (max-width: 639px) {
					body{width:auto!important;}

					/* Adjust table widths at smaller screen sizes */
					body[yahoo] .table		{width:320px !important;}
					body[yahoo] .inside		{width:250px !important;}
					body[yahoo] .remove		{width:0px !important;}

					/* Center Elements in Tables */
					body[yahoo] .content-center 		{text-align:center !important;}

					/* Center Buttons in Tables */
					body[yahoo] .button-center 		{display: block !important; margin-left: auto !important; margin-right: auto !important; text-align:center !important;}

					/* Header columns */
					body[yahoo] .header-left		{width:320px !important;}
					body[yahoo] .header-left img	{display: block !important; margin-left: auto !important; margin-right: auto !important;}
					body[yahoo] .socials-right  	{display:none !important;}

					/* Footer columns */
					body[yahoo] .footer 		{width:320px !important; text-align:center !important;}
					body[yahoo] .footer img		{display:none !important;}			

					/* Image 600 Resized */
					body[yahoo] .image600 img 	{width:300px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}

					/* Image 300 Resized */
					body[yahoo] .image300 img 	{width:280px !important; height:107px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}

					/* Image 560 Resized */
					body[yahoo] .image560 img 	{width:280px !important; height:100px !important;}
					body[yahoo] .shadow560 img 	{width:280px !important; height:9px !important;}

					/* Image 270 and Text  Resized */
					body[yahoo] .image270 img 	{width:280px !important; height:208px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}
					body[yahoo] .image270-2 img 	{width:280px !important; height:208px !important;}
					body[yahoo] .text270 		{width:310px !important;}
					body[yahoo] .text270-2 		{width:300px !important;}
					body[yahoo] .distance-1		{height:0px !important;}
					body[yahoo] .distance-2		{height:20px !important;}
					body[yahoo] .hideable    	{display:none !important;}

					/* Hideable Icon Image */
					body[yahoo] .hideable-icon  {display:none !important;}
					body[yahoo] .text-icon 		{width:320px !important;}

					/* End of Media Queries */

				</style>
			</head>

			<body style="width:100% !important; color:#353535; background:#f8f8f8; font-family: Helvetica,sans-serif; font-size:13px; line-height:140%; margin:0; padding:0;" yahoo="fix">


				<!-- * Header Module * -->
				<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
					<tr>
						<td bgcolor="#f8f8f8">						
							<!-- Tables Width -->
							<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">					

								<!-- Top Header -->
								<tr>
									<td>
										<table width="100%" cellpadding="10" cellspacing="0" border="0">
											<tr>
												<td height="24" valign="middle" style="font-size:11px; color:#353535; text-align:right" class="content-center">
													<!--Problem viewing this email? <a href="#" target="_blank" style="color:#353535; text-decoration:none; font-style:italic;">View it in your browser.</a>-->
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<!-- End of Top Header -->						

							</table>
							<!-- End of Tables Width -->				
						</td>
					</tr>	
					<tr><td height="1" bgcolor="#f1f1f1"></td></tr>
					<tr><td height="4" bgcolor="#f0b70c"></td></tr>	
					<tr><td height="1" bgcolor="#dd4c0c"></td></tr>	
					<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
					<tr>
						<td bgcolor="#ffffff">
							<!-- Tables Width -->
							<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">	
								<tr>
									<td>

										<!-- A1 -->
										<table align="left" bgcolor="#ffffff" width="300" cellpadding="0" cellspacing="0" border="0" class="header-left">										
											<tr>
												<td width="20"></td>

												<!-- Logo Image -->
												<td width="247" align="left" valign="top">													
													<a href="#" target="_blank"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/icono.png" width="160" height="100" border="0" alt="Logo Header" style="display:block; border:none; outline:none; text-decoration:none;"/></a>
												</td>
												<!-- End of Logo Image -->

												<td width="20"></td>
											</tr>	
										</table>
										<!-- End of A1 -->	

										<!-- Social Links -->	
										<table align="right" width="295" cellpadding="0" cellspacing="0" border="0" class="socials-right">
											<tr>
												<td width="15" bgcolor="#ffffff"></td>
												<td width="260" height="50" bgcolor="#ffffff">													
													<table border="0" cellpadding="0" cellspacing="0" align="right">
														<tr>
															<td>
																<a href="#" target="_blank" style="text-decoration: none;">
																	<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-twitter.jpg" width="40" height="100" border="0" alt="Twitter" title="Twitter" style="display:block; border:none; outline:none; text-decoration:none;" />
																</a>
															</td>
															<td>
																<a href="#" target="_blank" style="text-decoration: none;">
																	<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-facebook.jpg" width="40" height="100" border="0" alt="Facebook" title="Facebook" style="display:block; border:none; outline:none; text-decoration:none;" />
																</a>
															</td>
															<td>

															</td>
														</tr>													
													</table>
													
												</td>
												<td width="20" bgcolor="#ffffff"></td>
											</tr>
										</table>
										<!-- End of Social Links -->

									</td>
								</tr>
							</table>
							<!-- End of Tables Width -->				
						</td>
					</tr>
					<tr><td height="1" bgcolor="#dddddd"></td></tr>	
					<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
					<tr><td height="30" bgcolor="#f8f8f8"></td></tr>		
				</table>
				<!-- * End of Header Module * -->


				<!-- * Image 560x200 Module + Text Module * -->


				<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
					<tr>
						<td bgcolor="#f8f8f8">						
							<!-- Tables Width -->
							<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
								<tr>
									<td width="20"></td>

									<!-- Title Here -->
									<td width="560" valign="top" align="left" class="inside" >';



										$html .= '<H2>NUMERO DE PEDIDO: '.$idepedido.'</H2><br>';
										$html .= '<h3>Nombre : '.$Nombre.'<br>Email: '.$email.' <br>Tel: '.$telefono.'</h3> Direccion : '.$calle.' Num. Int '.$numint.' Num. Ext.'.$numex.', Col. '.$Colonia.', C.P. '.$CP.', Delg. '.$Delegacion.', México DF 
										<br>
										<h2>PAGO: '.strtoupper ($tipopago).'</h2>  <br>';


										$html .= '<span style="color:#ff580e"><strong>Productos</strong></span>';
										$html .= "<table><tr><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th></tr>";
										$totalsum=0;
										foreach($compras->result() as $rowp) 
										{ 
											$tprecio=($rowp->cantidad)*($rowp->precio);
											$totalsum+=$tprecio;
											$html .= "<tr><td>" . $rowp->Nombre . "</td><td>".$rowp->cantidad."</td><td>$ ".$rowp->precio."</td><td>$ ".$tprecio."</td></tr>";

										}
										$empaque=$totalsum*.05;
										$tt=$totalsum+$empaque;
										$iva=$tt*.16;
										$Sub=$tt/1.16;
										$html .= "<tr><td></td><td></td><td>__________</td><td>_______________</td></tr>";
										$html .= "<tr><td></td><td></td><td>Empaque:<br>Productos: <br>IVA 16%<br>Subtotal: <br> TOTAL:</td><td>$ ".number_format($empaque,2)."<br>$ ".number_format($totalsum,2)."<br>$ ".number_format($iva,2)."<br>$ ".number_format($Sub,2)."<br>$ ".number_format($tt,2)."</td></tr>";

										$html .= "</table>";




										$html .= '	<!-- End of Title -->





									</td>

								</tr>


							</table>
							<!-- End of Tables Width -->
						</td>
					</tr>
					<tr><td align="center" valign="top" class="image600"><img src="https://dl.dropboxusercontent.com/u/95713634/carritoenlinea/divider.jpg" width="600" height="60" border="0" alt="" style="display:block; border:none; outline:none; text-decoration:none;"/></td></tr>	
					<tr><td align="center" valign="top" class="image600">'.$datos.' '.$diresu.'

					</td></tr>
				</table>	
				<!-- * End of Image 560x200 Module + Text Module * -->	


				<!-- Tables Width -->
				
				<!-- End of Tables Width -->
			</td>
		</tr>
	</table>	


	<!-- * Footer Module * -->
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
		<tr><td height="4" bgcolor="#f0b70c"></td></tr>	
		<tr><td height="1" bgcolor="#dd4c0c"></td></tr>	
		<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
		<tr>
		</tr>
	</table>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
		<tr>
			<td bgcolor="#606060">						
				<!-- Tables Width -->
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#606060" class="table">	
					<tr><td height="20"></td></tr>
					<tr>

						<!-- Copyright -->
						<td bgcolor="#606060" align="center" style="font-size: 12px; color: #ffffff; font-weight: bold; text-align: center; font-family: Helvetica, Arial, sans-serif;">
							© 2015  Derechos Reservados. <a href="#" target="_blank" style="text-decoration: none; color: #ffffff;"><strong>Políticas de Privacidad</strong></a>
							<br />
							<a href="x" target="_blank" style="text-decoration: none; color: #ffffff;">
								comidapronto.mx </a>
							</td>
							<!-- End of Copyright -->

						</tr>	
						<tr><td height="20"></td></tr>					
					</table>
					<!-- End of Tables Width -->				
				</td>
			</tr>
		</table>						
		<!-- * End of Footer Module * -->


	</body>
	</html>'; 

//echo $html;
	$asunto = "Compra en linea";
	$cabeceras = 'From: no-rept@comidapronto.com' . "\r\n" .
	'Reply-To: ventas@comidapronto.com' . "\r\n" .
	'Content-Type: text/html' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	if(mail($email,utf8_decode($asunto),$html,$cabeceras)){
			 	//echo "se envio";

	}else{
		echo "error em mail";
	} 



			 //fin de la funcion
}	

}
