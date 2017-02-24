
<?php
include 'plantilla/top.php';

?>
    <!-- Sidebar ends -->

     	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"><i class="icon-home"></i> Sub Categorías
      
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

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Sub-Categorías</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content medias">
                  <div id="acutailizarresultado">
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          
                   
                          <th>Nombre</th>
                          <th>Descripción</th>                         
                          <th>Control</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
<script type="text/javascript">
                $(document).ready(function() {
                    $('.btn-danger').click(function() {
                        var user = $(this).attr("name");
                      
                        var dataString = 'id='+user;   
                                          
                        if (user != "") {
                          var link="<?php echo site_url('') ?>subcategorias/eliminar";                          
                            $.ajax({
                                type: "GET",
                                url:link,
                                data: dataString,
                                success: function(data) {
                                
                                     $('#'+user).remove();

                                    

                                }
                            });
                            //}
                        }
                    }


                    );
                });
   </script>
<?php
                    if (isset($subcategoriasx)) {
                      foreach($subcategoriasx->result() as $rowx)
                      {
                        ?> 
                        <tr id="<?php echo  $rowx->idSubcategoria;?>">
                         
                         

                          <td><?php echo  $rowx->Nombre;?></td>
                         
                          <td><?php echo  $rowx->Descripcion;?></td>
                          

                      
                          <td>


                             
                              <a href="<?php echo site_url('');?>subcategorias/editar?id=<?php echo base64_encode($rowx->idSubcategoria);?>" class="btn btn-xs btn-default" ><i class="icon-pencil"></i></a>
                              <a href="#" class="btn btn-xs btn-danger"  name="<?php echo  $rowx->idSubcategoria;?>"><i class="icon-remove"></i></a>
                          
                          </td>
                        </tr>
                        
                       

                        <?php 
                      }
                    }
                    ?>

                        


                        
                      

                      

                                                                             

                      </tbody>
                    </table>

                    <div class="widget-foot">
                          <div class="uni pull-left">
                        <a href="<?php echo site_url('') ?>subcategorias/mostrar" class="btn btn-info btn-large">ATRAS</a>
                      </div>

                      <?php echo $pagination; ?>
                      
                      <div class="clearfix"></div> 

                    </div>

                    </div>
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