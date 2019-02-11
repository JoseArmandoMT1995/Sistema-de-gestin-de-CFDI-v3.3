<section id="main-content">
  <section class="wrapper site-min-height"> 
  <h1><i class="fa fa-gears"></i> CONFIGURACINES</h1>
  <form method="POST" action="<?=base_url()?>inicio/factura" class="" id="">
    <div class="container">
    
    <div class="panel-group" id="accordion">
      <!--emisor-->
    <div class="row mt">
              <div class="col-lg-11">
              <ul class="nav nav-tabs">
    <li role="presentation" class=""><a href="http://localhost/factuwin8/configuracion"><i class="fa fa-lock"> CONCEDER PRIVILEGIOS</i></a></li>
    <li role="presentation" class="active"><a href="http://localhost/factuwin8/"><i class="fa fa-eye"> MONITOREO DE USUARIO</i></a></li>
    <li role="presentation" class=""><a href="http://localhost/factuwin8/configuracion"><i class="fa fa-bar-chart-o"> GRAFICAS</i></a></li>
    
              </ul>              
              <div class="showback">
                <h4><i class="fa fa-angle-right"></i>Monitoreo(Super Administrador)</h4>
               <form class="form-horizontal style-form" method="post" action="http://localhost/factuwin8/Informacion_General/update_usuario/1">
                <label>Buscar</label>
                <input type="text" name=""><br>
                
               <div style="
                      background: #E8E6E6;
                      width: 100%;
                      height: 500px;
                      overflow: scroll;" >           
                <table border="1">
                  <tr>
                    <td>Dia de ingreso</td>
                    <td>Mes de ingreso</td>
                    <td>Año de ingreso</td>
                    <td>Hora de ingreso</td>
                    <td>Tipo de Usuario</td>
                    <td>Nombre de Usuario</td>
                    <td>Nivel de Acceos</td>
                    <td>Se encuentra en</td>
                    <td>Actividad</td>

                  </tr>
                  <?php
                  foreach($usuarios as $datos){
                    echo "<tr>";
                    echo '
                    <td>'.$datos['Dia'].'</td>
                    <td>'.$datos['Mes'].'</td>
                    <td>'.$datos['Año'].'</td>
                    <td>'.$datos['Hora'].'</td>
                    <td>'.$datos['Usulogin'].'</td>
                    <td>'.$datos['Usunombre'].'</td>
                    <td>'.$datos['Usuacceso'].'</td>
                    <td>'.$datos['Direccion'].'</td>
                    <td>'.$datos['Actividad'].'</td>';
                    echo "</tr>";
                  
                  }
                  ?>
                </table>
              </div>                                                       
                          
                 </form>
              </div>              
            </div>
            </div>
    </div>
  </form>

  </section>
</section>