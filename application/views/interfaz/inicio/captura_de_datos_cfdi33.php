<section id="main-content">
	<section class="wrapper site-min-height">	
	<center><h1>Ingresa Los Datos Para Generar Su CFDI.</h1></center>
	<form method="POST" action="<?=base_url()?>inicio/factura" class="" id="">
		<div class="container">
	  <p><strong>Nota:</strong> Ingrese Los Datos Correspondientes Al<strong> Emisor, Receptor, Comprobante y Conceptos.
	  </strong></p>
	  <div class="panel-group" id="accordion">
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

					                    <select id="combobox_emisor" name="id_emisor">
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
	    <!--receptor-->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href=""><i class="fa fa-sitemap"></i> RECEPTOR</a>
	        </h4>
	      </div>
	      <div id="collapse2" class="panel-collapse collapse">
	        <div class="panel-body">
	        	<table border="1" class="table">
	        		<tr>
	        			<th>
	        				<select id="combobox_receptor" name="Id_receptor">
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
	        	</table>
	        </center>
	        </div>
	      </div>
	    </div>
	    <!--comprobante-->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href=""><i class="fa fa-file-text-o"></i> COMPROBANTE</a>
	        </h4>
	      </div>
	      <div id="collapse3" class="panel-collapse collapse">
	        <div class="panel-body">
	        <table border="1" class="table">
	        	<tr>
	        		<td>
	        			<label>Version:	</label><br>
	        			<input type="text" name="Version" id="Version" value="3.3">
	        		</td>
	        		<td>
	        			<label>Folio:	</label><br>
	        			<input type="text" name="Folio" id="Folio" value="12">
	        		</td>
	        		<td>
	        			<label>Fecha:</label><br>
	        			
	        			<input type="text" name="Fecha" id="Fecha" value="<?php echo $fecha_hora ?>">
	        		</td>
	        		<td>
	        			<label>FormaPago:</label><br>
	        			<select name="FormaPago">
	        				<option>ingrese una opcion</option>
	        				<option value="01">Efectivo</option>
	        				<option value="02">Cheque nominativo</option>
	        				<option value="03">Transferencia electrónica de fondos</option>
	        				<option value="04">Tarjeta de crédito</option>
	        				<option value="05">Monedero electrónico</option>
	        				<option value="06">Dinero electrónico</option>
	        				<option value="08">Vales de despensa</option>
	        				<option value="12">Dación en pago</option>
	        				<option value="13">Pago por subrogación</option>
	        				<option value="14">Pago por consignación</option>
	        				<option value="15">Condonación</option>
	        				<option value="17">Compensación</option>
	        				<option value="23">Novación</option>
	        				<option value="24">Confusión</option>
	        				<option value="25">Remisión de deuda</option>
	        				<option value="26">Prescripción o caducidad</option>
	        				<option value="27">A satisfacción del acreedor</option>
	        				<option value="28">Tarjeta de débito</option>
	        				<option value="29">Tarjeta de servicios</option>
	        				<option value="99">Por definir</option>
	        			</select>
	        			<!--<input type="text" name="FormaPago" id="FormaPago" value="01">-->
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>CondicionesDePago:</label><br><input type="text" name="CondicionesDePago" id="CondicionesDePago" value="UN PAGO">
	        		</td>
	        		<td>
	        			<label>Serie:	</label><br><input type="text" name="Serie" id="Serie" value="A">
	        		</td>
	        		<td>
	        			<label>TipoDeComprobante:	</label><br>
	        			<select name="TipoDeComprobante">
	        				<option>ingrese una opcion</option>
	        				<option value="I">Ingreso</option>
	        				<option value="E">Egreso</option>
	        				<option value="T">Ttranslado</option>
	        				<option value="N">Nomina</option>
	        				<option value="P">Pago</option>	
	        			</select>
	        		</td>
	        		<td>
	        			<label>Moneda:</label><br>
	        			<input type="text" name="Moneda_Comprobante1" id="Moneda" value="MXN">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>MetodoPago:</label><br>
	        			<select name="MetodoPago" name="MetodoPago" id="MetodoPago">
	        				<option>ingrese una opcion</option>
	        				<option value="PUE">Pago en una sola exhibición</option>
	        				<option value="PIP">Pago inicial y parcialidades</option>
	        				<option value="PPD">Pago en parcialidades o diferido</option>
	        			</select>
	        			<!--<input type="text" name="MetodoPago" id="MetodoPago" value="PUE">-->
	        		</td>
	        		<td>
	        			<label>LugarExpedicion:</label><br>
	        			<input type="text" name="LugarExpedicion" id="LugarExpedicion" value="68050">
	        		</td>
	        		
	        		<td>
	        			
	        		</td>
	        		<td>
	        			
	        		</td>
	        	</tr>

	        </table>
	        <hr>
	        <center>
	        	<table border="1" class="table">
	        		<th>
	        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
	        				<button type="button" class="btn btn-primary"><i class="fa fa-check"></i>Regresar</button>
	        			</a>
	        		</th>
	        		<th>
	        		<button type="button" class="btn btn-warning" onclick="validar_datos_comprobante()"><i class="fa fa-search"></i>Validar campos</button>
	        		</th>
	        		<th>
	        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" id="comprobantes_boton_acceso_a">
	        				<button type="button" class="btn btn-success" onclick="//bloquear_accesos_conceptos()" id="comprobantes_boton_acceso_buuton"><i class="fa fa-check"></i>Siguiente</button>
	        			</a>
	        		</th>
	        	</table>
	        		
	        </center>
	      </div>
	      </div>
	    </div>
	    <!--concepto-->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href=""><i class="fa fa-cubes"></i> CONCEPTOS</a>
	        </h4>
	      </div>
	      <div id="collapse4" class="panel-collapse collapse">
	        <div class="panel-body">
	        	<table border="1" class="table">
	        		<tr>
	        			<td colspan="4">
	        				<label>seleccione su concepto:</label><br>
	        				<select id="combobox_concepto">
	        					<option>conceptos</option>
	        					<?php
					                foreach ($Tabla_Conceptos as $datos) {
					                echo "<option value='".$datos->ClaveProdServ."' data-subtext='".$datos->NoIdentificacion."' value=''>".$datos->Descripcion."</option>";
					                }
			                    ?>
	        				</select>
	        			</td>
	        			<td colspan="4">
	        				CANTIDAD DE CONCEPTOS: <br>
	        				<input type="number" id="Cantidad" name="Cantidad" value="0" onchange="calculo_impuesto()" min="1" max="100">
	        			</td>
	        			<td colspan="4">
	        				ACCIONES: <br>
	        				<input type="button" name="" id="boton_agregar_conceptos" value="+ agregar concepto" onclick="agregar_concepto()">
	        			</td>
	        		</tr>
	        	</table>
	        	<div style="
                   background: #E8E6E6;
                    width: 100%;
                        height: 600px;
                    overflow: scroll;" >
	        	<table border="2" cols="100" class="table">
	        		<tr>
	        			<td colspan="7"><h2>CONCEPTO BASE</h2></td>
	        			
	        			
	        		</tr>
	        		<tr>
	        			<td>ClaveProdServ</td>
	        			<td>NoIdentificacion</td>
	        			<td>ClaveUnidad</td>
	        			<td>Descripcion</td>
	        			<td>ValorUnitario</td>
	        			<td>Moneda</td>
	        			<td>Descuento</td>
	        			
	        			
	        		</tr>
	        		<tr>
	        			<td><input type="text" name="ClaveProdServ" id="ClaveProdServ" value=""></td>
	        			<td><input type="text" name="NoIdentificacion" id="NoIdentificacion" value=""></td>
	        			<td><input type="text" name="ClaveUnidad" id="ClaveUnidad" value=""></td>
	        			<td><input type="text" name="Descripcion" id="Descripcion" value=""></td>
	        			
	        			<td><input type="text" name="ValorUnitario" id="ValorUnitario" value=""></td>
	        			<td><input type="text" name="concepto_Moneda" id="concepto_Moneda" value=""></td>
	        			<td><input type="text" name="concepto_descuento" id="concepto_descuento" value=""></td>
	        			
	        			
	        			
	        		<tr>
	        			<td rowspan="2">FECHA DE CAPTURA CONCEPTO</td>
	        			<td colspan="2">IMPUESTOS TRNSLADDOS:</td>
	        			<td colspan="3">IMPUESTOS RETENIDOS:</td>
	        			<td rowspan="2">IMPORTE:</td>
	        		</tr>
	        		<tr>
	        			
	        			<td>IVA</td>
	        			<td>IEPS</td>
	        			<td>ISR</td>
	        			<td>IVA</td>
	        			<td>IEPS</td>
	        			
	        			
	        		</tr>
	        		
	        			<td><input type="text" id="Fecha_captura" 		value=""></td>
	        		
	        			<td><input type="text" id="Impuesto_Iva_Trans" 	value=""></td>
	        			
	        			<td><input type="text" id="Impuesto_Ieps_Trans" value=""></td>
	        			<td><input type="text" id="Impuesto_Isr_Ret" 	value=""></td>
	        			<td><input type="text" id="Impuesto_Iva_Ret" 	value=""></td>
	        			<td><input type="text" id="Impuesto_Ieps_Ret" 	value=""></td>
	        			
	        			<td><input type="text" id="importe_base_concepto" >
	        			</td>
	        			
	        		</tr>
	        		<tr>
	        			<td colspan="13"><h3>IMPUESTOS CALCULADOS:</h3> </td>
	        		</tr>
	        		<tr>
	        			<td colspan="1" rowspan="2"><h4>transladados:</h4></td>
	        			<td colspan="1" rowspan="1"><h4>iva:</h4></td>

	        				<td colspan="1">
	        					<label>Base:</label><br><input type="text" 
	        					id="trans_iva_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Impuesto:</label><br><input type="text" 
	        					id="trans_iva_impuesto">
	        				</td>
							<td colspan="1">
	        					<label>TipoFactor:</label><br><input type="text"  
	        					 id="trans_iva_tipo_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Tasa:</label><br><input type="text" 
	        				 	id="trans_iva_tasa">
	        				</td>
	        				<td colspan="1">
	        					<label>Importe:</label><br><input type="text" 
	        				 	id="trans_iva_importe">
	        				</td>
	        				
	        				
	        		</tr>
	        		<tr>
	        				<td colspan="1" rowspan="1"><h4>ieps:</h4></td>
	        				<td colspan="1">
	        					<label>Base:</label><br><input type="text" 
	        					 id="trans_ieps_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Impuesto:</label><br><input type="text" 
	        					  id="trans_ieps_impuesto">
	        				</td>
							<td colspan="1">
	        					<label>TipoFactor:</label><br><input type="text"  
	        					  id="trans_ieps_tipo_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Tasa:</label><br><input type="text" 
	        					 id="trans_ieps_tasa">
	        				</td>
	        				<td colspan="1">
	        					<label>Importe:</label><br><input type="text" 
	        					 id="trans_ieps_importe">
	        				</td>
	        		</tr>

	        		</tr>
	        		<tr>
	        			<td colspan="1" rowspan="3"><h4>retenidos:</h4></td>
	        				<td colspan="1" rowspan="1"><h4>iva:</h4></td>
	        				<td colspan="1">
	        					<label>Base:</label><br><input type="text" 
	        					 id="ret_iva_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Impuesto:</label><br><input type="text" 
	        					  id="ret_iva_impuesto">
	        				</td>
							<td colspan="1">
	        					<label>TipoFactor:</label><br><input type="text"  
	        					  id="ret_iva_tipo_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Tasa:</label><br><input type="text" 
	        					 id="ret_iva_tasa">
	        				</td>
	        				<td colspan="1">
	        					<label>Importe:</label><br><input type="text" 
	        					 id="ret_iva_importe">
	        				</td>
	        		</tr>
	        		<tr>
	        				<td colspan="1" rowspan="1"><h4>ieps:</h4></td>
	        				<td colspan="1">
	        					<label>Base:</label><br><input type="text" 
	        					 id="ret_ieps_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Impuesto:</label><br><input type="text" 
	        					  id="ret_ieps_impuesto">
	        				</td>
							<td colspan="1">
	        					<label>TipoFactor:</label><br><input type="text"  
	        					  id="ret_ieps_tipo_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Tasa:</label><br><input type="text" 
	        					 id="ret_ieps_tasa">
	        				</td>
	        				<td colspan="1">
	        					<label>Importe:</label><br><input type="text" 
	        					 id="ret_ieps_importe">
	        				</td>
	        		</tr>
	        		<tr>
	        				<td colspan="1" rowspan="1"><h4>iva:</h4></td>
	        				<td colspan="1">
	        					<label>Base:</label><br><input type="text" 
	        					 id="ret_isr_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Impuesto:</label><br><input type="text" 
	        					  id="ret_isr_impuesto">
	        				</td>
							<td colspan="1">
	        					<label>TipoFactor:</label><br><input type="text"  
	        					  id="ret_isr_tipo_base">
	        				</td>
	        				<td colspan="1">
	        					<label>Tasa:</label><br><input type="text" 
	        					 id="ret_isr_tasa">
	        				</td>
	        				<td colspan="1">
	        					<label>Importe:</label><br><input type="text" 
	        					id="ret_isr_importe">
	        				</td>
	        		</tr>
	        		</table>

	        	</div>
	        	<div>
	        	<h2>conceptos agregados</h2>
	        	<div <div style="
                   background: #E8E6E6;
                    width: 100%;
                        height: 380px;
                    overflow: scroll;" >
	        			<table border="1" id="tabla" class="table">
	        				<tr>
	        					<td colspan="9" rowspan="2">CONCEPTO A DETALLE</td>
	        					<td colspan="1" rowspan="3">IMPORTE BASE</td>
	        					<td colspan="4">IMPUETOS DE TRANSLADO</td>
	        					<td colspan="6">IMPUESTOS DE RETENCION</td>
	        					<td colspan="1" rowspan="3">ACCION</td>
	        					
	        				</tr>
	        				<tr>
	        					<td colspan="2">IVA</td>
	        					<td colspan="2">IEPS</td>

	        					<td colspan="2">IVA</td>
	        					<td colspan="2">IEPS</td>
	        					<td colspan="2">ISR</td>
	        					
	        				</tr>
	        				<tr>
	        					<td>ID COMPROBNTE</td>
	        					<td>CLAVE(PROD/SERV)</td>
	        					<td>NUMERO ID</td>
	        					<td>CALAVE UNIDAD</td>
	        					<td>DESCRIPCION</td>
	        					<td>VALOR UNITARIO</td>
	        					<td>MONEDA	</td>
	        					<td>DESCUENTO	</td>
	        					<td>CANTIDAD	</td>
	        					
	        					<!--impuestos transladados-->
	        					<!--iva-->
	        					
	        					<td>TASA O CUOTA</td>
	        					<td>IMPORTE</td>
	        					<!--ieps-->
	        					
	        					<td>TASA O CUOTA</td>
	        					<td>IMPORTE</td>
	        					<!--iva-->
	        					
	        					<td>TASA O CUOTA</td>
	        					<td>IMPORTE</td>
	        					<!--ieps-->
	        					
	        					<td>TASA O CUOTA</td>
	        					<td>IMPORTE</td>
	        					<!--isr-->
	        					
	        					<td>TASA O CUOTA</td>
	        					<td>IMPORTE</td>
	        				</tr>
	        				<tr class="fila-fija" id="fila-fija">	
	        				</tr>
	        				<tr></tr>		
	        			</table>		
	        	</div>
	        	</div>
	        	<br>	
	        	
	        		<hr>
	        		<center>
	        		<table border="1" class="table">
	        		<th>
	        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
	        				<button type="button" class="btn btn-primary"><i class="fa fa-check"></i>Regresar</button>
	        			</a>
	        		</th>
	        		<th>
	        		<button type="button" class="btn btn-warning" onclick="validar_datos_conceptos()"><i class="fa fa-search"></i>Validar campos</button>
	        		</th>
	        		<th>
	        				<button type="submit" name="insertar" class="btn btn-success"><i class="fa fa-save"></i> Generar CFDI</button>
	        		</th>
	        	</table></center>
	    	</div>
	      </div>
	    </div>
	  </div> 
		</div>
	</form>

	</section>
</section>