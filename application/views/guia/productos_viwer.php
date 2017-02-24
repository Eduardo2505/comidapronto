<!DOCTYPE html>
<html>
<head>
  <?php 
  include 'plantillaviwer/cabecera.php';
  ?>
</head>
<body>
  <div class="inside-body-wrapper menu-pg">

    <header class="header-type1">
     <?php 
     include 'plantillaviwer/menuheader.php';
     ?>
   </header>
   <!-- ============ HEADER TYPE 1 ends================== -->

   <div class="wrapper">
    <div class="menu-page">

      <section class="top-content">
        <img src="<?php echo site_url('') ?>_assets/images/index-banner-sushiroll.jpg" style="width: 100%; height: auto;" >
        
      </section>        
 <?php

              $row = $sucursalbus->row(); 
              ?>
      

      <section class="main-content">
        <div class="container">

          <form class="food-options-form">
            <div class="caption">
               <h4><a href="<?php echo site_url('') ?>restaurantes/categorias?idSucursal=<?php echo $idSucursalx;?>" class="button red-btn">regresar</a> // <?php echo $row->Sucursal?></h4><br>
              <h6><?php echo $row->direccion." No. ".$row->Numero.", Delg. ".$row->delgSucursal.", Col.".$row->colSucursal." C.P. ".$row->cp?> //    </h6>
              
            </div>
            <div class="options-button clearfix">

              <div class="form-btn-area clearfix">
                <div class="no-of-dishes">
                  <h6>
                    Has seleccionado
                    <span class="countpro">
                     <?php echo $countproductos?>
                   </span>
                   productos.
                 </h6>
                 <div>
                  <img src="<?php echo site_url('') ?>_assets/images/chef-hat-icon-grey.png" height="40" width="41" alt="">
                  <span class="countpro">
                   <?php echo $countproductos?>
                 </span>
               </div>
             </div>
             <div class="button-holder">
               <!-- Notificaciones -->

               <script type="text/javascript" src="<?php echo site_url('') ?>notificaciones/lib/alertify.js"></script>
               <link rel="stylesheet" href="<?php echo site_url('') ?>notificaciones/themes/alertify.core.css" />
               <link rel="stylesheet" href="<?php echo site_url('') ?>notificaciones/themes/alertify.default.css" />
       

               <script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
               <script src="<?php echo site_url('') ?>modal/jquery.remodal.js"></script>
               <link rel="stylesheet" href="<?php echo site_url('') ?>modal/jquery.remodal.css">
              
               <span style="display:none">
                 <a class="button red-btn place-order-now-btn" id="btnclick" href="javascript:void(0)">Pedir Ya!</a>
               </span>
               <a class="button red-btn  bntverpedidos" href="javascript:void(0)">Pedir Ya!</a>
             </div>
           </div>
         </div>
         <!-- -->
       </form>



       <script type="text/javascript">
         function ok(){
          alertify.success("Se agrego correctamente"); 
          return false;
        }

        $(document).ready(function() {
          $(".disp").click(function(){
            var user = $(this).attr("name");



            var dataString = 'idProducto='+user; 
            $("#precioscon").html("<img src='<?php echo site_url('') ?>resourceadmin/loader.gif' />").fadeOut(1000);  
            var link="<?php echo site_url('') ?>restaurantes/precios";                          
            $.ajax({
              type: "GET",
              url:link,
              data: dataString,
              success: function(data) {
                                    // alert(data);
                                    $("#precioscon").fadeIn(1000).html(data);


                                  }
                                });

          });


        });

        function ValidaSoloNumeros() {
          if ((event.keyCode < 48) || (event.keyCode > 57))
            event.returnValue = false;
        }



        $(document).ready(function() {
          $(".agrgardirec").click(function(){
            var user = $(this).attr("name");


            var dataString ='idProductoAsigan='+user;

            var link="<?php echo site_url('') ?>restaurantes/guardarPedido";                          
            $.ajax({
              type: "GET",
              url:link,
              data: dataString,
              success: function(data) {
                                 // alert(data);
                                 $(".countpro").html(data);
                                 ok();



                               }
                             });

          });


        });
        
      </script> 





      <div class="remodal" data-remodal-id="modal" data-remodal-options='{ "closeOnConfirm": true }'>
        <div id="seguardocorrectament">
          


          <div id="precioscon">



          </div>
        </div>
      </div>




      <div id="mossss"></div>


      <div class="remodal" data-remodal-id="modalz">
       <script type="text/javascript">

         $(function() {
          $('#frombusqueda').submit(function() {
            var data = $(this).serialize();
            $("#mostrarresul").html('<img src="<?php echo site_url('') ?>resourceadmin/loader.gif" >').fadeOut(1000);
            $.post("<?php echo site_url('restaurantes/buscarcp')?>", data, function(respuesta) {


             $('#mostrarresul').fadeIn(1000).html(respuesta);

           });

            return false;
          });
        });


       </script>

       <form id="frombusqueda" class="formrom">
         <input type="hidden" value="<?php echo $idSucursalx?>"  name="idsucursal">
         <input type="hidden" value="<?php echo $idcategoriax?>" id="idsucr" name="idcategoria">
         <header>
          <h2>Inserte Dirección</h2>

        </header>
        <div>
          <label class="desc" id="title1" for="Field1">C.P</label>
          <div>
            <input id="Field1" name="cp" type="tel" class="field text fn" value="" size="8" tabindex="1">
          </div>
        </div>
        <div>
          <div>
            <br>
            <input class="button red-btn" type="submit" value="Enviar">
          </div>
        </div>

      </form><hr>
      <div id="mostrarresul">

      </div>
    </div>

    <?php

  echo $productos;
    ?>
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX================================================= -->


