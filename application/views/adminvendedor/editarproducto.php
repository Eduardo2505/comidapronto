<script src="<?php echo site_url('') ?>resourceadmin/js/jquery.min.js"></script>
<?php
include 'plantilla/top.php';
$rowpro=$busproduc->row_array();


if (isset($_GET["pes"])) {
  ?>

  <script type="text/javascript">
   $(document).ready(function() {
    $('#numpres').click();
  });
</script>


<?php
}
?>



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

        var tam1= String($('#tam1').val());
        var tam2= $('#tam2').val();
        var tam3= $('#tam3').val();
        var prec1= String($('#prec1').val());
        var prec2= $('#prec2').val();
        var prec3= $('#prec3').val();

        var id1= $('#id1').val();
        var id2= $('#id2').val();
        var id3= $('#id3').val();

        var idproductoxx=String($('#idproductoxx').val());
        var idproductocode=String($('#idproductocode').val());
        var dataString = 'tam1='+tam1+'&tam2='+tam2+'&tam3='+tam3+'&prec1='+prec1+'&prec2='+prec2+'&prec3='+prec3+'&id1='+id1+'&id2='+id2+'&id3='+id3+'&idProducto='+idproductoxx;

        var link="<?php echo site_url('') ?>editarproducto/guardar"; 
        var numElem = $('div.uploadify-queue-item').size();  

                             // alert(dataString);
                             if(tam1==""||prec1==""){
                              alert("Debe de llenar el campo de Precio");


                            }else{ 


                              $.ajax({
                                type: "GET",
                                url:link,
                                data: dataString,
                                success: function(data) {

                                 if(numElem!=0){

                                  $('.cargarauto').click();  
                                }else{

                                      //  alert("Actualizo");
                                      $('#mostraresave').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se actualizo correctamente</h2><br><a href="<?php echo base_url(); ?>editarproducto/buscar?idProducto='+idproductocode+'&pes=p" class="btn btn btn-warning">Aceptar</a></div>');


                                    }

                                  }
                                });

                            }

                          });
});
       //*************************** ######################### **************************************
       $(document).ready(function() {
        $('#datossiguiente').click(function() {

          var nom=String($('#nom').val());
          var desc= String($('#desc').val());
          var idproductoxx=String($('#idproductoxx').val());

          if(nom!=""&&desc!=""){

            var dataString = 'nom='+nom+'&desc='+desc+'&id='+idproductoxx;       
            var link="<?php echo site_url('') ?>editarproducto/updatenom";                          
            $.ajax({
              type: "POST",
              url:link,
              data: dataString,
              success: function(data) {

                $('#numpres').click();



              }
            });



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
      <h2 class="pull-left"> <i class="icon-home"></i>   << Editar >>    ***ID <?php echo $rowpro['id']; ?> ==> <?php echo $rowpro['nombre']; ?> ==>  <?php echo $rowpro['categoria']; ?> ==>  <?php echo $rowpro['subcategoria']; ?>

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

                    <div class="form-group"id="verclick">
                      <div class="col-lg-3" >
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
                       <input type="hidden" id="idsubcaresul" value="<?php echo $rowpro['idSubcategoria']; ?>">
                       <input type="hidden" id="idsucursal" value="<?php echo $idSucursal ?>"> 
                       <input type="hidden" id="idproductoxx" value="<?php echo $idProdutoimg ?>"> 
                       <input type="hidden" id="idproductocode" value="<?php echo base64_encode($idProdutoimg) ?>"> 

                       <div class="form-group">
                        <label class="col-lg-4 control-label">Nombre</label>
                        <div class="col-lg-8">
                          <input type="text" id="nom" class="form-control" value="<?php echo $rowpro['nombre']; ?>" placeholder="Nombre">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Descripción</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" id="desc" rows="3" placeholder="Descripción" ><?php echo $rowpro['descripcion']; ?></textarea>
                        </div>
                      </div>



                    </form>
                  </div>


                  <div class="col-md-3">
                   <a href="#" class="btn"  id="datossiguiente">ACTUALIZAR -></a>

                 </div>
               </div>
             </div>



           </div>


           <?php
           $cont=1;
           $pre1="";
           $pre2="";
           $pre3="";
           $des1="";
           $des2="";
           $des3="";

           $id1="";
           $id2="";
           $id3="";
           if (isset($precios)) {
            foreach($precios->result() as $rowp)
            {
             if($cont==1){
              $pre1=$rowp->precio;
              $des1=$rowp->Descripcion;
              $id1=$rowp->idSubproductos;
            }
            if($cont==2){
             $pre2=$rowp->precio;
             $des2=$rowp->Descripcion;
             $id2=$rowp->idSubproductos;
           }
           if($cont==3){
             $pre3=$rowp->precio;
             $des3=$rowp->Descripcion;
             $id3=$rowp->idSubproductos;
           }


           $cont++;
         }
       }
       ?>
<script type="text/javascript">

           $(document).ready(function() {
            $('.btnclickdelepre').click(function() {
              var user = $(this).attr("name");
              var divtitle = $(this).attr("title");
              var dataString = 'id='+user+'&divtitle='+divtitle; 
              var link="<?php echo site_url('') ?>editarproducto/eliminarprecio";                          
                $.ajax({
                  type: "POST",
                  url:link,
                  data: dataString,
                  success: function(data) {
                                
                              $('#'+divtitle).html(data);

                               }
                             });
                         
                        });
          });
        </script>
       <div class="tab-pane fade  in" id="cont">
         <div class="container">
          <div class="row">
            <div class="col-md-6">
              <form class="form-horizontal" role="form">

                <div id="divpe1">
                  <div class="form-group">
                    <label class="col-lg-4 control-label"><a href="#" class="btn btn-xs btn-danger btnclickdelepre" title="divpe1" name="<?php echo $id1;?>"><i class="icon-remove"></i></a> Precio (1)</label>
                    <div class="col-lg-8">
                      <input type="text" value="<?php echo $des1;?>" class="form-control" id="tam1" placeholder="Tamaño" required>
                      <input type="hidden" value="<?php echo $id1;?>" id="id1">

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label"></label>
                    <div class="col-lg-8">

                      <input type="tel" value="<?php echo $pre1;?>" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec1" placeholder="Precio" required>
                    </div>
                  </div>
                </div>
                <div id="divpe2">
                 <div class="form-group">
                  <label class="col-lg-4 control-label"> <a href="#" class="btn btn-xs btn-danger btnclickdelepre" title="divpe2" name="<?php echo $id2;?>"><i class="icon-remove"></i></a> Precio (2)</label>
                  <div class="col-lg-8">
                   <input type="hidden" value="<?php echo $id2;?>" id="id2">
                   <input type="text" value="<?php echo $des2;?>" class="form-control" id="tam2" placeholder="Tamaño" required>

                 </div>
               </div>
               <div class="form-group">
                <label class="col-lg-4 control-label"></label>
                <div class="col-lg-8">

                  <input type="tel" value="<?php echo $pre2;?>" onkeypress="ValidaSoloNumeros()" maxlength="5" class="form-control" id="prec2" placeholder="Precio" required>
                </div>
              </div>
            </div>
            <div id="divpe3">
              <div class="form-group">
                <label class="col-lg-4 control-label"> <a href="#" class="btn btn-xs btn-danger btnclickdelepre"  title="divpe3" name="<?php echo $id3;?>"><i class="icon-remove"></i></a> Precio (3)</label>
                <div class="col-lg-8">
                  <input type="hidden" value="<?php echo $id3;?>" id="id3">

                  <input type="text" class="form-control" value="<?php echo $des3;?>"  id="tam3" placeholder="Tamaño" required>

                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label"></label>
                <div class="col-lg-8">

                  <input type="tel" onkeypress="ValidaSoloNumeros()" value="<?php echo $pre3;?>" maxlength="5" class="form-control" id="prec3" placeholder="Precio" required>
                </div>
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
         <a href="#" class="btn" id="btnfinalizar">ACTUALIZAR</a>
       </div>
     </div>

     <div class="row">
      <h3> ** Imagenes **</h3>

      <div class="col-md-12">



        <div class="gallery"  id="mostraimgreg">
          <script type="text/javascript">

           $(document).ready(function() {
            $('.btnclickdeleimg').click(function() {
              var user = $(this).attr("name");
              var dataString = 'idimg='+user;    

              if (user != "") {
                var link="<?php echo site_url('') ?>editarproducto/eliminarimg";                          
                $.ajax({
                  type: "POST",
                  url:link,
                  data: dataString,
                  success: function(data) {
                                 //alert(data);  
                                 $('#mostraimgreg').html(data);

                               }
                             });
                            //}
                          }
                        }


                        );
          });
        </script>
        <?php

        if (isset($imagenes)) {
          foreach($imagenes->result() as $rowi)
          {
            ;
            ?>



            <a href="#" class="btn btn-xs btn-danger btnclickdeleimg"  name="<?php echo  $rowi->idimagenes;?>&idProducto=<?php echo $idProdutoimg ?>"><i class="icon-remove"></i></a> <img src="<?php echo site_url('') ?>uploads/<?php echo  $rowi->url;?>" alt="" />

            <?php

          }
        }
        ?>
      </div>
    </div>
  </div>
</div>


</div>

</div>

</div>

<!--#$#################################-->
<!--Subir archivos -->
<script src="<?php echo base_url(); ?>resourceadmin/js/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>
<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-1.8.0.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {

    var base_url = '<?php echo base_url(); ?>';
    var idproductocode=String($('#idproductocode').val());

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

       $('#mostraresave').html(' <div class="alert alert-success" style="text-align:center"><img src="<?php echo base_url(); ?>/img/carita.png" alt=""><br><h2>Se actualizo correctamente</h2><br><a href="<?php echo base_url(); ?>editarproducto/buscar?idProducto='+idproductocode+'&pes=p" class="btn btn btn-warning">Aceptar</a></div>');


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