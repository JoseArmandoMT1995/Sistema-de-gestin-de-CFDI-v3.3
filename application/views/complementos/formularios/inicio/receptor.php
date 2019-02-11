<table class="table"> 
    <tr>  
        <td>
          <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">RFC RECEPTOR</label>
              <div class="">
                  <div class="row-fluid">

                    <select class="selectpicker"  data-show-subtext="true" data-live-search="true" id="Receptor">
                      <option value="0">Escoja una opcion</option>
                        <?php
                          foreach ($Tabla_Receptor as $datos) {
                          echo "<option value='".$datos->Id_receptor."' data-subtext='".$datos->RFC_receptor."' value=''>".$datos->Rason_social_receptor."</option>";
                          }
                        ?>
                      </select>
                  </div>
              </div>
          </div>

        </td>
    </tr>
    <tr>  
        <td>
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">RFC</label>
              <div class="col-sm-8">
                                
              <input type="text" class="form-control round-form" name="razon_social" id="rfc" >
              </div>
            </div>
        </td>
    </tr>
    <tr>  
        <td>
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">RAZON SOCIAL/NOMBRE</label>
              <div class="col-sm-8">
                                
              <input type="text" class="form-control round-form" name="razon_social" id="razon_social" >
              </div>
            </div>
        </td>
    </tr>
    <tr>  
        <td>
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">USO CFDI</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control round-form" name="uso_cfdi" id="uso_cfdi" >
              </div>
            </div>

        </td>
    </tr>
    <tr>  
        <td>
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">TIPO DE PERSONA</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control round-form" name="tipo_persona" id="tipo_persona" >
              </div>
            </div>
        </td>
    </tr>

</table>
                          

                         

            