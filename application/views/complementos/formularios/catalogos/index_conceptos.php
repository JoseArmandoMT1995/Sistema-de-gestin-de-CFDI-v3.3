<form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>catalogos/agregar_receptor">
      <div class="showback">
                <h4><i class="fa fa-angle-right"></i>TODOS LOS CONCEPTOS</h4>
                
                    <div >
                    <div style="
                        background: #E8E6E6;
                        width: 100%;
                        height: 290px;
                        overflow: scroll;" >
                    <table border="1" class="table">
                      <tr>
                        <td colspan="8" rowspan="2"><h3>CONCEPTO</h3></td>
                        <td colspan="5">IMPUESTOS</td>
                        <td colspan="2" rowspan="3">OPCIONES</td>
                      </tr>
                      <td colspan="2">TRANSLADADOS</td>
                      <td colspan="3">RETENIDOS</td>
                      
                      <tr>
                               <td>ClaveProdServ</td>  
                               <td>NoIdentificacion</td>  
                               <td>ClaveUnidad</td>  
                               <td>Descripcion</td>  
                               <td>ValorUnitario</td>  
                               <td>Moneda</td> 
                               <td>Descuento</td>
                               <td>fecha de captura</td>
                               <td>IVA</td> 
                               <td>IEPS</td> 
                               <td>ISR</td>
                               <td>IVA</td> 
                               <td>IEPS</td> 
                               
                      </tr>
                    <?php
                       foreach($conceptos as $datos)
                                  {echo
                                    "<tr>".
                                    "<td>".$datos->ClaveProdServ."</td>".
                                    "<td>".$datos->NoIdentificacion."</td>".
                                    "<td>".$datos->ClaveUnidad."</td>".
                                    "<td>".$datos->Descripcion."</td>".
                                    "<td>".$datos->ValorUnitario."</td>".
                                    "<td>".$datos->Moneda."</td>".
                                    "<td>".$datos->Descuento."</td>".
                                    "<td>".$datos->fecha_captura."</td>".
                                    "<td>".$datos->Impuesto_trans_Iva."</td>".
                                    "<td>".$datos->Impuesto_trans_Ieps."</td>".
                                    "<td>".$datos->Impuesto_ret_Isr."</td>".
                                    "<td>".$datos->Impuesto_ret_iva."</td>".
                                    "<td>".$datos->Impuesto_ret_Ieps."</td>".
                                    
                                   "<td><a href='edit_concepto/".$datos->ClaveProdServ."'><span class='glyphicon glyphicon-edit'></span>Modificar</a></td>".
                                   "<td><a href='eliminarConcepto/".$datos->ClaveProdServ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a></td>".
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
                            <a href="<?php echo base_url(); ?>catalogos/documento/conceptos/pdf"><button type="button" class="btn btn-theme04"><i class="fa fa-file-pdf-o"></i> IMPRIMIR EN PDF</button></a>
                          </center>
                        </td>
                        
                        
                        <td>
                          <center>
                            <a href="<?php echo base_url(); ?>catalogos/submit_add_concepto"><button type="button" class="btn btn-warning"><span class='glyphicon glyphicon-plus'></span> <b>AGREGAR ELEMENTO</b></button></a>                   
                           </center>
                        </td>
                      </tr>
                    </table>
                  </div>
</form>