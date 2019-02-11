    <form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>catalogos/submit_add_emisor">
            <div class="showback">
                <h4><i class="fa fa-angle-right"></i>TODOS LOS EMISORES</h4>
                    <div >
                  <div style="
                      background: #E8E6E6;
                      width: 100%;
                      height: 290px;
                      overflow: scroll;" >
                  <table border="1" class="table">
                    <tr>
                             <td>RFC</td>  
                             <td>Regimen Fiscal</td>  
                             <td>Tipo Perosna</td>  
                             <td>Rason Social</td>  
                             <td>Nombre</td> 
                             <td>Domicilio</td> 
                             <td>Email</td>  
                             <td>Telefono</td> 
                             <th colspan="2">Opciones</th>
                    </tr>
                  <?php
                     foreach($emisor as $datos)
                                {
                                  echo 
                                  "<tr>".
                                  "<td>".$datos->RFC_emisor."</td>".
                                  "<td>".$datos->Regimen_fiscal."</td>".
                                  "<td>".$datos->Tipo_perosna_emisor."</td>".
                                  "<td>".$datos->Rason_social_emisor."</td>".
                                  "<td>".$datos->Nombre." ".$datos->Ap_paterno." ".$datos->Ap_materno."</td>".
                                  "<td>"."Calle:".$datos->Calle.",NoExterior:".$datos->NoExterior.",Colonia ".$datos->Colonia.",Localidad ".$datos->Localidad.",Municipio ".$datos->Municipio.",Estado ".$datos->Estado.",Pais ".$datos->Pais.",CodigoPostal ".$datos->CodigoPostal."</td>".
                                  "<td>".$datos->Email_emisor."</td>".
                                  "<td>".$datos->Telefono_emisor."</td>".
                                  
                                 "<td><a href='edit_emisor/".$datos->Id_emisor."'><span class=' glyphicon glyphicon-edit'></span>Modificar</a></td>".
                                 "<td><a href='eliminarReceptor/".$datos->Id_emisor."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a></td>".
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
                        <th >SUBIR REGISTROS </th>
                      </tr>
                      <tr>
                        <td>
                          <center>
                          <a href="<?php echo base_url(); ?>catalogos/documento/emisor/pdf"><button type="button" class="btn btn-theme04"><i class="fa fa-file-pdf-o"></i> IMPRIMIR EN PDF</button></a>
                          </center>
                        </td>
                                   
                        <td>
                          <center>
                          <a href="<?php echo base_url(); ?>catalogos/submit_add_emisor"><button type="button" class="btn btn-warning"><span class='glyphicon glyphicon-plus'></span> <b>AGREGAR ELEMENTO</b></button></a>
                          </center>
                          </td>
                      </tr>
                    </table>
                  </div>
        </form>