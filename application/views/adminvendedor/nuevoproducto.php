
<?php
include 'plantilla/top.php';

?>
<script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
                $(document).ready(function() {
                    $('.btnclickcate').click(function() {
                        var user = $(this).attr("name");
                        var dataString = 'idClasificacion='+user;                        
                        if (user != "") {
                          var link="<?php echo site_url('') ?>nuevoproducto/categoriasviwer";                          
                            $.ajax({
                                type: "POST",
                                url:link,
                                data: dataString,
                                success: function(data) {
                                
                                    $('#verclick').html(data);

                                }
                            });
                            //}
                        }
                    }


                    );
                });


     //*************************** INSERTAR NUEVO Producto **************************************


                 $(document).ready(function() {
                    $('#btnfinalizar').click(function() {
                        var idsubcaresul=String($('#idsubcaresul').val());                       
                        var nom=String($('#nom').val());
                        var desc= String($('#desc').val());                        
                        var tam1= String($('#tam1').val());
                        var tam2= $('#tam2').val();
                        var tam3= $('#tam3').val();
                        var prec1= String($('#prec1').val());
                        var prec2= $('#prec2').val();
                        var prec3= $('#prec3').val();

                      //  var info = [tam1, tam2,tam3,prec1,prec2,prec3];

                       
                       var numElem = $('div.uploadify-queue-item').size(); 

                       if(numElem!=0){

                          var dataString = 'idsubcaresul='+idsubcaresul+'&nom='+nom+'&desc='+desc+'&tam1='+tam1+'&tam2='+tam2+'&tam3='+tam3+'&prec1='+prec1+'&prec2='+prec2+'&prec3='+prec3+'&imgde=on';                        

                        }else{

                          var  dataString = 'idsubcaresul='+idsubcaresul+'&nom='+nom+'&desc='+desc+'&tam1='+tam1+'&tam2='+tam2+'&tam3='+tam3+'&prec1='+prec1+'&prec2='+prec2+'&prec3='+prec3+'&imgde=off';                        

                        }


                        
                       
                        var link="<?php echo site_url('') ?>nuevoproducto/guardar"; 
                        
                       
                                 
                        if(idsubcaresul==""){
                               alert("Error selecione una categoría");
                               $('#btnsubca').click();

                        }else if(nom==""||desc==""){
                              alert("Debe de colocar un nombre y una descripción");
                               $('#btn1').click();

                        }else if(tam1==""||prec1==""){
                              alert("Debe de llenar el campo de Precio");
                         

                        }else{ 
                           //$('#btn1').click();  
                          //  alert(dataString);
                           // $('.pull-left').html(dataString);
                            $.ajax({
                                type: "GET",
                                url:link,
                                data: dataString,
                                success: function(data) {

                                
                                if(numElem!=0){
                                   $('.cargarauto').click();
                                
                                   }else{

                                    $('#mostraresave').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se registro correctamente</h2><br><a href="<?php echo base_url(); ?>adminvendedor/producto" class="btn btn btn-warning">Aceptar</a></div>');

                                 }
                                     
                          

                                

                                }
                            });

                            //}
                         }
                        
                    }


                    );
                });
       //*************************** ######################### **************************************
          $(document).ready(function() {
                    $('#datossiguiente').click(function() {
                       
                        var nom=String($('#nom').val());
                        var desc= String($('#desc').val());
                        if(nom!=""&&desc!=""){
                          // $('.btncargar').click();
                            $('#numpres').click();
                            
                        }else{

                            alert("Todos los campos son obligatorios");
                        }
                        
                        
                    }


                    );
                });


function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57))
      event.returnValue = false;
  }
            </script>
    <!-- Sidebar ends -->

      	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"> <i class="icon-home"></i> Nuevo Producto
      
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

            
 <div class="col-md-12">


              <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Información</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd" id="mostraresave">

                     <form class="form-horizontal" role="form">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab" id="btnsubca">En que deseas publicar</a></li>
                <li class=""> 
                <a href="#profile" data-toggle="tab" id="btn1">Informacion del Producto</a>
          
                </li>
                <li class=""><a href="#cont" data-toggle="tab" id="numpres">Precios y imagenes</a></li>
              </ul>
                              
                <div id="myTabContent" class="tab-content">


                <div class="tab-pane fade active in" id="home">

                  <div class="form-group">
                  
                  <div class="col-lg-3" id="verclick">
                  <script type="text/javascript">
                $(document).ready(function() {
                    $('.btnclickcatecc').click(function() {
                        var user = $(this).attr("name");
                        var dataString = 'idCategoria='+user;  
                                              
                        if (user != "") {
                          var link="<?php echo site_url('') ?>nuevoproducto/subcategoriasviwer";                          
                            $.ajax({
                                type: "POST",
                                url:link,
                                data: dataString,
                                success: function(data) {
                               //$('#sinpasodos').show();
                               //$('#activarpaso2').hide();
                                    $('#subcategoria').html(data);

                                }
                            });
                            //}
                        }
                    }


                    );
                });

            </script>
               <h2>Categoría</h2>
