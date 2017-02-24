
<article class="event-sectn">
    <div class="featured-events">
        <h4>Pide a domicilio en 2 restaurantes en Cuauhtémoc, Ciudad de México xxxx</h4>

        <!-- ============ FEATURED EVENTS ================== -->
        <?php
        if (isset($sucursales)) {
            foreach ($sucursales->result() as $row) {
                ?> 
                <?php echo site_url('') ?>uploads/<?php echo $row->url; ?>
                <div class="feature-events clearfix">
                    <div class="figure">
                        <div class="imgLiquidFill imgLiquid" >
                            <img src="<?php echo site_url('') ?>uploads/<?php echo $row->url; ?>" alt="" >
                            <div class="shine"></div>
                        </div>
                    </div>
                    <div class="figcaption event">
                        <div class="corner-details">
                            <div class="corner-date">NOMBRE RESTAURANT</div>
                            <div class="corner-time"><i class="fa fa-clock-o"></i>CLASIFICACIÓN</div>
                        </div>

                        <h4><?php echo $row->Sucursal; ?></h4>
                        <h5><?php echo $row->Pais; ?></h5>

                        <p><?php echo $row->direccion; ?>, Delg <?php echo $row->delgSucursal; ?>, Col. <?php echo $row->colSucursal; ?> Tel. <?php echo $row->telefono; ?></p>
                        <p>Tipo de Comida: <strong><?php echo $row->palabrasClaves; ?></strong><br>• Entrega Aproximada: <strong><?php echo $row->EntregaAprox; ?></strong>.<br>• Costo de Envío: <strong>$ <?php echo $row->costoenvio; ?></strong><br>• Pedido Mínimo: <strong>$ <?php echo $row->pedidominimo; ?></strong>

                            <?php
                            $p1 = $row->ap;
                            $p2 = $row->bp;
                            $p3 = $row->cp;
                            $p4 = $row->dp;

                            $pre = 1;
                            if ($p1 == $pre) {
                                echo "<br> Envio Gratis";
                            }
                            if ($p2 == $pre) {
                                echo '<br><img src="' . site_url('') . 'img/moto" alt="" width="20px" height="20px"> Disponible para recoger';
                            }
                            if ($p3 == $pre) {
                                echo " <br>• Pago en Línea";
                            }
                            if ($p4 == $pre) {
                                echo "<br>• Aceptamos Bonos";
                            }
                            ?>
                        </p>                             
                        <a class="button" href="<?php echo $row->id; ?>">IR A MENU</a>
                    </div>
                </div>


                <?php
            }
        }
        ?>





    </div>

</article>



<script>
    $(document).ready(function() {
        'use strict';

        $("#event-newsletter").validate({
            rules: {
                eventNewsName: {required: true},
                eventNewsEmail: {required: true, email: true}
            },
            submitHandler: function(form) {
                var newsEmail = $("#eventNewsEmail").val();
                var newsName = $("#eventNewsName").val();

                $('#event-newsletter .form-message').show();

                var data = {email: newsEmail, ename: newsName};
                $.post('check.php', data, function(response) {
                    $('#event-newsletter .form-message').html(response);
                    $('#event-newsletter .form-message').show();

                    $('#event-newsletter').each(function() {
                        this.reset(); //CLEARS THE FORM AFTER SUBMISSION
                    });
                });

                return false;
            }
        });
    });
</script>      
<!-- ============= FEATURED EVENTS ends============== -->
