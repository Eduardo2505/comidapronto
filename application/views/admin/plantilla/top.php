<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
   <title>Carrito en linea, Venta en linea</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="../../resourceadmin/style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="../../resourceadmin/style/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="../../resourceadmin/style/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="../../resourceadmin/style/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="../../resourceadmin/style/prettyPhoto.css">  
  <!-- Star rating -->
  <link rel="stylesheet" href="../../resourceadmin/style/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="../../resourceadmin/style/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="../../resourceadmin/style/jquery.cleditor.css"> 
  <!-- Uniform -->
  <link rel="stylesheet" href="../../resourceadmin/style/uniform.default.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="../../resourceadmin/style/bootstrap-switch.css">
  <!-- Main stylesheet -->
  <link href="../../resourceadmin/style/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="../../resourceadmin/style/widgets.css" rel="stylesheet">   
  
 
<link rel="icon" type="image/png" href="../img/icono.png" />
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
         
      </button>
       
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('') ?>" class="logo_inner"><img src="../../resourceadmin/img/logox.png" alt=""></a>
     
    </div>
      
      

      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         
       
        


        <ul class="nav navbar-nav pull-right">
          <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar...">
      </div>
    </form>
         <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
          <li class="dropdown dropdown-big">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success"><i class="icon-cloud-upload"></i></span> Ayuda</a>
          
          </li>

          <!-- Sync to server link -->
          <li class="dropdown dropdown-big">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-danger"><i class="icon-refresh"></i></span> Información</a>
           
          </li>


          <li class="dropdown pull-right">         

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              Bienvenido:  <i class="icon-user"></i> Eduardo Padilla Cruz <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
       
              
              <li><a href="<?php echo site_url('administrador/salir') ?>"><i class="icon-off"></i> Salir</a></li>
            </ul>
          </li>
          
        </ul>
		 
         
        
      </nav>

          

    </div>

  </div>


<div class="row">
      <div class="col-md-12" style="background-color:#E4E4E4">
            <!-- Copyright info -->
       <br>
      </div>
      </div>

<!-- Header ends -->

<!-- Main content starts -->

<div class="content">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navegación</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
          <ul id="nav">
        <li><a href="<?php echo site_url('adminvendedor/perfil') ?>"  ><i class="icon-home"></i>Sucursales</a></li>
       
        <li><a href="<?php echo site_url('adminvendedor/contrasena') ?>"  ><i class="icon-magic"></i>Contraseña</a></li>

        

    
         <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Sucursales <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
             <ul>
              <li><a href="<?php echo site_url('') ?>sucursales/registro">Nuevo</a></li>
              <li><a href="<?php echo site_url('') ?>sucursales/sucursalesver">Sucursales</a></li>
             </ul>
         
          </li>
   <?php  
          if(isset($_SESSION["idSucursalActivax"])){ 

           ?>
             <li class="has_sub"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $_SESSION["idSucursalActivax"];?></h3></li>
          <li class="has_sub"><a href="#"><i class="icon-file-alt"></i>Cate/Sub-Cate<span class="pull-right"><i class="icon-chevron-right"></i></span></a>
             <ul>
              <li><a href="<?php echo site_url('') ?>categorias/registro">(+) Categorías</a></li>
              <li><a href="<?php echo site_url('') ?>categorias/mostrar">* Categorías</a></li>
               <li><a href="<?php echo site_url('') ?>subcategorias/registro">(+) Sub-Categorías</a></li>
              <li><a href="<?php echo site_url('') ?>subcategorias/mostrar">* Sub-Categorías</a></li>

             </ul>
         
          </li>
           
          <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Producto <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
               <li><a href="<?php echo site_url('adminvendedor/producto') ?>">Nuevo</a></li>
              <li><a href="<?php echo site_url('adminvendedor/productos') ?>">Productos</a></li>
             </ul>
         
          </li>

              <?php }?>

        </ul>
    </div>
