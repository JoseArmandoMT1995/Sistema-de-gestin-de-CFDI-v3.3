<div class="showback">
      					<h4><i class="fa fa-angle-right"></i>FACTURA NUEVA</h4>
	             <form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>catalogos/update_concepto/<?php echo $concepto_editado['ClaveProdServ']?>">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NoIdentificacion:</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="NoIdentificacion" placeholder="Numero de Identificacion" <?php echo "value='".$concepto_editado['NoIdentificacion']."'";?>>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label">ClaveUnidad:</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="ClaveUnidad" placeholder="ClaveUnidad" <?php echo "value='".$concepto_editado['ClaveUnidad']."'";?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descripcion</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control round-form" name="Descripcion" placeholder="Descripcion" <?php echo "value='".$concepto_editado['Descripcion']."'";?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Valor Unitario</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control round-form" name="ValorUnitario" placeholder="Valor Unitario" <?php echo "value='".$concepto_editado['ValorUnitario']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label" >Moneda</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control round-form" name="Moneda" placeholder="Moneda" <?php echo "value='".$concepto_editado['Moneda']."'";?>>
                              </div>
                          </div>                        
                          <h4><i class="fa fa-angle-right "></i>IMPUESTOS</h4>
                          <br><br>                       
                          <div class="form-group">
                              <label class="col-sm-1 col-sm-1 control-label">Iva</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Impuesto_Iva" placeholder="Iva" <?php echo "value='".$concepto_editado['Impuesto_trans_Iva']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Iva Retenido</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Impuesto_IvaRet" placeholder="Iva Retenido" <?php echo "value='".$concepto_editado['Impuesto_ret_iva']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Isr</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Impuesto_Ieps" placeholder="Ieps" <?php echo "value='".$concepto_editado['Impuesto_trans_Ieps']."'";?>>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Ieps</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control round-form" name="Impuesto_Isr" placeholder="Isr" <?php echo "value='".$concepto_editado['Impuesto_ret_Isr']."'";?>>
                              </div>
                          </div>
                          
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Editar Concepto</button>
                      </form>
      				</div>