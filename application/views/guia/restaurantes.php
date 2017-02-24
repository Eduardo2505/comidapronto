<!DOCTYPE html>
<html>
   <head>
     <?php 
    include 'plantillaviwer/cabecera.php';
    ?>
</head>

<body>
  <div class="inside-body-wrapper">
    
    
    <header class="header-type1">
             <?php 
      include 'plantillaviwer/menuheader.php';
    ?>
    </header><!-- ============ HEADER ================== -->


        <div class="wrapper">
          <div class="event-page">
          <hr>

     
        <div class="wrapper">
          <div class="homepage homepage2">

            <section class="main-content" >
              <div class="container" >
                  
                                <form class="food-options-form">
                                  <div class="caption">
                                    <h3>Ordenar por</h3>
                                        <h6>Organiza tu pedido...</h6>
                                  </div>
                                  <div class="options-button clearfix">
                    <script type="text/javascript">var selectedDishes = 0;</script>
                                        <div class="form-btn-area clearfix">
                                          <div class="button-holder">
                                            <a class="button red-btn place-order-now-btn" href="#">RELEVANCIA</a>
                                          </div>
                                          <div class="button-holder">
                                            <a class="button red-btn place-order-now-btn" href="#">CALIFICACIÓN</a>
                                          </div>
                                          <div class="button-holder">
                                            <a class="button red-btn place-order-now-btn" href="<?php echo site_url('') ?>restaurantes/filtro?tipo=<?php echo base64_encode($tipo)?>&orden=<?php echo base64_encode("s.pedidominimo")?>">PEDIDO MÍNIMO</a>
                                          </div>
                                          <div class="button-holder">
                                            <a class="button red-btn place-order-now-btn" href="<?php echo site_url('') ?>restaurantes/filtro?tipo=<?php echo base64_encode($tipo)?>&orden=<?php echo base64_encode("s.EntregaAprox")?>">TIEMPO/ENTREGA</a>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- -->
                                </form>  
                                
               <article class="archive-list">
                         
                            <a class="activofil" href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.envioGratis&tipo=-s.envioGratis<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>">Entrega Gratis</a>
                            <a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.disponiblerecoger&tipo=-s.disponiblerecoger<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>" >Disponible para recoger</a>
                             <a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.promociones&tipo=-s.promociones<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>" >Ofertas</a>
                              <a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.pagoenLinea&tipo=-s.pagoenLinea<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>&orden=<?php echo base64_encode($orden)?>" class="btnfitelpag">Pago en línea</a>
                            <a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.aceptobonos&tipo=-s.aceptobonos<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>&orden=<?php echo base64_encode($orden)?>" class="btnfitelpag">Acepta bono</a>
                  </article>     
                      
                  
   <div id="filtroSucursales">
                     <article class="event-sectn" >


                        <div class="featured-events">
                           <h4>Pide a domicilio en <?php echo $sucursales->num_rows(); ?> restaurantes </h4>


                         


                           <!-- ============ FEATURED EVENTS ================== -->
            <?php
                    if (isset($sucursales)) {
                      foreach($sucursales->result() as $row)
                      {
                        ?> 
                       
                        <div class="feature-events clearfix">
                              <div class="figure">
                                 <div class="imgLiquidFill imgLiquid" >
                                    <img src="<?php echo site_url('') ?>uploads/<?php echo  $row->url;?>" alt="" >
                                    <div class="shine"></div>
                                 </div>
                              </div>
                             <div class="figcaption event">
                                  <div class="corner-details">
                                    <div class="corner-date"><?php echo  $row->Sucursal;?></div>
                                    <div class="corner-time"><i class="fa fa-clock-o"></i><?php echo  $row->Nombre;?></div>
                                  </div>

                             
                               <h5><?php echo  $row->Pais;?></h5>

                               <p><?php echo  $row->direccion;?>,<?php echo  $row->numero;?>, Delg <?php echo  $row->delgSucursal;?>, Col. <?php echo  $row->colSucursal;?> Tel. <?php echo  $row->telefono;?></p>
                                <p><img src="<?php echo site_url('') ?>img/arena.png"  /> Entrega Aproximada: <strong><?php echo  $row->EntregaAprox;?></strong>.<br><img src="<?php echo site_url('') ?>img/moto.png"  /> Costo de Envío: <strong>$ <?php echo  $row->costoenvio;?></strong><br><img src="<?php echo site_url('') ?>img/carrito.png"  /> Pedido Mínimo: <strong>$ <?php echo  $row->pedidominimo;?></strong>

                                  <?php

                                  $p1=$row->ap;
                                  $p2=$row->bp;
                                  $p3=$row->cp;
                                  $p4=$row->dp;
                                  $p5=$row->dpr;
                                 
                                  $pre=1;
                                  if($p1==$pre){
                                  echo "<br>• Envio Gratis";
                                  }
                                  if($p2==$pre){
                                    echo " <br>• Disponible para recoger";
                                  }
                                  if($p3==$pre){
                                    echo " <br>• Pago en Línea";
                                    
                                  }
                                  if($p4==$pre){
                                    echo "<br>• Aceptamos Bonos";
                                    
                                  }

                                  if($p5==$pre){
                                    echo "<br>• Promociones";
                                    
                                  }
                                  ?>
                                       </p>                           
                                <a class="button" href="<?php echo site_url('') ?>restaurantes/categorias?idSucursal=<?php echo  $row->id;?>">IR A MENU</a>
                              </div>
                           </div>
                       

                        <?php 
                      }
                    }
                    ?>
                           
                           <!-- ============= FEATURED EVENTS ends============== -->
                      



                        </div>
                     </article>
                     </div>
                     <article class="widget-sectn">
                     <style type="text/css">
                      a.activofil{
                       background-color:#db4f44;color:#FFFFFF

                     }

                     </style>
                        <!-- ============ WIDGETS ================== -->
                        <article class="archive-list">
                           <h4>Filtrar Restaurantes</h4>
                           <ul class="clearfix">
                              <li><a class="activofil" href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.envioGratis&tipo=-s.envioGratis<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>">Entrega Gratis</a></li></br>
                              <li><a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.disponiblerecoger&tipo=-s.disponiblerecoger<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>" >Disponible para recoger</a></li></br>
                              <li><a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.promociones&tipo=-s.promociones<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>" >Ofertas</a></li></br>
                              <li><a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.pagoenLinea&tipo=-s.pagoenLinea<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>&orden=<?php echo base64_encode($orden)?>" class="btnfitelpag">Pago en línea</a></li></br>
                              <li><a href="<?php echo site_url('') ?>restaurantes/filtro?idt=-s.aceptobonos&tipo=-s.aceptobonos<?php echo $tipo?>&orden=<?php echo base64_encode($orden)?>&orden=<?php echo base64_encode($orden)?>" class="btnfitelpag">Acepta bono</a></li></br>
                           </ul>
                        </article>
                        <article class="archive-list">
                           <h4>Cocinas</h4>
                         <!--  <ul class="clearfix">
                           <?php
                    if (isset($cadenas)) {
                      foreach($cadenas->result() as $rowc)
                      {
                        ?> 
                          <li><a href="<?php echo  $rowc->idCadena;?>"><?php echo  $rowc->Nombre;?></a></li></br>

                        <?php 
                      }
                    }
                        ?>
                              
                           </ul>-->
                        </article>                        
                     
                        <!-- ============ WIDGETS ================== -->
                        <figure class="advertisement">
                           <img src="<?php echo site_url('') ?>_assets/images/page-ad.jpg" alt="">
                        </figure>
                        <article class="newsletter">
                           <h4>Newsletter</h4>
                           <form id="event-newsletter" class="clearfix">
                              <input type="text" id="eventNewsName" placeholder="Nombre">
                              <input type="text" id="eventNewsEmail" placeholder="Email">
                              <button class="button red-btn">enviar</button>
                              <div class="form-message">
                                <div><div class="loader">Cargando...</div></div>
                              </div>
                           </form>
                        </article>
                     </article>
                  </div>
               </section>


        <section class="contact-us">
          <div class="container">
            <img src="<?php echo site_url('') ?>_assets/images/booking-icon.png" alt="">
            <h2>Contáctanos</h2>
            <h4>Estamos para escucharte siempre!</h4>

            <form id="contact-us-form" class="clearfix">
              <div class="left-sect">
                <div class="input-wrapper">
                  <input type="text" id="contactName" name="contactName" placeholder="Tu Nombre">
                </div>
                <div class="input-wrapper">
                  <input type="text" id="contactComment" name="contactComment" placeholder="Tus Comentarios">
                </div>
              </div>
              <div class="right-sect">
                <div class="input-wrapper">
                  <input type="text" id="contactEmail" name="contactEmail" placeholder="Tu Email">
                </div>
                <button class="button red-btn">Enviar</button>
                <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some </p> -->
                <div class="contact-form-msg form-message" >
                  <div><div class="loader">Cargando...</div></div>
                </div>
              </div>
              
            </form>

          </div>
        </section>


            </div>
            <!-- EVENT ends -->
         </div>
         <!-- WRAPPER ends -->

         
         <!-- ============ FOOTER ================== -->
         <footer>
          <?php 
      include 'plantillaviwer/folder.php';
    ?>
          
         </footer>
      </div> <!-- inside-body-wrapper ends -->



        

      <?php
       //session_start();
