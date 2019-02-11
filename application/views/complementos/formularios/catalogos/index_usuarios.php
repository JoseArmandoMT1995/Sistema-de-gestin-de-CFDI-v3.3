<form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>catalogos/agregar_receptor">
            <div class="showback">
                <h4><i class="fa fa-angle-right"></i>TODOS LOS USUARIOS</h4>

                
                    <div >
                  <div style="
                      background: #E8E6E6;
                      width: 100%;
                      height: 290px;
                      overflow: scroll;" >
                  <table border="1" class="table">
                    <tr>
                             <td>Folio</td>  
                             <td>Puesto</td>  
                             <td>Nombre de Usuario</td>  
                             <td>Nivel de Acceso</td>  
                             
                    <th colspan="2">Opciones</th>
                    </tr>
                  <?php
                     foreach($usuario as $datos)
                                {
                                  echo 
                                  "<tr>".
                                  "<td>".$datos->Usufolio."</td>".
                                  "<td>".$datos->Usulogin."</td>".
                                  "<td>".$datos->Usunombre."</td>".
                                  "<td>".$datos->Usuacceso."</td>".
                                  
                                 "<td><a href='edit_usuarios/".$datos->Usuclave."'><span class='  glyphicon glyphicon-edit'></span>Modificar</a></td>".
                                 "<td><a href='eliminarUsiario/".$datos->Usuclave."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a></td>".
                                  "</tr>";
                                }
                  ?>
                  </table>
                </div>
                </div>         
              </div>
              <div class="showback">
                    <h4><i class="fa fa-gears"></i> ACCIONES</h4>
                    <table border="1">
                      <tr>
                        <th colspan="1">IMPRIMIR REPORTE </th>
                        <th>SUBIR REGISTROS </th>
                      </tr>
                      <tr>
                        <td>
                          <center>
                          <a href="<?php echo base_url(); ?>catalogos/documento/usuario/pdf"><button type="button" class="btn btn-theme04"><i class="fa fa-file-pdf-o"></i> IMPRIMIR EN PDF</button></a>
                        </center>
                        </td>
                        

                        <td>
                          <center>
                            <?php 
                              $ss=$this->session->userdata('Usuacceso');
                              if ($ss=="AA") {
                                $tipo_usuario="catalogos/submit_add_usuarios";
                              }else{
                                $tipo_usuario="catalogos/submit_add_usuarios";
                              }
                            ?>
                          <a href="<?php echo base_url(); ?><?php echo $tipo_usuario?>"><button type="button" class="btn btn-warning"><span class='glyphicon glyphicon-plus'></span> <b>AGREGAR ELEMENTO</b></button></a> </center>                       </td>
                      </tr>
                    </table>
                  </div>
</form>