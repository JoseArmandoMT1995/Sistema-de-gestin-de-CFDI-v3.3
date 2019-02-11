<aside>
          <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a  href="<?=base_url()?>Informacion_General"><img src="<?=base_url()?>usuarios/fotos_perfil/<?php echo $foto_perfil?>" class="img-circle" width="60" height="60"></a></p>
                  <h5 class="centered">
                    <?php
                    $this->load->view('complementos/nav/nombre_usuario');
                    ?>
                    </h5>
                    <!--menu-->
                  <li class="mt">
                    <?php
                      $acceso=$privilegios['inicio_v']; 
                      if ($acceso=='si') {
                        $this->load->view('complementos/nav/desactiva/inicio');
                      }
                      else
                      {
                        $this->load->view('pagina/sin_privilegios');
                      }
                    ?>
                  </li>
                  <li class="sub-menu">
                    <?php
                      $ss=$this->session->userdata('Usuacceso');
                      $acceso=$privilegios['configuracion_v']; 
                      if ($acceso=='si') {
                      $this->load->view('complementos/nav/desactiva/configuracion');
                      }
                      else
                      {
                        //$this->load->view('pagina/sin_privilegios');
                      }                 
                    ?>
                  </li>

                  <li class="sub-menu">
                    <?php
                      $acceso=$privilegios['perfil_v']; 
                      if ($acceso=='si') {
                      $this->load->view('complementos/nav/activa/datos_genetrales');
                      }
                      else
                      {
                      //$this->load->view('pagina/sin_privilegios');
                      }                      
                    ?>
                  </li>
                  <li class="sub-menu">
                      <?php
                      $acceso=$privilegios['catalogos_v']; 
                      if ($acceso=='si' ) {
                      $this->load->view('complementos/nav/desactiva/catalogos');
                      }
                      else
                      {
                      //$this->load->view('pagina/sin_privilegios');
                      }
                    ?>
                  </li>
                  
                  <li class="sub-menu">
                    <?php
                      $acceso=$privilegios['conceptos_v']; 
                      if ($acceso=='si') {
                      $this->load->view('complementos/nav/desactiva/conceptos');
                      }
                      else
                      {
                      //$this->load->view('pagina/sin_privilegios');
                      }
                    ?>
                  </li>
                  <li class="sub-menu">
                    <?php
                      $acceso=$privilegios['comprobantes_v']; 
                      if ($acceso=='si') {
                      $this->load->view('complementos/nav/desactiva/comprobante');
                      }
                      else
                      {
                      //$this->load->view('pagina/sin_privilegios');
                      }
                    ?>
                  </li>
                  <li class="sub-menu">
                    <?php
                    $acceso=$privilegios['ayuda_v']; 
                    if ($acceso=='sio') {
                    $this->load->view('complementos/nav/desactiva/ayuda');
                    }
                      else
                      {
                      //$this->load->view('pagina/sin_privilegios');
                      }
                    
                    ?>
                  </li>

                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>