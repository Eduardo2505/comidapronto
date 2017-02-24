<script type="text/javascript">
                $(document).ready(function() {
                    $('.btnclickcatecs').click(function() {
                        var user = $(this).attr("name");
                        var dataString = 'idsubcategoria='+user;  
                                              
                        if (user != "") {
                          var link="<?php echo site_url('') ?>nuevoproducto/marcaviwer";                          
                            $.ajax({
                                type: "POST",
                                url:link,
                                data: dataString,
                                success: function(data) {
                               //alert(data);
                                   $('#sinpasodos').show();
                                   $('#activarpaso2').hide();
                                    $('#mosmarcar').html(data);

                                }
                            });
                            //}
                        }
                    }


                    );
                });

            </script>

<div class="col-lg-3" >
 <h2>Sub-Categoría</h2>

<select multiple="" class="form-control">
  
<?php
                    if (isset($subcategorias)) {
                      foreach($subcategorias->result() as $row)
                      {
                        ?> 
                        <option class="btnclickcatecs" name="<?php echo  $row->idCategoriaSubcate;?>"><?php echo  $row->Nombre;?></option>
                        
                       

                        <?php 
                      }
                    }
                    ?>

                                      
                                    
 </select>
</div>
<div id="mosmarcar">
    
</div>