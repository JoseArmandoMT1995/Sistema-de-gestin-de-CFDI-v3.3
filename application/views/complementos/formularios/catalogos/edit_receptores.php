<div class="showback">
      					<h4><i class="fa fa-angle-right"></i>DATOS GENERALES</h4>
	             <form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>catalogos/update_receptor/<?php echo $receptores_editado['Id_receptor']?>">
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label">RFC:</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control round-form" name="RFC_receptor" placeholder="Numero de Identificacion" <?php echo "value='".$receptores_editado['RFC_receptor']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Regimen fiscal:</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Regimen_fiscal" placeholder="Regimen fiscal" <?php echo "value='".$receptores_editado['UsoCFDI']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Tipo perosna</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Tipo_perosna_receptor" placeholder="Tipo perosna" <?php echo "value='".$receptores_editado['Tipo_perosna_receptor']."'";?>>
                              </div>
                          </div>
                          <h4><i class="fa fa-angle-right"></i>NOMBRE DEL RECEPTOR</h4>
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label">Rason social</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control round-form" name="Rason_social_receptor" placeholder="Rason social" <?php echo "value='".$receptores_editado['Rason_social_receptor']."'";?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label" >Nombre</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Nombre" placeholder="Nombre" <?php echo "value='".$receptores_editado['Nombre']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label" >Apellido Parerno</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Ap_paterno" placeholder="Apellido Parerno" <?php echo "value='".$receptores_editado['Ap_paterno']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label" >Apellido Marerno</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Ap_materno" placeholder="Apellido Marerno" <?php echo "value='".$receptores_editado['Ap_materno']."'";?>>
                              </div>
                          </div>                        
                          <h4><i class="fa fa-angle-right "></i>DOMICILIO DEL RECEPTOR</h4>
                          <br><br>                       
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label">Calle</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Calle" placeholder="Calle" <?php echo "value='".$receptores_editado['Calle']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Numero Exterior</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="NoExterior" placeholder="Numero Exterior" <?php echo "value='".$receptores_editado['NoExterior']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Numero Interior</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="NoInterior" placeholder="Numero Interior" <?php echo "value='".$receptores_editado['NoInterior']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Colonia</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Colonia" placeholder="Colonia" <?php echo "value='".$receptores_editado['Colonia']."'";?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label">Localidad</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Localidad" placeholder="Localidad" <?php echo "value='".$receptores_editado['Localidad']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Municipio</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Municipio" placeholder="Municipio" <?php echo "value='".$receptores_editado['Municipio']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Estado</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Estado" placeholder="Estado" <?php echo "value='".$receptores_editado['Estado']."'";?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label">Pais</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control round-form" name="Pais" placeholder="Pais" <?php echo "value='".$receptores_editado['Pais']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Codigo Postal</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="CodigoPostal" placeholder="Codigo Postal" <?php echo "value='".$receptores_editado['CodigoPostal']."'";?>>
                              </div>
                              
                          </div>
                          <h4><i class="fa fa-angle-right "></i>DATOS DE CONTACTO DEL RECEPTOR</h4>
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label">Email </label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Email_receptor" placeholder="Email" <?php echo "value='".$receptores_editado['Email_receptor']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Telefono</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Telefono_receptor" placeholder="Telefono" <?php echo "value='".$receptores_editado['Telefono_receptor']."'";?>>
                              </div>
                              
                          </div>
                          
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Editar Concepto</button>
                      </form>
      				</div>