//Este es es el mensaje con el cual verifica si la fecha es correcta

      
       if ("hol"=="eroor"){


       
      ?>
<style>
        .overlay{
            background:transparent url(images/overlay.png) repeat top left;
            position:fixed;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
            z-index:100;
        }
        .box{
            position:fixed;
            top:-200px;
            left:30%;
            right:30%;
            background-color:#fff;
            color:#7F7F7F;
            padding:20px;
            border:2px solid #ccc;
            -moz-border-radius: 20px;
            -webkit-border-radius:20px;
            -khtml-border-radius:20px;
            -moz-box-shadow: 0 1px 5px #333;
            -webkit-box-shadow: 0 1px 5px #333;
            z-index:101;
        }
        .box h1{
            border-bottom: 1px dashed #7F7F7F;
            margin:-20px -20px 0px -20px;
            padding:10px;
            background-color:#FFEFEF;
            color:#EF7777;
            -moz-border-radius:20px 20px 0px 0px;
            -webkit-border-top-left-radius: 20px;
            -webkit-border-top-right-radius: 20px;
            -khtml-border-top-left-radius: 20px;
            -khtml-border-top-right-radius: 20px;
        }
        a.boxclose{
            float:right;
            width:26px;
            height:26px;
            background:transparent url(images/cancel.png) repeat top left;
            margin-top:-30px;
            margin-right:-30px;
            cursor:pointer;
        }

    </style>
    <style type="text/css">




.formrom form > div {
  clear: both;
  overflow: hidden;
  padding: 1px;
  margin: 0 0 10px 0;
}
.formrom form > div > fieldset > div > div {
  margin: 0 0 5px 0;
}
.formrom form > div > label,
.formrom legend {
  width: 25%;
  float: left;
  padding-right: 10px;
}



.formrom input[type=text]{
  width: 100%;
  border-top: 1px solid #ccc;
  border-left: 1px solid #ccc;
  border-right: 1px solid #eee;
  border-bottom: 1px solid #eee;
}
.formrom input[type=text] {
  width: 50%;
}
.formrom input[type=text]:focus {
  outline: 0;
  border-color: #4697e4;
}

@media (max-width: 600px) {
 .formrom form > div {
    margin: 0 0 15px 0; 
  }
 .formrom form > div > label,
  .formrom legend {
    width: 100%;
    float: none;
    margin: 0 0 5px 0;
  }
  .formrom form > div > div,
  .formrom form > div > fieldset > div {
    width: 100%;
    float: none;
  }
  .formrom input[type=text],
  .formrom select {
    width: 100%; 
  }
}
@media (min-width: 1200px) {
  .formrom form > div > label,
  .formrom legend {
    text-align: right;
  }
}

.formrom form header {
  margin: 0 0 20px 0; 
}
.formrom form header div {
  font-size: 90%;
  color: #999;
}
.formrom form header h2 {
  margin: 0 0 5px 0;
}
    </style>
   
       
    
        <div class="overlay" id="overlay" style="display:none;"></div>
        <div class="box" id="box" style="text-align: center">
          
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

       
        <script type="text/javascript">

        $( document ).ready(function() {

            $('#overlay').fadeIn('fast',function(){
                        $('#box').animate({'top':'160px'},500);
                    });
            });
           
        </script>

        <?php
            }
      ?>
   </body>
</html>
<!-- ====================================== -->