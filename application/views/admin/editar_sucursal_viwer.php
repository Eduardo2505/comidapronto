
<?php
$row=$sucursal->row_array();
include 'plantilla/top.php';


?>

<!--Subir archivos -->
<script src="../../resourceadmin/js/jquery.min.js"></script>
<link href="/assets/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>

<script src="/assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var base_url = '<?php echo base_url(); ?>';
      

        $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#actualizarimagen').html('<img src="<?php echo base_url(); ?>/img/ajax-loader.gif" alt=""/>');
            $('#userfile').uploadify('upload', '*');
           
           
        });
        
        $('#userfile').uploadify({           
            'debug':false,
            'auto':false,
            'queueSizeLimit' : 1,            
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v5/do_upload',
            'cancelImg': base_url + 'assets/js/jquery/uploadify_31/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Seleciona',
            'multi':true,
            'removeCompleted':true, 
             'onQueueComplete' : function(queueData) {
                
                   
                           var dataString = 'idCuentas=1';

                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('sucursales/mostraimgen')?>",
                                data: dataString,
                                success: function(data) {
                                
                                   $('#actualizarimagen').html('<div class="gallery" ><a href="#" class="prettyPhoto[pp_gal]"><img src="<?php echo base_url(); ?>/uploads/'+data+'" alt=""></a></div>');
                                }
                            });
                            //}
                      
            
          //  alert(queueData.uploadsSuccessful + ' files were successfully uploaded.');
        }

        });
    });
</script>
<!--FIN Subir archivos -->


<script type="text/javascript">

    function ValidaSoloNumeros() {
          if ((event.keyCode < 48) || (event.keyCode > 57))
            event.returnValue = false;
        }

         $(function(){
                $('#optenerdatos').submit(function(){
                    var data=$(this).serialize();
                      $.post("<?php echo site_url('adminvendedor/UpdateDatos')?>",data,function(respuesta){
                      // $('#txtbtn').click();
                            alert("Se actualizo correctamente")

                         // $('#mensajecorrecto').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se actualizo correctamente</h2><br><a href="<?php echo base_url(); ?>adminvendedor/perfil" class="btn btn btn-warning">Aceptar</a></div>');
                      });
                    
                    return false;
                });
            });
  </script>
<!-- Sidebar ends -->

