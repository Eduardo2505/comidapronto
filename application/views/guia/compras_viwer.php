
<style type="text/css">




    .btndiv {
        clear: both;
        margin: 0 50px;
    }

    label {
        width: 200px;
        border-radius: 3px;
        border: 1px solid #D1D3D4
    }

    /* hide input */
    input.radio:empty {
        margin-left: -999px;
    }

    /* style label */
    input.radio:empty ~ label {
        position: relative;
        float: left;
        line-height: 2.5em;
        text-indent: 3.25em;
        margin-top: 2em;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    input.radio:empty ~ label:before {
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        left: 0;
        content: '';
        width: 2.5em;
        background: #D1D3D4;
        border-radius: 3px 0 0 3px;
    }

    /* toggle hover */
    input.radio:hover:not(:checked) ~ label:before {
        content:'\2714';
        text-indent: .9em;
        color: #C2C2C2;
    }

    input.radio:hover:not(:checked) ~ label {
        color: #888;
    }

    /* toggle on */
    input.radio:checked ~ label:before {
        content:'\2714';
        text-indent: .9em;
        color: #9CE2AE;
        background-color: #4DCB6D;
    }

    input.radio:checked ~ label {
        color: #777;
    }

    /* radio focus */
    input.radio:focus ~ label:before {
        box-shadow: 0 0 0 3px #999;
    }
</style>
<script type="text/javascript">


    $(document).ready(function() {
        $(".btneliminarpro").click(function() {
            var user = $(this).attr("name");
            var idsi = $('#idsucursvi').val();

            $("#mensajex").html("<img src=\"<?php echo site_url('') ?>resourceadmin/loading_image.gif\" >").fadeOut(1000);
            var dataString = 'idPedidosProductos=' + user + '&idSucusal=' + idsi;
            var link = "<?php echo site_url('') ?>restaurantes/eliminarpro";
            $.ajax({
                type: "GET",
                url: link,
                data: dataString,
                success: function(data) {
                    // alert(data);
                    $("#mensajex").fadeIn(1000).html(data);
                    updatecantida();


                }
            });

        });


    });


    $(document).ready(function() {
        $(".btnupdate").click(function() {
            var user = $(this).attr("name");
            var text = $('#inut' + user).val().toString();
            var idsi = $('#idsucursvi').val();

            if (text != "" && text != "0") {

                $("#mensajex").html("<img src=\"<?php echo site_url('') ?>resourceadmin/loading_image.gif\" >").fadeOut(1000);
                var dataString = 'idPedidosProductos=' + user + '&cantidad=' + text + '&idSucusal=' + idsi;
                var link = "<?php echo site_url('') ?>restaurantes/updatepedido";
                $.ajax({
                    type: "GET",
                    url: link,
                    data: dataString,
                    success: function(data) {
                        // alert(data);
                        $("#mensajex").fadeIn(1000).html(data);
                        updatecantida();


                    }
                });
            } else {

                error();
            }

        });



    });


    function error() {
        alertify.error("Coloque una cantidad valida");
        return false;
    }
    function updatecantida() {
        var dataString = 'id=1';
        var link = "<?php echo site_url('') ?>restaurantes/cantidaditems";
        $.ajax({
            type: "GET",
            url: link,
            data: dataString,
            success: function(data) {

                $(".countpro").html(data);


            }
        });
    }

</script> 
<div id="compraspro">
    <div class="items-wrapper">

        <!-- ============= CITY SEARCH ================== -->

        <?php
        $sumita = 0;

        if (isset($compras)) {
            foreach ($compras->result() as $rowc) {

                $cantida = $rowc->cantidad;
                $precio = $rowc->precio;

                $total = $cantida * $precio;
                $sumita+= $total;
                ?> 

                <div class="order-pg-items clearfix">
                    <div class="item-details-price clearfix">
                        <div class="order-item-details clearfix">
                            <div class="fig imgLiquidFill ">
                                <img src="<?php echo site_url('') ?>uploads/<?php echo $rowc->url; ?>" alt="">
                            </div>
                            <div class="figcap">
                                <h4><?php echo $rowc->Nombre; ?></h4>
                                <ul>
                                    <li><?php echo $rowc->descr; ?></li>

                                </ul>
                            </div>
                        </div>
                        <div class="order-item-price clearfix">
                            <input type="tel" id="inut<?php echo $rowc->idPedidosproductos; ?>"  onkeypress="ValidaSoloNumeros()" maxlength="5" value="<?php echo $cantida; ?>" style="color:red">
                            <h2>$ <?php echo $total; ?></h2>

                        </div>
                    </div>
                    <div class="replace-cancel clearfix">

                        <div class="replace-cancel-btn-wrapper clearfix">
                            <a class="button green-btn btnupdate" name="<?php echo $rowc->idPedidosproductos; ?>" href="#update">Actualizar</a>
                            <a class="button red-btn btneliminarpro"  name="<?php echo $rowc->idPedidosproductos; ?>" href="#eliminar">x</a>
                        </div>
                    </div>
                </div>



                <?php
            }
        }
        ?>



        <!-- ============================================ -->
    </div>
    <div class="order-value clearfix">
        <div class="total-value-details">
            <h4>El total de tu pedido es</h4>
            <h5>IVA ya incluido.</h5>
            <div class="discount-promo">
                <!--  <h5>Cupón Promocional</h5>
                <span>qwe2554er</span>-->
            </div>
        </div>
        <div class="total-value">
            <h2>$ <?php echo $sumita; ?></h2>
        </div>
    </div>

    <script type="text/javascript">

    $(function() {
        $('#formaceptar').submit(function() {
            var data = $(this).serialize();
            //$('#mensajex').html(data);
            $.get("<?php echo site_url('restaurantes/agregarPedio') ?>", data, function(respuesta) {

                //alert(respuesta);

                var dataString = 'idpedido=' + respuesta;

                var link = "<?php echo site_url('') ?>email_controller/crearpedidoPrinter";
                //   var link="<?php echo site_url('') ?>email_controller/enviarConfimacion";  
                // $('#mensajex').html(link+'?'+dataString);                           
                $.ajax({
                    type: "GET",
                    url: link,
                    data: dataString,
                    success: function(data) {
                        // alert(data);

                        var urlimpresion = "http://essy.com.mx/Demo/Imprimir.jsp?imprimir=" + data;
                        //alert(urlimpresion);
                        $("#formImprimioCorrecto").load(urlimpresion);

                        $('#mensajex').html('<h1>Se genero su pedido , se le enviara un mensaje de confirmación de su pedido</h1><br><a class="button green-btn" href="<?php echo site_url('') ?>" >Aceptar</a><br><br>');
                        // $('#mensajex').html(urlimpresion);


                    }
                });





            });

            return false;
        });
    });

    $(document).ready(function() {
        $(".continuaco").click(function() {
            $(".fa-times").click();
        });

    });

    $(document).ready(function() {
        $("#sigerea").click(function() {

            var verif = parseInt($("#verficarsumita").val());
           
            if (verif >= 100) {
                $("#compraspro").hide();
                $("#formularioEnviar").show();
            } else {
               errorCantidad();
            }
        });

    });
    $(document).ready(function() {
        $("#atrasfrom").click(function() {
            $("#compraspro").show();
            $("#formularioEnviar").hide();
        });

    });


    $(document).ready(function() {
        $(".btnsin").click(function() {
            $("#pagoefect").val("0");
            $('#pagoefect').attr('readonly', true);

        });

    });
    $(document).ready(function() {
        $("#radio3").click(function() {
            $("#pagoefect").val("");
            $('#pagoefect').attr('readonly', false);

        });

    });
    
    function errorCantidad() {
      
         $('#idmserrcantida').html('<h1>El pedido mínimo es de 100 pesos</h1>');
        return false;
    }
    </script>


    <div class="final-order clearfix">
        <?php
        if ($compras->num_rows() > 0) {
            ?>
            <a class="button green-btn" href="#" id="sigerea">Siguiente</a> <a href="#" class="button red-btn continuaco" >Continuar comprando</a>
            <div id="idmserrcantida">
                
            </div>

            <?php
        } else {
            ?>
            <h1>NO SE ENCUENTRA NINGUN PRODUCTO</h1><BR><BR>
            <a href="#" class="button red-btn continuaco" >Continuar comprando</a>
            <?php
        }
        ?>

    </div>

</div>
<div id="formularioEnviar" style="display:none">
    <div id="formImprimioCorrecto" style="display:none">
    </div>
    <form id="formaceptar">
        <input type="hidden" name="idSucursal" id="idsucursvi" value="<?php echo $idSucursalx; ?>">
        <input type="hidden" name="total" value="<?php echo $sumita; ?>" id="verficarsumita">

        <div class="info-address">
            <h3>Ingresa tu información</h3>
            <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                    <input type="text" placeholder="Nombre" name="nombre" style="color:red" required>
                </div>
                <div class="input-wrapper">
                    <input type="email" placeholder="Email" style="color:red" name="correo" required>
                </div>
            </div>
            <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                    <input type="text" placeholder="Calle" style="color:red" name="calle" required>
                </div>
                <div class="clearfix half">
                    <div class="input-wrapper">
                        <input type="text" placeholder="Num Int"  name="nuint" maxlength="5" style="color:red" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" placeholder="Nume Exte" name="numext" maxlength="10"  style="color:red" required>
                    </div>
                </div>
            </div>
            <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                    <input type="text" placeholder="Delegación" value="<?php echo $_SESSION["delg"]; ?>" readonly style="color:red" name="delegacion" required>
                </div>
                <div class="clearfix half">
                    <div class="input-wrapper">
                        <input type="tel" placeholder="C.P." value="<?php echo $_SESSION["cp"]; ?>" readonly name="cp" maxlength="5" style="color:red" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="tel" placeholder="Teléfono" onkeypress="ValidaSoloNumeros()" name="tel" maxlength="10"  style="color:red" required>
                    </div>
                </div>
            </div>
            <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                    <input type="text" placeholder="Colonia" value="<?php echo $_SESSION["colonniases"]; ?>" readonly style="color:red" name="colonia" required>
                </div>
                <div class="input-wrapper">
                    <input type="text" placeholder="¿Entre que calles?" style="color:red" name="calles" required>
                </div>
            </div>
            <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                    <textarea placeholder="Mensaje" name="mensaje" style="color:red" rows="4" cols="50"></textarea>
                </div>
                <div class="clearfix half">
                    <div class="input-wrapper">
                        <input type="tel" placeholder="Personas" onkeypress="ValidaSoloNumeros()" name="personas" maxlength="5" style="color:red" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="tel" placeholder="Cambio de algún billete" onkeypress="ValidaSoloNumeros()" name="pago" maxlength="10" id="pagoefect" style="color:red" required>
                    </div>
                </div>
            </div>


            <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                    <div class="btndiv">
                        <input type="radio"  id="radio1" class="radio btnsin" name="tipo" value="trasnsferecia" required />
                        <label for="radio1">Pay PAY</label>
                    </div>
                </div>
                <div class="input-wrapper">
                    <div class="btndiv">
                        <input type="radio" name="tipo"  value="paypal" required id="radio2" class="radio btnsin"/>
                        <label for="radio2">Transferencia</label>
                    </div>
                </div>
            </div>

            <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                    <div class="btndiv"> 
                        <input type="radio" name="tipo" value="efectivo" required id="radio3" class="radio"/>
                        <label for="radio3">Efectivo</label>
                    </div>
                </div>
                <div class="input-wrapper">
                    <div class="btndiv"> 
                        <input type="radio" name="tipo" value="OXXO" required id="radio4" class="radio btnsin"/>
                        <label for="radio4"> OXOO</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="final-order clearfix">

            <input type="submit" value="Pedir Ya!" class="button green-btn"><br>

        </div>
        <div class="final-order clearfix">
            <a class="button green-btn" href="#" id="atrasfrom">Atras</a> <a href="#" class="button red-btn continuaco">Continuar comprando</a>
        </div>

    </form>
</div>