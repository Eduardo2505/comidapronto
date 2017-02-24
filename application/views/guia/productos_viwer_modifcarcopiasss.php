<?php

              $row = $sucursalbus->row(); 
              ?>
<!DOCTYPE html>
<html>
  <head>
      <?php 
  include 'plantillaviwer/cabecera.php';
  ?>
  </head>
  
  <body>
    <div class="inside-body-wrapper menu-pg">
      <!-- ============ HEADER TYPE 1 ================== -->
      <!-- ============ HEADER TYPE 2 ================== -->
  <header class="header-type1">
     <?php 
     include 'plantillaviwer/menuheader.php';
     ?>

   </header>

      <div class="wrapper">
        <div class="menu-page">
          <!-- <section class="banner" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-50"> -->
          <section class="banner">
            <div class="good-food">
              <div class="container">
                <article class="banner-caption">
                  <h5><span></span> Awesome spices-a multi cuisine restaurant theme <span></span> </h5>
                  <h2>IT'S ALL ABOUT GOOD FOOD</h2>
                </article>
              </div>
            </div>
          </section>
          <section class="main-content">
            <div class="container">
              <form class="food-options-form">
               <div class="caption">
              <h3><?php echo $row->Sucursal?></h3>
              <h6><?php echo $row->direccion." No. ".$row->Numero.", Delg. ".$row->delgSucursal.", Col.".$row->colSucursal." C.P. ".$row->cp?></h6>
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
                  <script type="text/javascript">var selectedDishes = 0;</script>

              </form>

<?php

echo $productos;
?>

            <!--
              <article class="search-menu-list brkfast show">
               
                <div class="menu-items-wrapper" >
                  <ul class="brkfstSlider clearfix">
                    
                
                  </ul>
                 
                </div>
              </article>

              <article class="search-menu-list lnch">
                
                <div class="menu-items-wrapper" >
                  <ul class="lnchSlider clearfix">
                   
                  
                  </ul>
                 
                </div>
              </article>

              <article class="search-menu-list dinr">
               
                <div class="menu-items-wrapper" >
                  <ul class="dnnrSlider clearfix">
                   
                  
                  </ul>
                  
                </div>
              </article>

            
              <article class="search-menu-list drinks">
              
                <div class="menu-items-wrapper" >
                  <ul class="bxslider drnkSlider clearfix">
             
                   
                  </ul>
              
                </div>
              </article>