<!-- Main bar -->
<div class="mainbar">

  <!-- Page heading -->
  <div class="page-head">
    <!-- Page heading -->
    <h2 class="pull-left"><i class="icon-user"></i> Hola :) : <?php echo $row['Nombre']; ?> <?php echo $row['Apellido']; ?>

    </h2>

    <div class="bread-crumb pull-right">
      <a href="<?php echo site_url('') ?>"><i class="icon-home"></i> Home</a> 
      <!-- Divider -->
      <span class="divider">/</span> 
      <a href="<?php echo site_url('adminvendedor/perfil') ?>" class="bread-current">Perfil</a>

      <span class="divider">/</span> 
      <a href="<?php echo site_url('adminvendedor/contrasena') ?>" class="bread-current">Contraseña</a>
      <span class="divider">/</span> 
      <a href="<?php echo site_url('adminvendedor/productos') ?>" class="bread-current">Productos</a>
      <span class="divider">/</span> 
      <a href="<?php echo site_url('adminvendedor/producto') ?>" class="bread-current">Nuevo Productos</a>
    </div>

    <div class="clearfix"></div>

  </div>
  <!-- Page heading ends -->


  <!-- Matter -->

  <div class="matter">
    <div class="container">

      <div class="row">

        <div class="col-md-7">


          <div class="widget wgreen">

            <div class="widget-head">
              <div class="pull-left">Perfil</div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">
              <div class="padd" id="mensajecorrecto">

                <!-- Form starts.  -->
                <div id="datospersonal">
                <form class="form-horizontal" role="form" id="optenerdatos">
                  <input type="hidden" name="idSucursal" value="<?php echo $row['idSucursal']; ?>">
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Nombre</label>
                    <div class="col-lg-8">
                      <input type="text" value="<?php echo $row['Nombre']; ?>" required maxlength="45" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Apellido</label>
                    <div class="col-lg-8">
                      <input type="text" value="<?php echo $row['Apellido']; ?>" required maxlength="45" name="apellido" class="form-control" placeholder="Apellido">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Email</label>
                    <div class="col-lg-8">
                      <input type="email" value="<?php echo $row['email']; ?>" required maxlength="45" name="email" class="form-control" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Teléfono</label>
                    <div class="col-lg-8">
                      <input type="tel"  value="<?php echo $row['telefono']; ?>" required maxlength="10" name="tel" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Teléfono">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Empresa</label>
                    <div class="col-lg-8">
                      <input type="text" value="<?php echo $row['Sucursal']; ?>" maxlength="45" name="empresa" required class="form-control" placeholder="Empresa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Dirección</label>
                    <div class="col-lg-8">
                      <input type="text" value="<?php echo $row['direccion']; ?>" maxlength="45" required name="dir" class="form-control" placeholder="Dirección">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Num. Ext e Num. Int</label>
                    <div class="col-lg-6">
                      <input type="text" value="<?php echo $row['Numero']; ?>" maxlength="20" required name="numext" class="form-control" placeholder="Num. Ext">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Delegación</label>
                    <div class="col-lg-6">
                      <input type="text" value="<?php echo $row['delgSucursal']; ?>" maxlength="45" required name="delg" class="form-control" placeholder="Delegación">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Colonia</label>
                    <div class="col-lg-6">
                      <input type="text" value="<?php echo $row['colSucursal']; ?>" maxlength="45" required name="col" class="form-control" placeholder="Colonia">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">CP</label>
                    <div class="col-lg-6">
                      <input type="tel" value="<?php echo $row['cp']; ?>" required maxlength="4" name="cp" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="C.P.">
                    </div>
                  </div>
                       <div class="form-group">
                    <label class="col-lg-4 control-label">Giro</label>
                    <div class="col-lg-6">   
                   


                      <select name="cadena" required class="form-control">
                       <?php


                        if (isset($cadena)) {
                          foreach($cadena->result() as $rowx)
                          {
                            $idcadena=$rowx->idCadena;
                            if($row['idCadena']==$idcadena){
                              ?>
                              <option value="<?php echo  $rowx->idCadena;?>" selected><?php echo  $rowx->Nombre;?></option>
                                <?php
                               }else{
                            ?>

                            <option value="<?php echo  $rowx->idCadena;?>"><?php echo  $rowx->Nombre;?></option>


                            <?php 
                              }
                          }
                        }
                        ?>
                       
                      </select>
                    </div>
                  </div>
                       <div class="form-group">
                    <label class="col-lg-4 control-label">País</label>
                    <div class="col-lg-6">                     
                      <select name="pais" required class="form-control">
                       <?php
                        if (isset($pais)) {
                          foreach($pais->result() as $rowv)
                          {

                            $idpais=$rowv->idpais;
                            
                             if($row['pais_idpais']==$idpais){

                              ?>
                            <option value="<?php echo  $rowv->idpais;?>" selected><?php echo  $rowv->Pais;?></option>
                              <?php 

                             }else{
                            ?>

                            <option value="<?php echo  $rowv->idpais;?>"><?php echo  $rowv->Pais;?></option>


                            <?php 
                          }
                        }
                        }
                        ?>
                       
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                  <script type="text/javascript">
                     $(document).ready(function() {
                          $('.checktipo').click(function() {
                                  var user = $(this).attr("name");

                                   if($(this).is(':checked')) {  
                                           var user = $(this).attr("name");
                                           if(user=='pgraris'){
                                              

                                               $('#checkCostos').html('<input type="hidden" value="0" name="costo"><input type="tel" value="0.00" disabled=""  class="form-control">');
                                           }
                                  }else{
                                              if(user=='pgraris'){
                                                 $('#checkCostos').html('<input type="tel"  required maxlength="5" name="costo" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Costo">');

                                           }

                                  }
                      
                                 
                          });
                      });
               </script>
                    <label class="col-lg-4 control-label">Opciones</label>
                    <div class="col-lg-6">
                    <?php 
                        if($row['envioGratis']==1){

                        ?>
                         <input type="checkbox" name="pgraris" value="1" checked="" class="checktipo"> Entrega Gratis
                        <?php
                        }else{
                          ?>
                         <input type="checkbox" name="pgraris" value="1" class="checktipo"> Entrega Gratis
                          <?php
                        }
                    ?>

                      <?php 
                        if($row['disponiblerecoger']==1){

                        ?>
                         <input type="checkbox" name="disrecoger" value="1" checked="" class="checktipo"> Disponible para recoger
                        <?php
                        }else{
                          ?>
                         <input type="checkbox" name="disrecoger" value="1" class="checktipo"> Disponible para recoger
                          <?php
                        }
                    ?>

                       <?php 
                        if($row['pagoenLinea']==1){

                        ?>
                         <input type="checkbox" name="paglin" value="1" checked="" class="checktipo"> Pago en linea
                        <?php
                        }else{
                          ?>
                         <input type="checkbox" name="paglin" value="1" class="checktipo"> Pago en linea
                          <?php
                        }
                    ?>


                   <?php 
                        if($row['aceptobonos']==1){

                        ?>
                          <input type="checkbox" name="bonos" value="1" checked="" class="checktipo"> Acepto bonos
                        <?php
                        }else{
                          ?>
                         <input type="checkbox" name="bonos" value="1" class="checktipo"> Acepto bonos
                          <?php
                        }
                    ?>
                    <?php 
                        if($row['promociones']==1){

                        ?>
                           <input type="checkbox" name="promociones" value="1" checked="" class="checktipo"> Promociones
                        <?php
                        }else{
                          ?>
                         <input type="checkbox" name="promociones" value="1" class="checktipo" > Promociones
                          <?php
                        }
                    ?>
                   
                   
                  
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-lg-4 control-label">Entrega Aproximada</label>
                    <div class="col-lg-6">
                     <input type="tel"  required value="<?php echo $row['EntregaAprox']; ?>" name="aprixima" class="form-control" placeholder="Entrega.">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Costo envio</label>
                    <div class="col-lg-6" id="checkCostos">

                   <?php if($row['envioGratis']==1){
?>
                    <input type="hidden" value="0" name="costo"><input type="tel" value="0.00" disabled=""  class="form-control">
<?php
                    }else{?>
                     <input type="tel" value="<?php echo $row['costoenvio']; ?>"   required maxlength="5" name="costo" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Costo">
<?php
                    }
                     
                    ?>
                    </div>
                    </div>
                 

                   <div class="form-group">
                    <label class="col-lg-4 control-label">Pedido Minimo</label>
                    <div class="col-lg-6">
                      <input type="tel"  value="<?php echo $row['pedidominimo']; ?>" required maxlength="5" name="pedidominimo" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Pediddo minimo">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-lg-4 control-label">Tipo Comida</label>
                    <div class="col-lg-6">
                      <textarea class="form-control" maxlength="45" required name="fraces"> <?php echo $row['Frases']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Palabras Claves</label>
                    <div class="col-lg-6">
                      <textarea class="form-control"   maxlength="440" required name="palabras"> <?php echo $row['palabrasClaves']; ?></textarea>
                    </div>
                  </div>

                    <hr />
                  <div class="form-group">
                <div class="col-lg-offset-1 col-lg-9">
                  <input type="submit" value="GUARDAR" class="btn btn-success"  >
                  </div>
              </div>
                </form>
                </div>

             
               

            </div>
          </div>
          <div class="widget-foot">
            <!-- Footer goes here -->
          </div>
        </div>  

      </div>
      <!--############################-->
      <div class="col-md-4">


          <div class="widget wgreen">

            <div class="widget-head">
              <div class="pull-left">Perfil</div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">

              <div class="padd" style="text-align:center">
              <div id="actualizarimagen">
              <div class="gallery" >
            
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
                      <a href="<?php echo base_url(); ?>/uploads/<?php echo $row['url']; ?>" class="prettyPhoto[pp_gal]"><img src="<?php echo base_url(); ?>/uploads/<?php echo $row['url']; ?>" alt=""></a>
                        
              </div>
              </div>
              



   <div style="text-align:center">

   

   <form  enctype="multipart/form-data">            
            <input type="file" name="userfile" value="" id="userfile" />           
           
                        
           
            <button name="" type="button" id="upload-file" class="btn btn-success">Cargar</button>
        
      
   
      </form>


   </div>

               <hr />
               

            </div>
          </div>
          <div class="widget-foot">
            <!-- Footer goes here -->
          </div>
        </div>  

      </div>
      <!--############################->

    </div>

  </div>
</div>

<!-- Matter ends -->

</div>

<!-- Mainbar ends -->        
<div class="clearfix"></div>

</div>
<!-- Content ends -->

<?php
include 'plantilla/footer.php';

?>
