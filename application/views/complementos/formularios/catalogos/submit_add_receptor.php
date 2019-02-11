<div class="showback" >
      				<h4><i class="fa fa-angle-right"></i>AGRGUE UNO O MAS RECEPTORES</h4>
              <form class="form-horizontal style-form" method="post" 
              action="<?php echo base_url(); ?>catalogos/submit_post_receptor">
              <section>     
                  
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
                   
                      
                      <th>RFC</th>
                      <th>Regimen Fiscal</th>
                      <th>Tipo perosna</th>
                      <th>Rason Social</th>
                      <th>Nombre del Receptor</th>
                      <th>Domicilio del Receptor</th>
                      <th>Datos de Contacto</th>

                      <th>accion</th>
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
                
              </section>

              </form>
      				</div>
          		</div>
          	</div>