<?php

session_start();
$opcs=$_SESSION["opAct"];
?>
<script type="text/javascript">
                $(document).ready(function() {
                    $('.btnclickcatecx').click(function() {
                        var user = $(this).attr("name");                        
                        //alert( dataString);   
                         //$('#sinpasodos').hide();
                        // $('#activarpaso2').show();
                         $('#idsubcaresul').val(user);
                         $('#btn1').click();  


                                  
                       
                    }


                    );
                });

            </script>


<script type="text/javascript">
                $(document).ready(function() {
                    $('.btnactuali').click(function() {
                        var idsubcategoria = $(this).attr("name"); 
                        var idproductoxx=String($('#idproductoxx').val());                       
                         var dataString = 'idsubcategoria='+idsubcategoria+'&id='+idproductoxx;    
                         //alert(dataString);   
                          var link="<?php echo site_url('') ?>editarproducto/updatesubcate";                          
                            $.ajax({
                                type: "POST",
                                url:link,
                                data: dataString,
                                success: function(data) {
                                
                                    $('#btn1').click();  
                                    // alert("guardar");

                                }
                            });
                        


                                  
                       
                    }


                    );
                });

            </script>

<div class="col-lg-3" >
<?php
if ($opcs=='actualizar') {
?>

<img src="<?php echo site_url('')?>/resourceadmin/img/configActualizar.png" name="<?php echo $idsubcategoria ?>" class="btnactuali">
<?php
}else{
?>
<img src="<?php echo site_url('')?>/resourceadmin/img/confimacion.png" name="<?php echo $idsubcategoria ?>" class="btnclickcatecx">

<?php
}
?>

</div>