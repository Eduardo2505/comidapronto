


<label class="col-lg-4 control-label">CP</label>
                    <div class="col-lg-6">

                   <select required name="cp" class="form-control">
                    <option value=""> Seleccione</option>
                     <?php
      
                   
                      foreach ($xmlData['elementos'] as $row) {

                        if($delegacion==$row['delegacion']&&$colonia==$row['colonia']){

                              $result = '<option value="'. $row['cp'] . '"> '.$row['cp'] . '</option>';
                             echo $result;
                        }

                       }
                   ?>
                     
                      
                    </select>
                     
  </div>