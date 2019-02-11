            <div class="col-md-12">
              <div class="content-panel">
                <table>
                  <tr>
                    <th>SELECCIONE SU CONCEPTO -></th>
                    <th>
                      <div class="row-fluid">
                    <select class="selectpicker col-md-11"  data-show-subtext="true" data-live-search="true" id="conseptos">
                      <option value="">SELECCIONE EL CONCEPTO DESEADO</option>
                        <?php
                          foreach ($Tabla_Conceptos as $datos) {
                          echo "<option value='".$datos->ClaveProdServ."' data-subtext='".$datos->ClaveProdServ."' value=''>".$datos->Descripcion."</option>";
                          }
                        ?>
                      </select>                                  
                  </div>
                    </th>
                    
                  </tr>
                </table>
                  <div style="
                   background: #E8E6E6;
                    width: 100%;
                        height: 150px;
                    overflow: scroll;" >
                    <table border="1" class="table table-striped table-bordered table-hover table-condensed" >
                    <tr>
                      <th>DESCRIPCION</th>
                      <th>CANTIDAD</th>
                      <th>UNIDAD</th>
                      <th>CLAVE/PRODUCTOS Y SERVICIOS </th>
                      <th >NO ID  </th>
                      <th>CLAVE UNIDAD  </th>
                      <th>VALOR UNITARIO  </th>
                      <th>iVA  </th>
                      <th>IVA RETENIDO  </th>
                      <th>ISR </th>
                      <th>IEPS</th>
                      <th>DESCUENTO </th>
                      <th >IMPORTE/CONCEPTO  </th>
                      <th>BASE  </th>
                      <th>IMPORTE/TRANSLADO</th>
                      <th>ACCION  </th>
                    </tr>
                    <tr id="copia">
                      <td><input type="text" name=""  id="descripcion" ></td>
                      <td><input type="number" name="" id="cantidad1" min="1" max="100" value="1"></td>
                      <td><input type="text" name=""  id="unidad" ></td>
                      <td><input type="text" name=""  id="cps" ></td>
                      <td><input type="text" name=""  id="ni" ></td>
                      <td><input type="text" name=""  id="cu" ></td>
                      <td><input type="text" name=""  id="vu" ></td>
                      <td><input type="text" name=""  id="iva" ></td>
                      <td><input type="text" name=""  id="ivar" ></td>
                      <td><input type="text" name=""  id="isr" ></td>
                      <td><input type="text" name=""  id="ieps" ></td>
                      <td><input type="text" name=""  id="descuento" ></td>
                      <td><input type="text" name=""  id="importe_c" ></td>
                      <td><input type="text" name=""  id="base" ></td>
                      <td><input type="text" name=""  id="importe_t" ></td>
                      <td><button id="adicional" name="adicional" type="button" class="btn btn-info" >+ agregar elemento</button></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
<br><br>
<div class="col-md-12">
  <div class="content-panel">
    <div style="
      background: #E8E6E6;
      width: 100%;
      height: 300px;
      overflow: scroll;" >
        <table border="1" class="table table-striped table-bordered table-hover table-condensed" id="tabla">
        <tr>
          <th>DESCRIPCION</th>
          <th>CANTIDAD</th>
          <th>UNIDAD</th>
          <th>CLAVE/PRODUCTOS Y SERVICIOS </th>
          <th >NO ID  </th>
          <th>CLAVE UNIDAD  </th>
          <th>VALOR UNITARIO  </th>
          <th>iVA  </th>
          <th>IVA RETENIDO  </th>
          <th>ISR </th>
          <th>IEPS</th>                      
          <th>DESCUENTO </th>
          <th >IMPORTE/CONCEPTO  </th>
          <th>BASE  </th>
          <th>IMPORTE/TRANSLADO</th>
          <th>ACCION  </th>
        </tr>
        <tr class="fila-fija" id="fila-fija">
        </tr>
      </table>
    </div>
  </div>
</div>