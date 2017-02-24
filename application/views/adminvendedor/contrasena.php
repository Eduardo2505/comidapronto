
<?php
include 'plantilla/top.php';

?>
   <script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
   <script type="text/javascript">
     
               $(function() {
                $('#form-contact').submit(function() {
                    var data = $(this).serialize();
                    var pass = String($('#contrasenanueva').val());
                    var pass1 = String($('#contrasenarepeti').val());
                    if(pass==pass1){
                    $.post("<?php echo site_url('adminvendedor/updatePassword')?>", data, function(respuesta) {
                            var inres = respuesta.length;
                           // alert(respuesta);
                        if (inres!=0) {
                             $('#mensaje').html('<div class="alert alert-warning"><h5>*** Error</h5>La contraseña anterior no correspode al usuario </div></div></div>');
                        } else {

                            $('#mensajecorrecto').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se actualizo correctamente</h2><br><a href="<?php echo base_url(); ?>adminvendedor/contrasena" class="btn btn btn-warning">Aceptar</a></div>');
                        }

                    });
                       }else{

                        $('#mensaje').html('<div class="alert alert-warning"><h5>*** Error</h5> Verique la contraseña nueva!!! :(</div></div></div>');
                      }
                    return false;
                });
            });

    
  </script>
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"> <i class="icon-home"></i> Contraseña
      
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
                  <div class="padd">
<div id="mensajecorrecto">
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" id="form-contact">
                              <input type="hidden" name="idSucursal" value="<?php echo $sucursal; ?>">
                                <div class="form-group">
                                  <label class="col-lg-7 control-label">Contraseña anterior</label>
                                  <div class="col-lg-5">
                                    <input type="password" required maxlength="40" name="contrasenaactual" class="form-control" placeholder="Contraseña anterior">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-7 control-label">Contraseña nueva</label>
                                  <div class="col-lg-5">
                                    <input type="password" required maxlength="40" id="contrasenanueva" name="contrasenanueva" class="form-control" placeholder="Contraseña nueva">
                                  </div>
                                  </div>
								  <div class="form-group">
                                  <label class="col-lg-7 control-label">Repetir Contraseña</label>
                                  <div class="col-lg-5">
                                    <input type="password" required maxlength="40" id="contrasenarepeti"  class="form-control" placeholder="Repetir Contraseña">
                                  </div>
                                  </div>
								
                               <hr>
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                 <input type="submit"  id="btnenviar" class="btn btn-success"  value="Actualizar">
                                 
                                 <div id="mensaje">
      </div>
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
          </div>

        </div>
		  </div>

		<!-- Matter ends -->

    </div>
<!-- Content ends -->

<?php
include 'plantilla/footerupdate.php';

?>