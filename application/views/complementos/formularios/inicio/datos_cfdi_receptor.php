<!--receptor-->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href=""><i class="fa fa-handshake-o"></i> RECEPTOR</a>
	        </h4>
	      </div>
	      <div id="collapse2" class="panel-collapse collapse">
	        <div class="panel-body">
	        	<table border="1" class="table">
	        		<tr>
	        			<th>
	        				<select id="combobox_receptor">
	        					<option>ingrese su opcion</option>
	        					<?php
					                foreach ($Tabla_Receptor as $datos) {
					                echo "<option value='".$datos->Id_receptor."' data-subtext='".$datos->RFC_receptor."' value=''>".$datos->Rason_social_receptor."</option>";
					                }
			                    ?>
	        				</select>
	        			</th>
	        		</tr>
	        		<tr>
	        			<td>
	        				<label><b>RFC:</b></label><br>
	        				<input type="text" name="receptor_rfc" id="receptor_rfc" value="">
	        			</td>
	        			<td>
	        				<label>Razin Social:</label><br>
	        				<input type="text" name="receptor_razon_social" id="receptor_razon_social" value="">
	        			</td>
	        		</tr>
	        		<tr>
	        			<td>
	        				<label>Uso de Cfdi:</label><br>
	        				<input type="text" name="receptor_uso_cfdi" id="receptor_uso_cfdi" value="">
	        			</td>
	        			<td>
	        				<label>Tipo de Persona:</label><br>
	        				<input type="text" name="receptor_tipo_persona" id="receptor_tipo_persona" value="">
	        			</td>
	        		</tr>
	        	</table>
	        	<hr>
	        	<center>
	        		<table border="1" class="table">
	        		<th>
	        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
	        				<button type="button" class="btn btn-primary"><i class="fa fa-check"></i>Regresar</button>
	        			</a>
	        		</th>
	        		<th>
	        		<button type="button" class="btn btn-warning" onclick="//validar_datos_receptor()"><i class="fa fa-search"></i>Validar campos</button>
	        		</th>
	        		<th>
	        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" id="receptor_boton_acceso_buuton">
	        				<button type="button" class="btn btn-success" onclick="//bloquear_accesos_comprobante()" id="receptor_boton_acceso_buuton"><i class="fa fa-check"></i>Siguiente</button>
	        			</a>
	        		</th>
	        	</table></center>
	        	
	        </div>
	      </div>
	    </div>