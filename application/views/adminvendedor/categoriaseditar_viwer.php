
<?php
include 'plantilla/top.php';

$rowpro=$catebus->row_array();

?>
<script src="<?php echo base_url(); ?>resourceadmin/js/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">


function base64_encode(data) {
  //  discuss at: http://phpjs.org/functions/base64_encode/
  // original by: Tyler Akins (http://rumkin.com)
  // improved by: Bayron Guevara
  // improved by: Thunder.m
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Rafał Kukawski (http://kukawski.pl)
  // bugfixed by: Pellentesque Malesuada
  //   example 1: base64_encode('Kevin van Zonneveld');
  //   returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
  //   example 2: base64_encode('a');
  //   returns 2: 'YQ=='

  var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = '',
    tmp_arr = [];

  if (!data) {
    return data;
  }

  do { // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);

    bits = o1 << 16 | o2 << 8 | o3;

    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;

    // use hexets to index into b64, and append result to encoded string
    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
  } while (i < data.length);

  enc = tmp_arr.join('');

  var r = data.length % 3;

  return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
}



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

                  var idva=$('#idcategoriaAct').val();

                  $(location).attr('href',"<?php echo site_url('')?>categorias/editar?id="+base64_encode(idva)); 
               //  $('.gallery').html('');
               //   $('#mensajecorrecto').html(' <div class="alert alert-success" style="text-align:center"><h2>Se actualizo correctamente correctamente</h2></div>');  
                  
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
                   //alert(data);
                  
                    $.get("<?php echo site_url('categorias/editarregistro')?>", data, function(respuesta) {
                      var inres = respuesta.length;
                      
                     
                     if(inres==0){
                         $('#mensaje').html('<div class="alert alert-warning"><h5>*** Error</h5>La categoría ya existe</div></div></div>');


                      }else{
                       // alert(respuesta);
                        
                        $('#idcategoriaAct').val(respuesta);
                      
                          
                           if(numElem!=0){

                                $('#upload-file').click();                      

                            }else{
                              var idva=$('#idcategoriaAct').val();

                               $(location).attr('href',"<?php echo site_url('')?>categorias/editar?id="+base64_encode(idva)); 

                                    //  $('#mensajecorrecto').html(' <div class="alert alert-success" style="text-align:center"><h2>Se actualizo correctamente correctamente</h2></div>'); 

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
        <h2 class="pull-left"><i class="icon-home"></i> Editar Categorías
      
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
      <div class="gallery" >
            
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
                      <a href="<?php echo base_url(); ?>/uploads/img/<?php echo $rowpro['url']; ?>" class="prettyPhoto[pp_gal]"><img src="<?php echo base_url(); ?>/uploads/img/<?php echo $rowpro['url']; ?>" alt=""></a>
                        
              </div>

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
                  <div class="pull-left">Editar</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd" >

                    <!-- Form starts.  -->
                      <form class="form-horizontal" role="form" id="optenerdatos">
                  <input type="hidden" id="idcategoriaAct" name="idCategoria" value="<?php echo $rowpro['idCategorias']; ?>" >
                    <input type="hidden" name="sucursales" value="<?php echo  $idsucusalse;?>" >
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Categoría</label>
                    <div class="col-lg-8">
                      <input type="text"  required maxlength="45" value="<?php echo $rowpro['Nombre']; ?>" name="nombre" class="form-control" placeholder="Nombre">
                      <div id="mensaje">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Descripcion</label>
                    <div class="col-lg-8">
                        <textarea class="form-control"  maxlength="440"  name="descripcion"> <?php echo $rowpro['Descripcion']; ?></textarea>
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
                  <div class="widget-foot" id="mensajecorrecto">
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