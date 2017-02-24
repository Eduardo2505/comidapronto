
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
                            <div class="pull-left">Asigmacion Sub-Categorías</div>
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

                                            <th>ICONO</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>


                                            <th>Categoría</th>
                                            <th>Pisición</th>
                                            <th>Control</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('.eliminarasuga').click(function() {
                                                var user = $(this).attr("name");

                                                var dataString = 'id=' + user;

                                                if (user != "") {
                                                    var link = "<?php echo site_url('') ?>subcategorias/eliminarasig";
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

                                        $(document).ready(function() {
                                            $('.actualizarposicion').submit(function() {
                                                var data = $(this).serialize();

                                                $.get('<?php echo site_url('') ?>subcategorias/actualizarposicion', data, function(respuesta) {

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
                                    if (isset($subcategorias)) {
                                        foreach ($subcategorias->result() as $row) {
                                            ?> 
                                            <tr id="<?php echo $row->idcatesub; ?>">


                                                <td><img src="<?php echo site_url('') ?>uploads/img/<?php echo $row->img; ?>" alt="" /></td>
                                                <td><?php echo $row->Nombre; ?></td>

                                                <td><?php echo $row->Descripcion; ?></td>

                                                <td><?php echo $row->categoria; ?></td>
                                                <td>
                                                    <form class="navbar-form actualizarposicion"  >
                                                        <input type="hidden" name="id" value="<?php echo $row->idCategoriaSubcate; ?>">
                                                        <div class="col-lg-4">
                                                            <input type="text"  onkeypress="return isNumberKey(event)" value="<?php echo $row->posicion; ?>"  class="form-control" name="posicion" required="">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="submit" class="btn btn-danger" value="Actualizar">

                                                        </div>
                                                        <span id="msn<?php echo $row->idCategoriaSubcate; ?>"> </span>




                                                    </form>
                                                </td>

                                                <td>




                                                    <a href="#" class="btn btn-xs btn-danger eliminarasuga"  name="<?php echo $row->idcatesub; ?>"><i class="icon-remove"></i></a>

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

                <div class="col-md-4">


                    <div class="widget wgreen">

                        <div class="widget-head">
                            <div class="pull-left">SubCategorias</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                                <a href="#" class="wclose"><i class="icon-remove"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="widget-content">
                            <div class="padd">


                                <!-- Form starts.  -->

                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#fromasignar').submit(function() {
                                            var data = $(this).serialize();
                                            $('#acutailizarresultado').html("Cargando...");
                                            $.get("<?php echo site_url('subcategorias/asiganar') ?>", data, function(respuesta) {
                                                $('#acutailizarresultado').html(respuesta);

                                            });

                                            return false;
                                        });
                                    });
                                </script>
                                <form class="form-horizontal" role="form" id="fromasignar">







                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Categorías</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="idCate">
                                                <?php
                                                if (isset($categorias)) {
                                                    foreach ($categorias->result() as $rowc) {
                                                        ?> 



                                                        <option value="<?php echo $rowc->idCategorias; ?>"><?php echo $rowc->Nombre; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Subcategoría</label>
                                        <div class="col-lg-6">
                                            <select  class="form-control" name="idSubcate">
                                                <?php
                                                if (isset($subcategoriasx)) {
                                                    foreach ($subcategoriasx->result() as $rows) {
                                                        ?> 


                                                        <option value="<?php echo $rows->idSubcategoria; ?>"><?php echo $rows->Nombre; ?></option>



                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="col-lg-3">
                                            <a href="<?php echo site_url('') ?>subcategorias/registro" class="btn btn-info">+</a>
                                            <a href="<?php echo site_url('') ?>Subcategorias/mostrarVer" class="btn btn-danger"><i class="icon-pencil"></i></a>
                                        </div>
                                    </div> 

                                    <hr />
                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-9">
                                            <input  type="submit" class="btn btn-default" value="Enviar">


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
<!-- Content ends -->

<?php
include 'plantilla/footerupdate.php';
?>