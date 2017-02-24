
<?php
include 'plantilla/top.php';

?>
    <!-- Sidebar ends -->

     	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"><i class="icon-home"></i> Compras
      
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

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Media</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content medias">
                  
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          
                          <th>Foto</th>
                          <th>Nombre</th>
                          <th>Precios</th>
                          <th>Clasificación</th>
                          <th>Sucursal</th>
                        
                          <th>Control</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
<script type="text/javascript">
                $(document).ready(function() {
                    $('.btn-danger').click(function() {
                        var user = $(this).attr("name");
                      
                        var dataString = 'idProducto='+user;   
                                          
                        if (user != "") {
                          var link="<?php echo site_url('') ?>adminvendedor/deleteproducto";                          
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
                    if (isset($productos)) {
                      foreach($productos->result() as $row)
                      {
                        ?> 
                        <tr id="<?php echo  $row->id;?>">
                         
                          <td><img src="<?php echo site_url('') ?>uploads/<?php echo  $row->img;?>" alt="" /></td>
                          <td><a href="#"><?php echo  $row->nombre;?></a><p><?php echo  $row->descripcion;?></p></td>
                          <td><?php echo  $row->precio;?></td>
                          <td> <?php echo  $row->categoria;?> - ><?php echo  $row->subcategoria;?></td>
                          <td><?php echo  $row->sucursal;?></td>
                          
                      
                          <td>


                             
                              <a href="<?php echo site_url('');?>editarproducto/buscar?idProducto=<?php echo base64_encode($row->id);?>" class="btn btn-xs btn-default" ><i class="icon-pencil"></i></a>
                              <a href="#" class="btn btn-xs btn-danger"  name="<?php echo  $row->id;?>"><i class="icon-remove"></i></a>
                          
                          </td>
                        </tr>
                        
                       

                        <?php 
                      }
                    }
                    ?>

                        


                        
                      

                      

                                                                             

                      </tbody>
                    </table>

                    <div class="widget-foot">

                       <?php echo $pagination; ?>
                      
                      <div class="clearfix"></div> 

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