<?php echo $error ?>
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