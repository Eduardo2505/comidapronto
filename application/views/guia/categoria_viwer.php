

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
      <div class="food-gallery">

        <section class="banner">
        <?php

           $row = $sucursalbus->row(); 
        ?>


          <!-- <article class="banner-img">
            <img src="<?php echo site_url('') ?>_assets/images/food-solution-bg.jpg" alt="">
          </article> -->

          <div class="container">
            <article class="banner-caption">
              <h5><span></span> Disfruta de le mejor comida en linea <span></span></h5>
              <h2> <?php echo $row->Sucursal?></h2>
            </article>
          </div>
        </section>


        <section class="main-content">
          <div class="container">
          <div class="head">
            
            <h1>Categorías</h1><a href="<?php echo site_url('') ?>restaurantes">Atras</a>
            </div>

            <article class="content-wrapper clearfix food-items" id="food-items">
            <?php
                    if (isset($categoria)) {
                      foreach($categoria->result() as $row)
                      {
                        ?> 
                <div class="food-item-wrapper appetizers">
                <div class="food-item">
                  <div class="figure ">
                  <a  href="<?php echo site_url('') ?>restaurantes/productos?idSucursal=<?php echo $idSucursal ?>&idCategoria=<?php echo  $row->idcategoria;?>"> <img src="<?php echo site_url('') ?>uploads/img/<?php echo  $row->url;?>" alt=""></a>
                  </div>

                  <div class="figcaption clearfix">
                 <a  href="<?php echo site_url('') ?>restaurantes/productos?idSucursal=<?php echo $idSucursal ?>&idCategoria=<?php echo  $row->idcategoria;?>">    <h3><?php echo  $row->categoria;?></h3></a>
                   
                    
                  </div>

                  
                </div>
              </div>
                        

                        <?php 
                      }
                    }
                    ?>
            
              
  
              
              
              
              
              
              
              
            </article>
            
          </div> <!-- CONTAINER ends -->
        </section> <!-- MAIN CONTENT ends -->



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

  </div> <!-- EVENT ends -->
</div> <!-- WRAPPER ends -->


<!-- ============ FOOTER ================== -->
    <footer>
       <?php 
      include 'plantillaviwer/folder.php';
    ?>
    </footer>

    </div> <!-- inside-body-wrapper ends -->



    
    

  </body>
</html><!-- ====================================== -->
  