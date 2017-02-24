
<?php
include 'plantilla/top.php';

?>
<script src="../../resourceadmin/js/jquery.min.js"></script>

    <!-- Sidebar ends -->

    <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left"><i class="icon-home"></i> Perfil
      
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

            <div class="col-md-8">


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

                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form">
                              
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Nombre</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Nombre">
                                  </div>
                                </div>
                  <div class="form-group">
                                  <label class="col-lg-4 control-label">Apellido</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Apellido">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Email</label>
                                  <div class="col-lg-8">
                                    <input type="email" class="form-control" placeholder="Email">
                                  </div>
                                </div>
                   <div class="form-group">
                                  <label class="col-lg-4 control-label">Teléfono</label>
                                  <div class="col-lg-8">
                                    <input type="tel" class="form-control" placeholder="Teléfono">
                                  </div>
                                </div>
                                                         
                                
                                    <hr />
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                  
                                    <button type="button" id="btnguarda" class="btn btn-success">GUARDAR</button>
                                
                                  </div>
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
include 'plantilla/footer.php';

?>