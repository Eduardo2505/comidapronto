
<?php
include 'plantilla/top.php';
?>
<!-- Sidebar ends -->

<!-- Main bar -->
<div class="mainbar">

    <!-- Page heading -->
    <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left"><i class="icon-home"></i> Categorías

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
                <div class="col-md-9">

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Categorías</div>
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

                                        <th>ICONO</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>




                                        <th>Pisición</th>
                                        <th>Control</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('.btn-danger').click(function() {
                                            var user = $(this).attr("name");

                                            var dataString = 'id=' + user;

                                            if (user != "") {
                                                var link = "<?php echo site_url('') ?>categorias/eliminar";
                                                $.ajax({
                                                    type: "GET",
                                                    url: link,
                                                    data: dataString,
                                                    success: function(data) {

                                                        $('#' + user).remove();



                                                    }
                                                });
                                                //}
                                            }
                                        }


                                        );
                                    });
                                    //Funcion para  actualizar posición
                                    $(document).ready(function() {
                                        $('.actualizarposicion').submit(function() {
                                            var data = $(this).serialize();

                                            $.get('<?php echo site_url('') ?>categorias/actualizarposicion', data, function(respuesta) {

                                                $('#msn' + respuesta).html('<div class="alert-success">Se actualizo corectamente</div>');
                                                setTimeout(function() {
                                                    $('#msn' + respuesta).fadeOut(1000);
                                                }, 3000);

                                            });
                                            return false;
                                        });
                                    });
                                    
                                    function isNumberKey(evt)
                                            {
                                                var charCode = (evt.which) ? evt.which : event.keyCode
                                                if (charCode > 31 && (charCode < 48 || charCode > 57))
                                                    return false;

                                                return true;
                                            }
                                </script>
                                <?php
                                if (isset($categorias)) {
                                    foreach ($categorias->result() as $row) {
                                        ?> 
                                        <tr id="<?php echo $row->idCategorias; ?>">


                                            <td><img src="<?php echo site_url('') ?>uploads/img/<?php echo $row->url; ?>" alt="" /></td>
                                            <td><?php echo $row->Nombre; ?></td>

                                            <td><?php echo $row->Descripcion; ?></td>




                                            <td>
                                                <form class="navbar-form actualizarposicion"  >
                                                    <input type="hidden" name="id" value="<?php echo $row->idCategorias ?>">
                                                    <div class="col-lg-4">
                                                        <input type="text" onkeypress="return isNumberKey(event)" value="<?php echo $row->posicion; ?>"  class="form-control" name="posicion" required="">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="submit" class="btn btn-danger" value="Actualizar">

                                                    </div>
                                                    <span id="msn<?php echo $row->idCategorias ?>"> </span>




                                                </form>
                                            </td>
                                            <td>



                                                <a href="<?php echo site_url(''); ?>categorias/editar?id=<?php echo base64_encode($row->idCategorias); ?>" class="btn btn-xs btn-default" ><i class="icon-pencil"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger"  name="<?php echo $row->idCategorias; ?>"><i class="icon-remove"></i></a>


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