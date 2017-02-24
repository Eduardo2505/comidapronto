<script type="text/javascript">
     

         $(document).ready(function() {
            $("#cahngeColonis").change(function(){
             
                          var data = $(this).val();
                          var dataString = 'delegacion=<?php echo $delegacion;?>&colonia='+data;
                            var link="<?php echo site_url('') ?>sucursales/filtrocp";                          
                              $.ajax({
                                  type: "GET",
                                  url:link,
                                  data: dataString,
                                  success: function(data) {
                                     //  alert(data);
                                       $("#cpfiltro").html(data);
                                            }
                                      });
                          
                           
                               });
                                 
                         
                        });
        
                   </script> 


<label class="col-lg-4 control-label">Colonia</label>
                    <div class="col-lg-6">

                   <select required name="col" id="cahngeColonis" class="form-control">
                    <option value=""> Seleccione</option>
                     <?php
      
                   
                      foreach ($xmlData['elementos'] as $row) {

                        if($delegacion==$row['delegacion']){

                              $result = '<option value="'. $row['colonia'] . '"> '.$row['colonia'] . '</option>';
                             echo $result;
                        }

                       }
                   ?>
                     
                      
                    </select>
                     
  </div>