<!--
              <article class="search-menu-list lnch">
                <div class="head">
                  <img src="_assets/images/food-menu-icon.png" alt="">
                  <h2>SUSHI LAB </h2>
                  <h6>Descripción de la categoría.</h6>
                </div>
                <div class="menu-items-wrapper" >
                  <ul class="lnchSlider clearfix">
                    
                    <li class="own">
                      <div class="search-menu-items clearfix">
                        <figure>
                          <img src="_assets/images/search-food-item2.jpg" alt="">
                        </figure>
                        <div class="figcaption clearfix">
                           <div>
                             <h3>Sun Ball</h3>
                             <p>Bola de arroz con mango y aguacate por fuera, rellena de camarón, queso philadelphia y aguacate, con salsa de anguila y nuez caramelizada</p>
                           </div>
                          <div class="price-add-select clearfix">
                            <a class="button white-btn clicked" href="javascript:void(0)">Agregar a Pedido</a>
                            <a class="button green-btn" href="javascript:void(0)">selected</a>
                            <a class="button red-btn" href="javascript:void(0)">X</a>
                            <h2>$75.00</h2>
                          </div>
                        </div>
                      </div>
                    </li>

                    
                   
                  </ul>
                  <div class="nav-btns">
                    <a class="left-btn" href="javascript:void(0)"><i class="fa fa-angle-left"></i></a>
                    <a class="right-btn" href="javascript:void(0)"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </article>
			  
		
    -->
				
		

    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX================================================= -->



    <form class="food-options-form">
      <div class="caption">
        <h3><a href="<?php echo site_url('') ?>restaurantes/categorias?idSucursal=<?php echo $idSucursalx;?>" class="button red-btn">regresar</a> //<?php echo $row->Sucursal?></h3>
        <br> <h6><?php echo $row->direccion." No. ".$row->Numero.", Delg. ".$row->delgSucursal.", Col.".$row->colSucursal." C.P. ".$row->cp?></h6>
      </div>
      <div class="options-button clearfix">

        <div class="form-btn-area clearfix">
          <div class="no-of-dishes">
            <h6>
              Has seleccionado 
              <span class="countpro">
                <?php echo $countproductos?>
              </span>
              productos.
            </h6>
            <div>
              <img src="<?php echo site_url('') ?>_assets/images/chef-hat-icon-grey.png" height="40" width="41" alt="">
              <span class="countpro">
                <?php echo $countproductos?>
              </span>
            </div>
          </div>
          <div class="button-holder">


            <a class="button red-btn  bntverpedidos" href="javascript:void(0)">Pedir Ya!</a>
          </div>
        </div>
      </div>
      <!-- -->
    </form>


   


  </div>
  <!-- EVENT ends -->
  <div class="overlay">
    <div class="modal order-page">
      <i class="fa fa-times"></i>
      <div class="head clearfix">
        <div class="page-name">
          <h3><br>Tu Orden de Pedido</h3>
        </div>
        <div class="order-date-details">
          <h5>Tu Número de Orden es <span>CODIGO A GENERAR</span> </h5>

        </div>
      </div>
      <div class="sub-head clearfix">
        <div class="captn">
          <h6>A continuación te mostramos los productos que seleccionaste:</h6>
        </div>

      </div>


<?php 
 if ($sesscionac=="errr"){
  ?>
   <div  style="text-align:center">




<h1>Inserte Código Postal de Búsqueda</h1><hr><hr>



      </div>

  <?php


 }else{

  ?>
   <script type="text/javascript">


                 $(document).ready(function() {
                  $(".bntverpedidos").click(function(){



                    var dataString = 'idSucusal=<?php echo  $idSucursalx;?>';   



                    var link="<?php echo site_url('') ?>restaurantes/mostrarShoping";                          
                    $.ajax({
                      type: "GET",
                      url:link,
                      data: dataString,
                      success: function(data) {

                       $("#mensajex").html(data);

                       $("#btnclick").click();



                     }
                   });


                  });


                });

               </script> 
   <div id="mensajex" style="text-align:center">








      </div>

  <?php

 }

  ?>
     

    </div>
    <!-- MODAL ends -->
  </div>
  <!-- OVERLAY ends -->
</div>
<!-- WRAPPER ends -->

<!-- ============ FOOTER ================== -->
<footer>
 <?php 
 include 'plantillaviwer/folder.php';
 ?>
</footer>
</div><!-- inside-body-wrapper ends -->





<!-- google maps -->



<!-- bxSlider Javascript file -->
<!--<script src="<?//php echo site_url('') ?>_assets/js/jquery.bxslider.min.js"></script>
<script src="<?php //echo site_url('') ?>_assets/js/myCustom.js"></script>
<script src="<?php //echo site_url('') ?>_assets/js/food-items-carousel.js"></script>-->
<!-- Events -->
<script>
  $(document).on("open", ".remodal", function () {
    console.log("open");
  });

  $(document).on("opened", ".remodal", function () {
    console.log("opened");
  });

  $(document).on("close", ".remodal", function (e) {
    console.log('close' + (e.reason ? ", reason: " + e.reason : ''));
  });

  $(document).on("closed", ".remodal", function (e) {
    console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on("confirm", ".remodal", function () {
    console.log("confirm");
  });

  $(document).on("cancel", ".remodal", function () {
    console.log("cancel");
  });

//    You can open or close it like this:
//    $(function () {
//        var inst = $.remodal.lookup[$("[data-remodal-id=modal]"").data("remodal")];
//        inst.open();
//        inst.close();
//    });

    //  Or init in this way:
 //   var inst = $("[data-remodal-id=modal2]").remodal();
    //  inst.open();
  </script>
</body>
</html>
<!-- ====================================== -->