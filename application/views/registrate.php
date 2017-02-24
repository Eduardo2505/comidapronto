<!DOCTYPE html>
<html>
<head>
<title>Carrito en linea, Venta en linea</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">
<?php
include 'plantilla/headcss.php';
?>
</head>
<body>
<div id="wrap">
  
<?php
include 'plantilla/top.php';

?>
  <!--CONTENT-->
 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script type="text/javascript">
     
               $(function() {
                $('#form-contact').submit(function() {
                    var data = $(this).serialize();
                   
                    var email = String($('#email').val());
                    var email2 = String($('#email2').val());

                    if(email==email2){
                     
                    $.post("<?php echo site_url('registrate/RegistraDatos')?>", data, function(respuesta) {
                            var inres = respuesta.length;
                            
                        if (inres == 4) {
                           $('#diverroremail').html('<div class="alert alert-error alert-dismissable">El email ya existe</div></div></div>');
                        } else {

                           $('#resultadocorrecto').html('<div class="span12" ><br><br><div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert">×</button><h3>Información</h3>Se registro corretamente <h1>Se envio un correro de verificion revise su bandeja .. </h1></div></div>');
                        }

                    });
                       }else{
                        
                       $('#diverror').html('<div class="alert alert-error alert-dismissable">Verique su email </div></div></div>');
                    }
                    return false;
                });
            });

            function ValidaSoloNumeros() {
          if ((event.keyCode < 48) || (event.keyCode > 57))
            event.returnValue = false;
        }
  </script>
  <section id="content">

    <div class="container top">
     
 
      <div class="row " id="resultadocorrecto" >
      <div class="span4" ></div>
        <div class="span8 " >
		
          <h3>*** Registro </h3>
          <form id="form-contact" >
            <div class="row">
              <div class="span3">
                <p>Nombre : *</p>
                <input type="text" name="nombre" required maxlength="45" placeholder="Nombre">
              </div>
			  </div>
			  <div class="row">
			   <div class="span3">
                <p>Apellido : *</p>
                <input type="text" required name="apellido" maxlength="45"  placeholder="Apellido">
              </div>
			   </div>
			  <div class="row">
              <div class="span3 ">
                <p>E-Mail:</p>
                <input type="email" id="email"  name="email" required maxlength="45" placeholder="Email">
                <div id="diverroremail">
                </div>
              </div>
			   </div>
			  <div class="row">
			       <div class="span3 ">
                <p>Verificar E-Mail:</p>
                <input type="email" id="email2" required maxlength="45" placeholder="Verificar Email">
                <div id="diverror">
                

                  </div>
               </div>
            </div>
             <div class="row">
              <div class="span3">
                <p>Password:</p>
                <input type="password" required maxlength="10" name="contrasena"  placeholder="Password">
              </div>
            </div>
             <div class="row">
              <div class="span3">
                <p>Empresa:</p>
                <input type="text" required maxlength="10" name="empresa"  placeholder="Empresa">
              </div>
            </div>
            <div class="row">
              <div class="span3">
                <p>Teléfono:</p>
                <input type="tel" required maxlength="10" name="tel" onkeypress="ValidaSoloNumeros()" placeholder="Teléfono">
              </div>
            </div>
            <div class="row">
              <div class="span3">
                <p>Cadena:</p>
                 <select name="cadena" required >
                       <?php
                        if (isset($cadena)) {
                          foreach($cadena->result() as $row)
                          {
                            ?>

                            <option value="<?php echo  $row->idCadena;?>"><?php echo  $row->Nombre;?></option>


                            <?php 
                          }
                        }
                        ?>
                       
                      </select>
              </div>
            </div>
             <div class="row">
              <div class="span3">
                <p>Pais:</p>
                
                        <select name="pais" >
                       <?php
                        if (isset($pais)) {
                          foreach($pais->result() as $row)
                          {
                            ?>

                            <option value="<?php echo  $row->idpais;?>"><?php echo  $row->Pais;?></option>


                            <?php 
                          }
                        }
                        ?>
                       
                      </select>
                       
                     
              </div>
            </div>
             <div class="row">
              <div class="span1">
                 Acepto Termino
                <input type="checkbox" value="" checked="" disabled="">
               

              </div>
              <div class="span1">
                <input type="checkbox"  name="notificaciones" checked="" >
                Notificaciones
              </div>
            </div>
           
         <div class="row">
           <div class="span3">
              <input type="submit" value="Registrar" class="btn-mini">
            
                
      </div>
            </div>
			  
          </form>
        </div>
		 
      </div>
	  
    </div>
    <div class="span12" style="text-align:center">
    Al inscribirme, declaro que soy mayor de edad y acepto las <a href="" style="color:blue"> Políticas de Privacidad</a> y los <a href="" style="color:blue"> Términos y Condiciones de Carrito en linea </a>.
  </div>
  </section>
  <div id="push"></div>
</div>
<!--FOOTER-->

</body>
</html>