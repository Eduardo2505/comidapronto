
<?php

include 'plantilla/top.php';


?>

<!--Subir archivos -->
<script src="../../resourceadmin/js/jquery.min.js"></script>


<!--FIN Subir archivos -->


<!-- Sidebar ends -->

<!-- Main bar -->
<div class="mainbar">

  <!-- Page heading -->
  <div class="page-head">
    <!-- Page heading -->
    <h2 class="pull-left"><i class="icon-user"></i>

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

        <div class="col-md-12">


          <div class="widget wgreen">

            <div class="widget-head">
              <div class="pull-left">Sucursales
              </div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">
              <div class="padd" id="mensajecorrecto">
                     <div class="gallery">
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
                      
                     
                   

                <?php
                    if (isset($sucursales)) {
                      foreach($sucursales->result() as $row)
                      {
                        ?> 



<a href="<?php echo site_url('');?>sucursales/procate?idsucuarsal=<?php echo $row->idSucursal?>" alt="" ><img src="<?php echo site_url('') ?>uploads/<?php echo  $row->url;?>"alt=""></a>
                      
                       

                        <?php 
                      }
                    }
                    ?>
              </div>
               

            </div>
          </div>
             <div class="widget-foot">

                     

                      
                          <?php echo $pagination; ?>
                      
                      <div class="clearfix"></div> 

                    </div>
        </div>  

      </div>
      <!--############################-->
     
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
include 'plantilla/footerupdate.php';

?>
