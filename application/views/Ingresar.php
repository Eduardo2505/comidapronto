<!DOCTYPE html>
<html>
<head>
<title>Carrito en linea, Venta en linea</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">

 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script type="text/javascript">
     
               $(function() {
                $('#form-contact').submit(function() {
                    var data = $(this).serialize();
                   
                    $.post("<?php echo site_url('ingresar/login')?>", data, function(respuesta) {
                            var inres = respuesta.length;
                            
                        if (inres!=0) {
                             $('#mensaje').html('<div class="alert alert-error alert-dismissable"><h5>*** Error</h5>Sus datos son incorrectos,  por favor verifique </div></div></div>');
                        } else {

                             $(location).attr('href', "<?php echo site_url('') ?>adminvendedor/perfil");
                        }

                    });
                      
                    return false;
                });
            });

         $(document).ready(function() {
            $("#btnsiguiente").click(function(){
                $('#btnenviar').click();
              });
                   
           
          });
  </script>
   
  <section id="content">

    <div class="container top">
     
 
      <div class="row " >
        
	    <div class="span4" ></div>
        <div class="span8  ">
		
          <h3>*** Ingresar</h3>
          <form id="form-contact"  >
            <div class="row">
              <div class="span3">
                <p>Email : *</p>
                <input type="email" name="email" required maxlength="45" placeholder="Email">
              </div>
			  </div>
			  <div class="row">
			   <div class="span3">
                <p>Password : *</p>
                <input type="password" name="pass" required maxlength="45" placeholder="Contraseña">
                <br>
              
              </div>
			   </div>
			  
           
         <div class="row">
           <div class="span3">
               <input type="submit"  id="btnenviar" style="display:none" value="enviar">
                <button class="btn-mini" id="btnsiguiente" >Entrar</button>
                   <div id="mensaje">
      </div>

      </div>
   
            </div>
			
          </form>
        
        </div>
		 
      </div>
	  
    </div>
  </section>
  <div id="push"></div>
</div>

</body>
</html>