<form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>configuracion/insertar_administrador" enctype="multipart/form-data">
  <section>                            
    <div align="center">
      <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Nombre de Usuario:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Usunombre" placeholder="Ingrese el nombre para el usuario">
        </div>
      </div>
      <div class="form-group">                    
        <label class="col-sm-2 col-sm-2 control-label">Foto del Usuario:</label>
          <div class="col-sm-1">
              <input type="file" name="archivo[]" id="Foto_Perfil" multiple>
          </div>
      </div>  
      <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Contraseña:</label>
        <div class="col-sm-3">
          <input type="password" name="contraseña" id="contraseña" class="form-control" value="admin">
        </div>
      </div> 
      <center>
        <button type="submit" name="insertar" class="btn btn-info">
          <span class='glyphicon glyphicon-ok'></span> 
          <b>AGREGAR USUARIO</b>
        </button>
      </center>
    </div>           
  </section>
</form>