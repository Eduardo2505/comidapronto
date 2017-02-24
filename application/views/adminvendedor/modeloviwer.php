<script type="text/javascript">
                $(document).ready(function() {
                    $('.btnclickcatec').click(function() {
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


<select multiple="" class="form-control">
  
<?php
                    if (isset($modelo)) {
                      foreach($modelo->result() as $row)
                      {
                        ?> 
                        <option class="btnclickcatec" name="<?php echo  $row->idModelo;?>"><?php echo  $row->Nombre;?></option>
                        
                       

                        <?php 
                      }
                    }
                    ?>

                                      
                                    
 </select>
</div>
