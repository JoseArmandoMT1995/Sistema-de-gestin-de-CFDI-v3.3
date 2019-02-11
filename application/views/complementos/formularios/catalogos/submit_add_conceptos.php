<div class="showback" >
      				<h4><i class="fa fa-angle-right"></i>AGRGUE UNO O MAS CONCEPTOS</h4>
              <section>
                <form method="post" action="<?=base_url()?>catalogos/submit_post_concepto">
                  
                  <div align="center" style="border:1px"> 
                  <input type="number" id="myNumber" name=""  min="1" max="10" value="1">
                  <button id="adicional" name="adicional" type="button" class="btn-primary"> AGREGAR + </button>
                  </div>
                   <div style="
                   background: #E8E6E6;
                    width: 100%;
                        height: 375px;
                    overflow: scroll;" >
                    <table border="1" class="table table-striped table-bordered table-hover table-condensed" id="tabla">
                    <tr>
                      <td colspan="7">CONCEPTO</td>
                      <td colspan="2">IMPUESTOS</td>
                      <td rowspan="2" colspan="">OPCIONES</td>
                    </tr>
                    <tr>
                   
                      <th>ClaveProdServ</th>
                      <th>NoIdentificacion</th>
                      <th>ClaveUnidad</th>
                      <th >Descripcion</th>
                      <th>ValorUnitario</th>
                      <th>Moneda</th>
                      <th>Descuento</th>
                      <th>Transladados</th>
                      <th>Retenidos</th>

                    </tr>
                    <tr class="fila-fija" id="fila-fija">
                      
                    </tr>
                  </table>
                  </div>
                  <br><br>
                  <div align="center">
                    <a href="<?=base_url()?>catalogos/submit_add_concepto">
                      <button type="button" name="cancelar" class="btn btn-danger"><span class='glyphicon glyphicon-repeat'><b>CANCELAR</b></button></a>
                      <button type="submit" name="insertar" class="btn btn-info"><span class='glyphicon glyphicon-ok'></span> <b>AGREGAR CONCEPTO/S</b></button>
                    
                  </div>
                </form>
              </section>
      				</div>
          		</div>
          	</div>