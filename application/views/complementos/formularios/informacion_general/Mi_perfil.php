<div class="content-panel">

                           
<div class="row mt">
  <div class="col-lg-3 col-md-4 col-sm-12">
              <!-- -- BASIC PROGRESS BARS ---->
    <div class="white-panel pn">
        <div class="white-header">
          <h5>FOTO DE USUARIO</h5>

        </div>
        <div class="centered">
        <img src="<?=base_url()?>usuarios/fotos_perfil/<?php echo $foto_perfil?>" width="170" height="170">
        </div>  
      </div>
  </div><!-- --/col-lg-6 ---->          
  <div class="col-lg-8 col-md-8 col-sm-12">
              <!-- -- ALERTS EXAMPLES ---->
              <div class="showback">
                <h4><i class="fa fa-angle-right"></i> DATOS GENERALES</h4>
                <?php
                  $nombre_de_usuaro=$mi_perfil['Usunombre'];
                  $folio_usuario=$mi_perfil['Usufolio'];
                  $nivel_acceso=$mi_perfil['Usuacceso'];
                  $puesto=$mi_perfil['Usulogin'];
                  
                  if ($nivel_acceso=='AA') {
                    $privilegios="Puede acceder a <br>todos los modulos  y ver todos los usuarios";
                  }
                  
                  if ($nivel_acceso=='AB') {
                    $privilegios="puede acceder a todos los modulos";
                  }
                  if ($nivel_acceso=='E') {
                    $privilegios="acceso al modulo de <br>Catalogos y generar CFDI 3.3";
                  }
                ?>
                <table class="table" border="1">
                  <thead>
                  <tr>
                      <th colspan="3" =""><b>Nombre de Usuario</b></th>
                      <th colspan="2"><b>Folio</b></th>

                  </tr>
                  </thead>
                                <tr>
                                  <td colspan="3"><?php echo $nombre_de_usuaro?></td>
                                  <td colspan="2"><?php echo $folio_usuario?></td>   
                            </tr>
                            <tr>
                              <td><b>Nivel de Acceso</b></td>
                              <td><b>Puesto</b></td>
                              <td colspan="2"><b>Privilegio</b></td>
                            </tr>
                            <tr>
                              <td><?php echo $nivel_acceso?></td>
                              <td><?php echo $puesto?></td>
                              <td colspan="2"><?php echo $privilegios?></td>
                            </tr>
                            </table>
              </div><!-- /showback -->

            
  </div>
  <br><br>
  <center><a href="<?php echo base_url(); ?>Informacion_General/Editar_perfil/<?php echo $this->session->userdata('Usuclave')?>"><button type="button" class="btn btn-warning">Editar mi Informacion</button></a></center> 
</div><! --/content-panel -->
