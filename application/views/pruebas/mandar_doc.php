<div class="showback" >
      				<h4><i class="fa fa-angle-right"></i>AGREGAR ADMINISTRADOR</h4>
              <form class="form-horizontal style-form" method="post" 
              action="<?php echo base_url(); ?>pruebas/insertar_administrador" enctype="multipart/form-data">
              <section>
                                
                  <div align="center">
                              <div class="form-group">                              
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre de Usuario:
                              </label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" name="Usunombre" placeholder="Ingrese el nombre para el usuario">
                              </div>
                          </div>
                          <div class="form-group">
                          
                              <label class="col-sm-2 col-sm-2 control-label">cer:</label>
                              <div class="col-sm-1">
                                  <input type="file" name="archivo1[]" id="Foto_Perfil" multiple>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label">pem:</label>
                              <div class="col-sm-1">
                                  <input type="file" name="archivo2[]" id="Foto_Perfil" multiple>
                              </div>
                          </div>  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contraseña:</label>
                              <div class="col-sm-3">
                                  <input type="password" name="contraseña" id="contraseña" class="form-control" value="admin">
                              </div>
                          </div> 
                          <input type="submit" value="Subir" name="insertar" >
                  </div>
                
              </section>
              </form>
      				</div>
          		</div>
          	</div>