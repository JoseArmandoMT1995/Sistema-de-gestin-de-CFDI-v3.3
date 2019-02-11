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
               
               <form class="form-horizontal style-form" method="post" action="http://localhost/factuwin8/Informacion_General/update_usuario/1">
   <h3><i class="fa fa-lock"> Modificar privilegios del usuario: <?php echo $usuario['Usunombre'];?> (<?php echo $usuario['Usulogin'];?>).</i> </h3>             
   <div class="panel-group" id="accordion">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#informacion">ESTATUS DE SUS PRIVILEGIOS</a>
        </h4>
      </div>
      <div id="informacion" class="panel-collapse collapse">
        <div class="panel-body">
          <form>    
            <table border="1"> 
              <tr>  
                <td>NUM</td>
                <td>FOLIO</td>
                <td>PUESTO</td>
                <td>NIVEL DE ACCESO</td>
                <td>NOMBRE DE USUARIO</td>
                <td>NOMBRE DEL MODULO</td>
                <td>DEFINICION DEL MODULO</td>
                <td>PERMISO PARA VER</td>
                <td>PERMISO PARA INSERTAR</td>
                <td>PERMISO PARA MODIFICAR</td>
                <td>PERMISO PARA ELIMINAR</td>
              </tr>
              <?php    
              //print_r($privilegios_usuario);
              for ($fila=0; $fila <count($privilegios_usuario) ; $fila++) {
              $numero= $fila+1;
                  echo "<tr>";
                  echo "<td>$numero</td>";
                  //datos del usuario
                  echo "<td>".$privilegios_usuario[$fila]['Usufolio']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['Usulogin']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['Usuacceso']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['Usunombre']."</td>";

                  //privilegios
                  echo "<td>".$privilegios_usuario[$fila]['nombre_modulo_acceso']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['definicion']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['acceso']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['agregar_contenido']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['modificar_contenido']."</td>";
                  echo "<td>".$privilegios_usuario[$fila]['eliminar_contenido']."</td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsex">GENERAR CFDI</a>
        </h4>
      </div>
      <div id="collapsex" class="panel-collapse collapse">
        <div class="panel-body">
          
          <form action="<?=base_url()?>configuracion/editar_privilegios/GENERAR_CFDI/<?php echo $usuario['Usuclave']?>" method="post">
            <table border="1">
            <tr>
              <td>puede ver contenido</td>
              <td>puede agregar contenido</td>
              
            </tr>
            <tr>
            <td><center><input type="checkbox"   name="ver" id="ver" value="si"></center></td>
            <td><center><input type="checkbox" name="agregar" id="agregar" value="si"></center></td>
            
            </tr>
          </table>
          <br/>  
          <center> <input type="submit" name="" value="modificar privilegios de este modulo"> </center>
          </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">INFORMACION GENERAL</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
           <form action="<?=base_url()?>configuracion/editar_privilegios/INFORMACION_GENERAL/<?php echo $usuario['Usuclave']?>" method="post">
            <table border="1">
            <tr>
              <td>puede ver contenido</td>
              <td>puede editar contenido</td>
            </tr>
            <tr>
            <td><center><input type="checkbox"   name="ver" id="ver" value="si"></center></td>
            <td><center><input type="checkbox" name="editar" id="editar" value="si"></center></td>
            
            </tr>
          </table>
          <br>  
          <center> <input type="submit" name="" value="modificar privilegios de este modulo"> </center>
          </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">CATALOGOS</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <form action="<?=base_url()?>configuracion/editar_privilegios/CATALOGOS/<?php echo $usuario['Usuclave']?>" method="post">
            <table border="1">
            <tr>
              <td>puede ver contenido</td>
              <td>puede agregar contenido</td>
              <td>puede editar contenido</td>
              <td>puede eliminar contenido</td>
            </tr>
            <tr>
            <td><center><input type="checkbox"   name="ver" id="ver" value="si"></center></td>
            <td><center><input type="checkbox" name="agregar" id="agregar" value="si"></center></td>
            <td><center><input type="checkbox" name="editar" id="editar" value="si"></center></td>
            <td><center><input type="checkbox" name="eliminar" id="eliminar" value="si"></center></td>
            </tr>
          </table>
          <br>  
          <center> <input type="submit" name="" value="modificar privilegios de este modulo"> </center>
          </form>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">CONCEPTOS</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          <form action="<?=base_url()?>configuracion/editar_privilegios/CONCEPTOS/<?php echo $usuario['Usuclave']?>" method="post">
            <table border="1">
            <tr>
              <td>puede ver contenido</td>
              <td>puede agregar contenido</td>
              <td>puede editar contenido</td>
              <td>puede eliminar contenido</td>
            </tr>
            <tr>
            <td><center><input type="checkbox"   name="ver" id="ver" value="si"></center></td>
            <td><center><input type="checkbox" name="agregar" id="agregar" value="si"></center></td>
            <td><center><input type="checkbox" name="editar" id="editar" value="si"></center></td>
            <td><center><input type="checkbox" name="eliminar" id="eliminar" value="si"></center></td>
            </tr>
          </table>
          <br>  
          <center> <input type="submit" name="" value="modificar privilegios de este modulo"> </center>
          </form>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">COMPROBANTES</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
          <form action="<?=base_url()?>configuracion/editar_privilegios/COMPROBANTES/<?php echo $usuario['Usuclave']?>" method="post">
            <table border="1">
            <tr>
              <td>puede ver contenido</td>
              <td>puede agregar contenido</td>
              <td>puede editar contenido</td>
              <td>puede eliminar contenido</td>
            </tr>
            <tr>
            <td><center><input type="checkbox"   name="ver" id="ver" value="si"></center></td>
            <td><center><input type="checkbox" name="agregar" id="agregar" value="si"></center></td>
            <td><center><input type="checkbox" name="editar" id="editar" value="si"></center></td>
            <td><center><input type="checkbox" name="eliminar" id="eliminar" value="si"></center></td>
            </tr>
          </table>
          <br>  
          <center> <input type="submit" name="" value="modificar privilegios de este modulo"> </center>
          </form>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">AYUDA</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
          <form action="<?=base_url()?>configuracion/editar_privilegios/AYUDA/<?php echo $usuario['Usuclave']?>" method="post">
            <table border="1">
            <tr>
              <td>puede ver contenido</td>
              
            </tr>
            <tr>
            <td><center><input type="checkbox"   name="ver" id="ver" value="si"></center></td>
           
            </tr>
          </table>
          <br>  
          <center> <input type="submit" name="" value="modificar privilegios de este modulo"> </center>
          </form>
        </div>
      </div>
    </div>
  </div> 
                                                                     
                          
                 </form>
              </div>              
            </div>
            </div>
    </div>
  </form>

  </section>
</section>