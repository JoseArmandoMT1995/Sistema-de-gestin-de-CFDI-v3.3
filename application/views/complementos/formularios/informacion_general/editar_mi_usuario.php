<div class="showback">
  <h4><i class="fa fa-angle-right"></i>EDITAR MI USUARIO</h4>
	<form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>Informacion_General/update_usuario/<?php echo $usuario_editado['Usuclave'] ?>/A" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Nombre:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control " name="Usunombre" placeholder="Usunombre" <?php echo "value='".$usuario_editado['Usunombre']."'";?>>
        </div>
    </div>
                          
    <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Contraseña:</label>
        <div class="col-sm-2">
            <input type="password" class="form-control " name="contraseña" placeholder="Contraseña"  <?php echo "value='".$usuario_editado['contraseña']."'";?>>
        </div>
        <label class="col-sm-2 col-sm-2 control-label">Foto del Usuario:</label>
        <div class="col-sm-1">
            <input type="file" name="Usufoto[]" id="Usufoto">
        </div>
    </div> 
    <label class="checkbox">
      <span class="pull-right">
        <a data-toggle="modal" href="login.html#myModal"> Editar</a>
      </span>
    </label> 
<!------------------------------------------------------------------------------------------->
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              
                              <h4 class="modal-title">Necesitamos Tu Autorisacion</h4>
                          </div>
                          <div class="modal-body">
                              <p>Ingrese su dirección de correo electrónico y rfc a continuación para restablecer su contraseña.</p>
                              <br>
                              <center><b><h3><p id="alerta_ov"></p></h3></b></center>
                              <input type="text" name="nombre_usu" placeholder="nombre usurio" autocomplete="off" class="form-control placeholder-no-fix" id="nombre_usu">

                              <br>
                              <input type="text" name="contraseña_usu" placeholder="contraseña" autocomplete="off" class="form-control placeholder-no-fix" id="contraseña_usu">
                              <br>

                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>

                              <button type="submit" class="btn btn-default" class="btn btn-theme">Editar</button>
                             
                              
                          </div>
                      </div>
                  </div>
                  </div>
                          <!--<button type="submit" class="btn btn-primary btn-lg btn-block">Editar Concepto</button>-->
                      </form>
      				</div>

              