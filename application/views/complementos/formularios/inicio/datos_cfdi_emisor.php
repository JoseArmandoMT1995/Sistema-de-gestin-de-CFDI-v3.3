<!--emisor-->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href=""><i class="fa fa-key"></i> EMISOR</a>
	        </h4>
	      </div>
	      <div id="collapse1" class="panel-collapse collapse in">
	        <div class="panel-body">
	        	<table border="1" class="table">
	        		<tr>
	        			<th>
	        				<div class="form-group">
					              <label class="col-sm-3 col-sm-3 control-label">ESCOGE AL EMISOR</label>
					              <div class="">
					                  <div class="row-fluid">

					                    <select id="combobox_emisor">
					                      <option value="0">Escoja una opcion</option>
					                        <?php
					                          foreach ($Tabla_Emisor as $datos) {
					                          echo "<option value='".$datos->Id_emisor."' data-subtext='".$datos->RFC_emisor."' value=''>".$datos->Rason_social_emisor."</option>";
					                          }
			                        		?>
					                      </select>
					                  </div>
					              </div>
					         </div>
	        				
	        			</th>
	        		</tr>
	        		<tr>
	        			<td>
	        				<label><b>RFC:</b></label><br>
	        				<input type="text" name="emisro_rfc" id="emisro_rfc" 				    value="">
	        			</td>
	        			<td>
	        				<label>Razin Social:</label><br>
	        				<input type="text" name="emisor_razon_social" id="emisor_razon_social" 	value="">
	        			</td>
	        		</tr>
	        		<tr>
	        			<td>
	        				<label>Regimen Fidcal:</label><br>
	        				<input type="text" name="emisor_regimen_fiscal" id="emisor_regimen_fiscal" 	value="">
	        			</td>
	        			<td>
	        				<label>Tipo de Persona:</label><br>
	        				<input type="text" name="emisor_tipo_persona" id="emisor_tipo_persona" 			value="">
	        			</td>
	        		</tr>
	        	</table>
	        	<hr>
	        	<center>
	        		<table border="1" class="table">
	        		<tr>
	        			<td>
	        				<center>
	        					<button type="button" class="btn btn-warning" onclick="validar_datos_emisor()"><i class="fa fa-search"></i>Validar campos</button>	
	        				</center>
	        				
	        			</td>
	        			<td>
	        				<center>
			        			<a id="emisor_boton_acceso_a" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
			        			<button type="button" class="btn btn-success" 
			        				id="emisor_boton_acceso_buuton" onclick="//bloquear_accesos_receptor()">
			        					<i class="fa fa-check" >Siguiente.</i>     					
			        			</button>
			        			</a>
	        				</center>
	        				
	        			</td>
	        		</tr>

	        		
	        	</table></center>
	        </div>
	      </div>
	    </div>