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
    <li role="presentation" class="active"><a href="http://localhost/factuwin8/configuracion"><i class="fa fa-lock"> CONCEDER PRIVILEGIOS</i></a></li>
    <li role="presentation" class=""><a href="http://localhost/factuwin8/"><i class="fa fa-eye"> MONITOREO DE USUARIO</i></a></li>
    <li role="presentation" class=""><a href="http://localhost/factuwin8/configuracion"><i class="fa fa-bar-chart-o"> GRAFICAS</i></a></li>
    </ul>              
            <div class="showback">
               <div style="
                      background: #E8E6E6;
                      width: 100%;
                      height: 500px;
                      overflow: scroll;" > 
              <table border="1">
                <tr>
                  <td>Folio del usuario</td>
                  <td>Puesto</td>
                  <td>Nombre de usuario</td>
                  <td>Nivel de Acceso</td>
                  <td>Accion</td>
                </tr>

                <?php
                //print_r($usuarios);
                  foreach($usuarios as $datos){

                    echo "<tr>";
                    echo '
                    <td>'.$datos->Usufolio.'</td>
                    <td>'.$datos->Usulogin.'</td>
                    <td>'.$datos->Usunombre.'</td>
                    <td>'.$datos->Usuacceso.'</td>
                    <td><a href="'.base_url().'configuracion/Privilegios_un_usuario/'.$datos->Usuclave.'"><input type="button" name="" value="privilegios"></a></td>';
                    echo "</tr>";
                  
                  }
                  ?>
              </table>
              
              
            </div>
            </div>             
            </div>
            </div>
    </div>
  </form>

  </section>
</section>