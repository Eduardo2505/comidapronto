

<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'plantillaviwer/cabecera.php';
        ?>
    </head>

    <body>
        <div class="inside-body-wrapper index-pg">
            <!-- ============ HEADER TYPE 2 ================== -->
            <header class="header-type1">
                <?php
                include 'plantillaviwer/menuheader.php';
                ?>
            </header><!-- ============ HEADER ================== -->

            <a href="javascript:void(0)" class="login-btn"><i class="fa  fa-user"></i><span>Login</span></a>



            <div class="wrapper">
                <div class="homepage homepage2">

                    <section class="top-content">
                        <img src="_assets/images/index-bg.jpg" style="width: 100%; height: auto;" alt="" >
                        <!--
                        <div class="top-heading">
                            <h3><span></span> Pídelo en línea, Recíbelo Rápido <span></span> </h3>
                            <h3>ServicioEnLínea.Com.Mx</h3>
                            <div class="sub-heading">
                                <h3 class="sub-lower">Selecciona tu Restaurant,</h3>
                                <br>
                                <h3 class="sub-lower">Has Tu Pedido,</h3>
                                <br>
                                <h3 class="sub-lower">En pocos minutos Disfrutas!</h3>
                            </div>
                        </div>
                        -->
                    </section>

                    <section class="map-search">
                        <div class="container">
                            <!-- ============= CITY SEARCH ================== -->
                            <article class="city-search clearfix">

                                <div class="search-caption">
                                    <h4>Estamos</h4>
                                    <h4>En Todo El DF</h4>
                                </div>
                                <script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
                                <script type="text/javascript">

                                    $(document).ready(function() {
                                        $('#map-search-form').submit(function() {
                                            var data = $(this).serialize();

                                            $("#mostrarresul").html("<img src=\"<?php echo site_url('') ?>resourceadmin/loading_image.gif\" >").fadeOut(1000);
                                            $.post("<?php echo site_url('restaurantes/buscarcp') ?>", data, function(respuesta) {


                                                $('#mostrarresul').fadeIn(1000).html(respuesta);


                                            });

                                            return false;
                                        });
                                    });



                                    $(document).ready(function() {
                                        $("#clickarxv").click(function() {

                                            $("#submitenviar").click();

                                        });

                                    });
                                </script>
                                <div class="search-form">
                                    <form id="map-search-form">

                                        <div>
                                            <input  id="mapPin" name="cp" style="color: red" type="tel" placeholder="Ingresa tu Código Postal">
                                        </div>
                                        <a href="#modal"  id="clickarxv" class="button green-btn">BUSCAR</a>
                                        <input type="submit" id="submitenviar" style="display: none" value="Enviar">

                                    </form>

                                    <script src="<?php echo site_url('') ?>modal/jquery.remodal.js"></script>
                                    <link rel="stylesheet" href="<?php echo site_url('') ?>modal/jquery.remodal.css">

                                    <div class="remodal" data-remodal-id="modal">
                                        <div id="mostrarresul">

                                        </div>
                                    </div>




                                </div>


                            </article>

                            <!-- ============================================ -->
                        </div>
                        <div id="map-canvas" ></div>
                    </section>

                    <section class="recipes">

                        <div class="container">
                            <!--<div class="heading">-->
                            <img src="_assets/images/recipe-icon.png" height="82" width="83" alt="">
                            <h2>Somos Los Mejores En Pedidos En Línea</h2>
                            <h4>Pide en Línea • Recibe Rápido</h4>
                            <!--</div>-->


                            <ul class="recipe-list clearfix foodRecipe">
                                <li class="layer0 btnco" data-div="one"><img src="_assets/images/food-gallery/appetizers/appetizers_01.jpg"></li>
                                <li class="layer1 btnco" data-div="two"><img src="_assets/images/food-gallery/appetizers/appetizers_02.jpg" alt=""></li>
                                <li class="layer2 btnco" data-div="three"><img src="_assets/images/food-gallery/appetizers/appetizers_03.jpg" alt=""></li>
                                <li class="layer3 btnco" data-div="four"><img src="_assets/images/food-gallery/appetizers/appetizers_04.jpg" alt=""></li>
                                <li class="layer4 btnco" data-div="five" ><img src="_assets/images/food-gallery/appetizers/appetizers_05.jpg" alt=""></li>
                                <li class="layer5 btnco" data-div="six" ><img src="_assets/images/food-gallery/appetizers/appetizers_06.jpg" alt=""></li>
                                <li class="layer6 btnco" data-div="seven"><img src="_assets/images/food-gallery/appetizers/appetizers_07.jpg" alt=""></li>
                            </ul>
                            <!-- ====================================== -->
                            <div class="slidingDiv-wrapper">
                                <div id="one" class="slidingDiv">
                                    <h6>Ensaladas </h6>
                                    <p>Casi sentiras que estás en el campo. De todo tipo y sabores y sobre todo con la frescura y calidad de los mejores productos solo para tí que mereces lo bueno.</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroComida?tipo=Ensaladas">MENU</a>
                                </div>
                                <div id="two" class="slidingDiv">
                                    <h6>Pizzas</h6>
                                    <p>Sentiras que estás en Italia, simplemente no podrás resistirte a la calidad y sabor de todas nuestras pizzas con las que nuestros sitios te van a sorprender.</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroComida?tipo=Pizzas">MENU</a>
                                </div>
                                <div id="three" class="slidingDiv">
                                    <h6>Sushi</h6>
                                    <p>Te sorprenderemos con todo nuestro listado de sitios que te ofrecen la más ámplia variedad de la cocina japonesa en su versión sushi. </p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroComida?tipo=Sushi">MENU</a>
                                </div>
                                <div id="four" class="slidingDiv">
                                    <h6>Comida China</h6>
                                    <p>Lo mejor de la comida china y los más variados platillos de la cocina oriental los vas a ver en toda la lista de restaurantes que tenemos. </p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroComida?tipo=China">MENU</a>
                                </div>
                                <div id="five" class="slidingDiv">
                                    <h6>Comida Mexicana</h6>
                                    <p>Toda la diversidad gastronómica de la comida mexicana la podrás encontrar en todo nuestro catálogo de lugares en toda la ciudad de México.</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroComida?tipo=Mexicana">MENU</a>
                                </div>
                                <div id="six" class="slidingDiv">
                                    <h6>Hamburguesas</h6>
                                    <p>Tradicionales, hawaianas, a la parrilla, al carbón, de mariscos, vegetarianas, exóticas... No encontrarás mejores alternativas.</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroComida?tipo=Hamburguesas">MENU</a>
                                </div>
                                <div id="seven" class="slidingDiv">
                                    <h6>Pollo</h6>
                                    <p>Rostizado, adobado, al carbón, al barro... Contamos con las mejores opciones para que disfrutes este platillo directo en tu mesa.</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroComida?tipo=Pollo">MENU</a>
                                </div>
                            </div>



                        </div>

                    </section>

                    <section class="delicious-menu">
                        <div class="container">
                            <figure>
                                <img src="_assets/images/delicious-menu.png" alt="">
                            </figure>
                            <div class="figcaption">
                                <h3>Conoce nuestras recomendaciones!</h3>
                                <a class="button white-btn" href="#">VER RECOMENDACIONES</a>
                            </div>
                        </div>
                    </section>

                    <section class="recipes">

                        <!-- ====================================== -->

                        <div class="container">
                            <!--<div class="heading">-->
                            <img src="_assets/images/recipe-icon.png" height="82" width="83" alt="">
                            <h2>DISFRUTA LOS MEJORES RESTAURANTES</h2>
                            <h4>Variedad • Sabor • Precio • Rapidez</h4>
                            <!--</div>-->

                            <!-- ============ PLACE ORDER ============= -->
                            <ul class="recipe-list clearfix foodRecipe">
                                <li class="layer0" data-div="one"><img src="_assets/images/restaurantes/b1one-restobar.jpg" alt=""></li>
                                <li class="layer1" data-div="two"><img src="_assets/images/restaurantes/marisqueria-de-barrio.jpg" alt=""></li>
                                <li class="layer2" data-div="three"><img src="_assets/images/restaurantes/sushi-roll.jpg" alt=""></li>
                                <li class="layer3 active" data-div="four"><img src="_assets/images/restaurantes/fogonazo.jpg" alt=""></li>
                                <li class="layer4" data-div="five"><img src="_assets/images/restaurantes/pizzaliannis.jpg" alt=""></li>
                                <li class="layer5" data-div="six"><img src="_assets/images/restaurantes/burguer-king.jpg" alt=""></li>
                                <li class="layer6" data-div="seven"><img src="_assets/images/restaurantes/italiannis.jpg" alt=""></li>
                            </ul>
                            <!-- ====================================== -->
                            <div class="slidingDiv-wrapper">
                                <div id="one" class="slidingDiv">
                                    <h6>B1One Restobar </h6>
                                    <p>Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroSucursal?tipo=B1One-Restobar">MENU</a>
                                </div>
                                <div id="two" class="slidingDiv">
                                    <h6>Marisquería de Barrio </h6>
                                    <p>Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroSucursal?tipo=Marisqueria-de-Barrio">MENU</a>
                                </div>
                                <div id="three" class="slidingDiv">
                                    <h6>Sushi Roll</h6>
                                    <p>Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroSucursal?tipo=Sushi-Roll">MENU</a>
                                </div>
                                <div id="four" class="slidingDiv">
                                    <h6>Fogonazo </h6>
                                    <p>Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroSucursal?tipo=Fogonazo">MENU</a>
                                </div>
                                <div id="five" class="slidingDiv">
                                    <h6>Pizza Tortugas Ninja </h6>
                                    <p>Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroSucursal?tipo=Pizza-Tortugas-Ninja">MENU</a>
                                </div>
                                <div id="six" class="slidingDiv">
                                    <h6>Burguersota</h6>
                                    <p>Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroSucursal?tipo=Burguersota">MENU</a>
                                </div>
                                <div id="seven" class="slidingDiv">
                                    <h6>Italianazo </h6>
                                    <p>Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo - Descripción y Promoción Demo</p>
                                    <a class="button red-btn" href="<?php echo site_url('') ?>restaurantes/filtroSucursal?tipo=Italianazo">MENU</a>
                                </div>
                            </div>
                        </div>

                    </section>

                    <section class="news-letter">
                        <div class="container clearfix">
                            <article>
                                <h3>Recibe las mejores promociones</h3>
                                <h4>Suscríbete a nuestro newsletter</h4>
                            </article>
                            <article>
                                <form id="home-newsletter">
                                    <input id="newsEmail" type="text" placeholder="Deja tu correo electrónico, te enviaremos grandes sorpresas!">
                                    <button><i class="fa fa-arrow-right"></i></button>
                                    <div class="form-message">
                                        <div><div class="loader">Cargando...</div></div>
                                    </div>
                                </form>
                            </article>
                        </div>
                    </section>

                    <section class="meet-chef" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
                        <div class="container clearfix">
                            <!--
                            <figure>
                                <img src="_assets/images/Chef-03.png" alt="">
                                <img class="centre-chef" src="_assets/images/Chef-01.png" alt="">
                                <img src="_assets/images/Chef-02.png" alt="">
                            </figure>
                            -->
                            <div class="figcaption">
                                <h3>Pide en Línea <span>Fácilmente</span> </h3>
                                <!-- ============ FEATURED EVENTS ================== -->
                                <article class="chef-details clearfix">
                                    <figure>
                                        <img src="_assets/images/chef-hat-icon.png" alt="">
                                    </figure>
                                    <div class="figcaption">
                                        <h5>Ingresa y Elije</h5>
                                        <p>Entra a nuestro portal o desde nuestra App Movil y selecciona tu restaurant y platillos</p>
                                    </div>
                                </article>

                                <article class="chef-details clearfix">
                                    <figure>
                                        <img src="_assets/images/chef-hat-icon.png" alt="">
                                    </figure>
                                    <div class="figcaption">
                                        <h5>Envía tu Pedido En Línea</h5>
                                        <p>Ya con tu pedido ingresa tus datos para validación y envía ó paga seguro en línea.</p>
                                    </div>
                                </article>

                                <article class="chef-details clearfix">
                                    <figure>
                                        <img src="_assets/images/chef-hat-icon.png" alt="">
                                    </figure>
                                    <div class="figcaption">
                                        <h5>Valida y Recibe tu Pedido</h5>
                                        <p>Espera una llamada directamente del establecimiento y enseguida espera unos minutos y listo!!</p>
                                    </div>
                                </article>
                                <!-- =============================================== -->
                            </div>
                        </div>
                    </section>

                    <section class="app-download">
                        <div class="container">
                            <figure>
                                <img src="_assets/images/mobile-phone.png" alt="">
                            </figure>
                            <div class="figcaption">
                                <h2>Te hacemos la vida mas sencilla</h2>
                                <h4>Descarga nuestra aplicación movil para Android o iOs, es totalmente gratis!!</h4>
                                <img src="_assets/images/ios.jpg" alt="">
                                <img src="_assets/images/android.jpg" alt="">
                                <!--
                                <a class="button white-btn ios" href="#">download for </a>
                                <a class="button white-btn android" href="#">download for </a>
                                -->
                                <br>
                                <br>
                            </div>
                        </div>
                    </section>

                    <section class="delicious-menu">
                        <img src="_assets/images/pre-footer.jpg" style="width: 100%; height: auto" alt="" >
                    </section>


                    <section class="contact-us">
                        <div class="container">
                            <img src="_assets/images/booking-icon.png" alt="">
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






                </div> <!-- HOMEPAGE ends -->



                <div class="overlay">
                    <div class="modal login-page">
                        <i class="fa fa-times"></i>

                        <a href="index-old.html" class="logo">
                            <h1>ServicioEnLínea.Com.Mx</h1>
                        </a>

                        <h2>Ingresa Ahora</h2>
                        <p>Esta sección está reservada para tí que ya has hecho login con Facebook o Twitter y con ello estarás recibiendo todas nuestras promociones exclusivas. </p>
                        <div class="clearfix existing-login">
                            <div class="fb-login-wrapper">
                                <a href="#" class="fb-login button clearfix">
                                    <i class="fa fa-facebook"></i>
                                    <span>Has login con facebook</span>
                                </a>
                            </div>

                            <div class="twitter-login-wrapper">
                                <a href="#" class="twitter-login button clearfix">
                                    <i class="fa fa-twitter"></i>
                                    <span>Has login con twitter</span>
                                </a>
                            </div>
                        </div>

                        <h3>Ya tienes una cuenta? Has Login Ya</h3>
                        <form>
                            <div class="clearfix">
                                <div class="input-wrapper user-name">
                                    <input type="text" placeholder="Tu Nombre">
                                </div>
                                <div class="input-wrapper pass">
                                    <input type="text" placeholder="Password">
                                </div>
                            </div>
                            <div class="clearfix form-btn-wrapper">
                                <button class="button red-btn">login</button>
                                <h5>Olvidaste tu Contraseña? Has Click <a href="#">AQUÍ</a></h5>
                            </div>
                        </form>

                    </div> <!-- LOGIN MODAL ends -->
                </div> <!-- OVERLAY ends -->

            </div> <!-- WRAPPER ends -->

            <!-- ============ FOOTER ================== -->

            <footer>

                <?php
                include 'plantillaviwer/folder.php';
                ?>



            </footer>
            <!-- ============ FOOTER ================== -->
        </div> <!-- inside-body-wrapper ends -->


        <script src="<?php echo site_url('') ?>_assets/js/jquery.isotope.js"></script>

        <script>
            $(document).ready(function() {
                'use strict';
                /* ==============================================
                 FOOD GALLERY PAGE ISOTOPE
                 =============================================== */

                var $container = jQuery('#food-items');

                $container.isotope({
                    itemSelector: '.food-item-wrapper',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.food-type-list li a').on('click', function(e) {
                    e.preventDefault();
                    var filterValue = $(this).attr('data-filter');
                    $container.isotope({filter: filterValue});
                });
            });

        </script>
    </body>
</html><!-- ====================================== -->
