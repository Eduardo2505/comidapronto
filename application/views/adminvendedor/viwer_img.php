<script type="text/javascript">

 $(document).ready(function() {
                    $('.btnclickdeleimg').click(function() {
                        var user = $(this).attr("name");
                        var dataString = 'idimg='+user;    
                       // alert(dataString);                    
                        if (user != "") {
                          var link="<?php echo site_url('') ?>editarproducto/eliminarimg";                          
                            $.ajax({
                                type: "POST",
                                url:link,
                                data: dataString,
                                success: function(data) {
                                
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

                        ?>
                      
                        
                         
                        <a href="#" class="btn btn-xs btn-danger btnclickdeleimg"  name="<?php echo  $rowi->idimagenes;?>&idProducto=<?php echo $idProdutoimg; ?>"><i class="icon-remove"></i></a> <img src="<?php echo site_url('') ?>uploads/<?php echo  $rowi->url;?>" alt="" />
                      
                         <?php
                   
                      }
                    }
                ?>