
  <style>
    div.menu_horizontal {
      background-color: #eee;
      width: 1100px;
      height: 500px;
      border: 1px dotted black;
      overflow: auto;
    }
  </style>
  <section id="main-content">
    <section class="wrapper site-min-height">        
      <div class="row mt">
        <div class="col-lg-12">
          <div class="col-md-12">
            <?php
              echo '<div style="
                background: #E8E6E6;
                width: 100%;
                height: 290px;
                overflow: scroll;" >';
              echo "<table border='2'>";
              echo "<tr><td colspan='9'><h3>";
              $this->load->view('complementos/titulos/comprobante');
              echo "</h3></td></tr>";
              echo "<tr><td>NUM.</td><td >FECHA DE CAPTURA</td><td >RAZON SOCIAL DEL EMISOR</td><td >RAZON SOCIAL DEL RECEPTOR</td><td >USUARIO QUE LO CREO</td><td colspan='4' >ACCION</td></tr>";
              for ($fila=0; $fila <count($comprobante) ; $fila++) {
                $numero= $fila+1;
                echo "<tr>";
                echo "<td>$numero</td>";
                //echo "<td>".$comprobante[$fila]['Fecha']."</td>";
                echo "<td>".$comprobante[$fila]['Fecha']."</td>";
                echo "<td>".$comprobante[$fila]['Rason_social_emisor']."</td>";
                echo "<td>".$comprobante[$fila]['Rason_social_receptor']."</td>";
                echo "<td>".$comprobante[$fila]['Usunombre']."</td>";

                echo "<td><a href='generar_xml_nuevo/".$comprobante[$fila]['id_factura_encabezado']."'><button class='btn btn-success'><i class='fa fa-file-excel-o'> Generar cfdi</button></a></td></tr>";
              } 
              echo "</table></div>";?>        
          </div><!-- /col-md-12 -->
        </div>
      </div>
      <br>  
		</section>
  </section>