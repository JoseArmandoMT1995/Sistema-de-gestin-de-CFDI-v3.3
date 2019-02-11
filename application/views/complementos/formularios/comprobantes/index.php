<div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i>DATOS DEL USUARIO</h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Puesto</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Nivel de Acceso</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <td><?php echo $mi_perfil['Usufolio']?></td>
                                  <td><?php echo $mi_perfil['Usulogin']?></td>
                                  <td><?php echo $mi_perfil['Usunombre']?></td>
                                  <td><?php echo $mi_perfil['Usuacceso']?></td>
                      
                            </tbody>
                            </table>
                           <center><a href="configuracion/Editar_perfil/<?php echo $this->session->userdata('Usuclave')?>"><button type="button" class="btn btn-warning">Editar mi Informacion</button></a></center> 
</div><! --/content-panel -->