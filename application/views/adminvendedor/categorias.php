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

<div class="col-lg-1" >

<!--<img src="<?php echo site_url('')?>/resourceadmin/img/<?php echo  $img;?>">-->
</div>
<div class="col-lg-3" >
<select multiple="" class="form-control">
  
<?php
                    if (isset($categoria)) {
                      foreach($categoria->result() as $row)
                      {
                        ?> 
                        <option class="btnclickcatecc" name="<?php echo  $row->idCategorias;?>"><?php echo  $row->Nombre;?></option>
                        
                       

                        <?php 
                      }
                    }
                    ?>

                                      
                                    
 </select>
</div>
<div id="subcategoria">

</div>