-->
             



              <div class="complete-search clearfix">
                <div class="left-sectn">
                   <h3><?php echo $row->Sucursal?></h3>
              <h6><?php echo $row->direccion." No. ".$row->Numero.", Delg. ".$row->delgSucursal.", Col.".$row->colSucursal." C.P. ".$row->cp?></h6>
                </div>
                <div class="right-sectn clearfix">
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
                  <!-- NO-OF-DISHES ends -->
                  <div class="button-holder">
                    <a class="button red-btn  bntverpedidos" href="javascript:void(0)">Pedir Ya!</a>
                  </div>
                  <!-- BUTTON-HOLDER ends -->
                </div>
                <!-- RIGHT-SECTN ends -->
              </div>
            </div>
            <!-- CONTAINER ends -->
          </section>
          <section class="map-search">
            <div class="container">
              <!-- ============= CITY SEARCH ================== -->
              <article class="city-search clearfix">
                <div class="search-caption">
                  <h4>WE ARE</h4>
                  <h4>AT YOUR CITY</h4>
                </div>
                <div class="search-form">
                  <form id="map-search-form">
                    <div>
                    <input type="text" id="mapCity" name="mapCity" placeholder="Enter your city name">
                    </div>
                    <div>
                    <input type="text" id="mapPin" name="mapPin" placeholder="Enter your pincode">
                    </div>
                    <button class="button">FIND NOW</button>
                  </form>
                </div>
              </article>
              <!-- ============================================ -->
            </div>
            <!-- <img src="_assets/images/map-search.jpg" alt=""> -->
            <div id="map-canvas" ></div>
          </section>
        </div>
        <!-- EVENT ends -->
        <div class="overlay">
          <div class="modal order-page">
            <i class="fa fa-times"></i>
            <div class="head clearfix">
              <div class="page-name">
                <h3>order page</h3>
              </div>
              <div class="order-date-details">
                <h5>Your order ID is <span>aq19873562kp</span> </h5>
                <h6>Wednesday, 28th May 2014</h6>
              </div>
            </div>
            <div class="sub-head clearfix">
              <div class="captn">
                <h6>Your selected items are listed below</h6>
              </div>
              <div class="no-of-dishes">
                <h6>You have selected <span class="selected-dishes-no">0</span> dishes.</h6>
                <div>
                  <img src="_assets/images/chef-hat-icon-grey.png" height="40" width="41" alt="">  
                  <span class="selected-dishes-no">0</span>
                </div>
              </div>
            </div>
            <div class="items-wrapper">
              <!-- ============= CITY SEARCH ================== -->
              <div class="order-pg-items clearfix">
                <div class="item-details-price clearfix">
                  <div class="order-item-details clearfix">
                    <div class="fig imgLiquidFill imgLiquid">
                      <img src="_assets/images/recipe1.jpg" alt="">
                    </div>
                    <div class="figcap">
                      <h4>Recipe Name</h4>
                      <ul>
                        <li>ingredients</li>
                        <li>ingredients</li>
                        <li>ingredients</li>
                      </ul>
                    </div>
                  </div>
                  <div class="order-item-price clearfix">
                    <h2>$10.99</h2>
                    <select name="" >
                      <option value="">For 1 person</option>
                      <option value="">For 2 person</option>
                      <option value="">For 3 person</option>
                      <option value="">For 4 person</option>
                    </select>
                  </div>
                </div>
                <div class="replace-cancel clearfix">
                  <div class="order-item-price">
                    <select name="" >
                      <option value="">For 1 person</option>
                      <option value="">For 2 person</option>
                      <option value="">For 3 person</option>
                      <option value="">For 4 person</option>
                    </select>
                  </div>
                  <div class="replace-cancel-btn-wrapper clearfix">
                    <a class="button green-btn" href="javascript:void(0)">replace</a>
                    <a class="button red-btn" href="javascript:void(0)">x</a>
                  </div>
                </div>
              </div>
              <div class="order-pg-items clearfix">
                <div class="item-details-price clearfix">
                  <div class="order-item-details clearfix">
                    <div class="fig imgLiquidFill imgLiquid">
                      <img src="_assets/images/recipe1.jpg" alt="">
                    </div>
                    <div class="figcap">
                      <h4>Recipe Name</h4>
                      <ul>
                        <li>ingredients</li>
                        <li>ingredients</li>
                        <li>ingredients</li>
                      </ul>
                    </div>
                  </div>
                  <div class="order-item-price clearfix">
                    <h2>$10.99</h2>
                    <select name="" >
                      <option value="">For 1 person</option>
                      <option value="">For 2 person</option>
                      <option value="">For 3 person</option>
                      <option value="">For 4 person</option>
                    </select>
                  </div>
                </div>
                <div class="replace-cancel clearfix">
                  <div class="order-item-price">
                    <select name="" >
                      <option value="">For 1 person</option>
                      <option value="">For 2 person</option>
                      <option value="">For 3 person</option>
                      <option value="">For 4 person</option>
                    </select>
                  </div>
                  <div class="replace-cancel-btn-wrapper clearfix">
                    <a class="button green-btn" href="javascript:void(0)">replace</a>
                    <a class="button red-btn" href="javascript:void(0)">x</a>
                  </div>
                </div>
              </div>
              <div class="order-pg-items clearfix">
                <div class="item-details-price clearfix">
                  <div class="order-item-details clearfix">
                    <div class="fig imgLiquidFill imgLiquid">
                      <img src="_assets/images/recipe1.jpg" alt="">
                    </div>
                    <div class="figcap">
                      <h4>Recipe Name</h4>
                      <ul>
                        <li>ingredients</li>
                        <li>ingredients</li>
                        <li>ingredients</li>
                      </ul>
                    </div>
                  </div>
                  <div class="order-item-price clearfix">
                    <h2>$10.99</h2>
                    <select name="" >
                      <option value="">For 1 person</option>
                      <option value="">For 2 person</option>
                      <option value="">For 3 person</option>
                      <option value="">For 4 person</option>
                    </select>
                  </div>
                </div>
                <div class="replace-cancel clearfix">
                  <div class="order-item-price">
                    <select name="" >
                      <option value="">For 1 person</option>
                      <option value="">For 2 person</option>
                      <option value="">For 3 person</option>
                      <option value="">For 4 person</option>
                    </select>
                  </div>
                  <div class="replace-cancel-btn-wrapper clearfix">
                    <a class="button green-btn" href="javascript:void(0)">replace</a>
                    <a class="button red-btn" href="javascript:void(0)">x</a>
                  </div>
                </div>
              </div>
              <!-- ============================================ -->
            </div>
            <div class="order-value clearfix">
              <div class="total-value-details">
                <h4>Your total value is</h4>
                <h5>After adding all tax</h5>
                <div class="discount-promo">
                  <h5>Use discount promo</h5>
                  <span>qwe2554er</span>
                </div>
              </div>
              <div class="total-value">
                <h2>$ 40.48</h2>
              </div>
            </div>
            <div class="info-address">
              <h3>your info and address</h3>
              <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                  <input type="text" placeholder="Your name">
                </div>
                <div class="input-wrapper">
                  <input type="text" placeholder="Email Id">
                </div>
              </div>
              <div class="clearfix outer-wrapper">
                <div class="input-wrapper">
                  <input type="text" placeholder="Write your full address">
                </div>
                <div class="clearfix half">
                  <div class="input-wrapper">
                    <input type="text" placeholder="Pin code">
                  </div>
                  <div class="input-wrapper">
                    <input type="text" placeholder="Phone no">
                  </div>
                </div>
              </div>
            </div>
            <div class="final-order clearfix">
              <button class="button green-btn">order now</button>
              <span>
              <input type="checkbox">Confirm and proceed
              </span>
            </div>
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
    </div>
    



    
  </body>
</html>
<!-- ====================================== -->