<select multiple="" class="form-control">
  
<?php
                    if (isset($categoria)) {
                      foreach($categoria->result() as $row)
                      {
                        ?> 
                        <option class="btnclickcatecc" name="<?php echo  $row->idcategoria;?>"><?php echo  $row->categoria;?></option>
                        
                       

                        <?php 
                      }
                    }
                    ?>

                                      
                                    
 </select>

                  </div>

                  <div id="subcategoria">

</div>
                    </div>

                    </div>
                    <!-- ################### Datos del producto ################ -->
                    <!--#$#################################-->

                    <div class="tab-pane fade  in" id="profile">
                     <div class="container">
    <div class="row">
     <div class="col-md-5">
                    <form class="form-horizontal" role="form">
                     <input type="hidden" id="idsubcaresul">
                     
                              
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Nombre</label>
                                  <div class="col-lg-8">
                                    <input type="text" id="nom" class="form-control" placeholder="Nombre">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Descripción</label>
                                  <div class="col-lg-8">
                                    <textarea class="form-control" id="desc" rows="3" placeholder="Descripción" ></textarea>
                                  </div>
                                </div>

                                
                                                
                                
                               
                              </form>
   </div>
   
     
   <div class="col-md-3">
   <a href="#" class="btn"  id="datossiguiente">Siguiente</a>
  
   </div>
   </div>
   </div>



                    </div>
                  


 <div class="tab-pane fade  in" id="cont">
 <div class="container">
    <div class="row">
    <div class="col-md-6">
  <form class="form-horizontal" role="form">
                    
                              
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Precio (1)</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" id="tam1" placeholder="Tamaño" required>
                                  
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label"></label>
                                  <div class="col-lg-8">
                                   
                                    <input type="tel" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec1" placeholder="Precio" required>
                                  </div>
                                </div>

                                 <div class="form-group">
                                  <label class="col-lg-4 control-label">Precio (2)</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" id="tam2" placeholder="Tamaño" required>
                                  
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label"></label>
                                  <div class="col-lg-8">
                                   
                                    <input type="tel" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec2" placeholder="Precio" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Precio (3)</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control"  id="tam3" placeholder="Tamaño" required>
                                  
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label"></label>
                                  <div class="col-lg-8">
                                   
                                    <input type="tel" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec3" placeholder="Precio" required>
                                  </div>
                                </div>
                               
                              </form>
                              </div>

                               <div class="col-md-3">
<h2>Imagenes</h2>
          <?php echo form_open_multipart(); ?>
            
            <?php echo form_upload('userfile','','id="userfile"'); ?>
           
           
            <?php echo (isset($error)) ? $error : ''; ?>
            
           
            
        
      <div style="display:none">
      <button name="" type="button" id="upload-file" class="btn btn-success cargarauto">Cargar</button>
      </div>
      <?php echo form_close(); ?>
   

   </div>
                               <div class="col-md-3">
                               <a href="#" class="btn" id="btnfinalizar">FINALIZAR</a>
   </div>
   </div>
   </div>
 </div>


                </div>
                              
                                    </div>

                                </div>

                                    <!--#$#################################-->
                                    <!--Subir archivos -->

<script type="text/javascript">
    $(document).ready(function () {

        var base_url = '<?php echo base_url(); ?>';
      

        $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#actualizarimagen').html('<img src="<?php echo base_url(); ?>/img/ajax-loader.gif" alt=""/>');
            $('#userfile').uploadify('upload', '*');
           
           
        });
        
        $('#userfile').uploadify({           
            'debug':false,
            'auto':false,
            'queueSizeLimit' : 10,            
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v4/do_upload',
            'cancelImg': base_url + 'assets/js/jquery/uploadify_31/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Seleciona',
            'multi':true,
            'removeCompleted':true,
            'onQueueComplete' : function(queueData) {
                 $('#mostraresave').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se registro correctamente</h2><br><a href="<?php echo base_url(); ?>adminvendedor/producto" class="btn btn btn-warning">Aceptar</a></div>');
                   
                  
                      //alert("se redireccioara");
             
                  }
        });
    });
</script>
<!--FIN Subir archivos -->
                                    <!--####################################-->
                                         
                             
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
<script type="text/javascript">
 $( document ).ready(function() {
       $('.btnclickcate').click();
    });
 </script>
<?php
include 'plantilla/footerupdate.php';

?>