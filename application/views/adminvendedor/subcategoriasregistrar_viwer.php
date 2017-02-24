
<?php
include 'plantilla/top.php';

?>
<script src="<?php echo base_url(); ?>resourceadmin/js/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

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
            'queueSizeLimit' : 10,            
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v6/do_upload',
            'cancelImg': base_url + 'assets/js/jquery/uploadify_31/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Seleciona',
            'multi':true,
            'removeCompleted':true,
            'onQueueComplete' : function(queueData) {
                 $('#mensajecorrecto').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se registro correctamente</h2><br><a href="<?php echo base_url(); ?>subcategorias/registro" class="btn btn btn-warning">Aceptar</a></div>');  
                  
                      //alert("se redireccioara");
             
                  }
        });
    });
</script>

   <script type="text/javascript">


     
               $(document).ready(function () {
                $('#optenerdatos').submit(function() {
                    var data = $(this).serialize();
                   
                   var numElem = $('div.uploadify-queue-item').size(); 
                
                    $.get("<?php echo site_url('subcategorias/guardar')?>", data, function(respuesta) {
                      var inres = respuesta.length;
                      
                    
                     if(inres!=0){
                         $('#mensaje').html('<div class="alert alert-warning"><h5>*** Error</h5>La Sub-categoría ya existe</div></div></div>');


                      }else{
                        
                        $('#optenerdatos')[0].reset(); 
                          
                           if(numElem!=0){

                                $('#upload-file').click();                      

                            }else{

                                      $('#mensajecorrecto').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se registro correctamente</h2><br><a href="<?php echo base_url(); ?>subcategorias/registro" class="btn btn btn-warning">Aceptar</a></div>');                   

                            }

                       }     
                      

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
        <h2 class="pull-left"><i class="icon-home"></i> Sub Categorias
      
        </h2>

          <div class="bread-crumb pull-right">
          <a href="<?php echo site_url('') ?>"><i class="icon-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="<?php echo site_url('administrador/perfil') ?>" class="bread-current">Perfil</a>
          <span class="divider">/</span> 
          <a href="<?php echo site_url('administrador/envio') ?>" class="bread-current">Envío</a>
          <span class="divider">/</span> 
          <a href="<?php echo site_url('administrador/contrasena') ?>" class="bread-current">Contraseña</a>
          <span class="divider">/</span> 
          <a href="<?php echo site_url('administrador/compras') ?>" class="bread-current">Compras</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



      <!-- Matter -->

      <div class="matter">
        <div class="container">

          <div class="row">
          <div class="col-md-3">


          <div class="widget wgreen">

            <div class="widget-head">
              <div class="pull-left">Imagen</div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">

              <div class="padd" style="text-align:center">
     

   <div style="text-align:center">

   
<h2>Imagenes</h2>
          <?php echo form_open_multipart(); ?>
            
            <?php echo form_upload('userfile','','id="userfile"'); ?>
           
           
            <?php echo (isset($error)) ? $error : ''; ?>
            
           
            
        
      <div style="display:none">
      <button name="" type="button" id="upload-file" class="btn btn-success cargarauto">Cargar</button>
      </div>
      <?php echo form_close(); ?>
 


   </div>

               <hr />
               

            </div>
          </div>
          <div class="widget-foot">
            <!-- Footer goes here -->
          </div>
        </div>  

      </div>

            <div class="col-md-6">


              <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Información</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd" id="mensajecorrecto">

                    <!-- Form starts.  -->
                      <form class="form-horizontal" role="form" id="optenerdatos">
                
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Sub Categoría</label>
                    <div class="col-lg-8">
                      <input type="text"  required maxlength="45" name="nombre" class="form-control" placeholder="Nombre">
                      <div id="mensaje">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Descripcion</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" maxlength="440"  name="descripcion"> </textarea>
                    </div>
                  </div>
                
            
                 
                    <hr />
              <div class="form-group">
                <div class="col-lg-offset-1 col-lg-9">
                  <input type="submit" value="GUARDAR" class="btn btn-success"  >
                  </div>
                  <br><br>
              </div>
                </form>


                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  

            </div>










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
include 'plantilla/footerupdate.php';

?>