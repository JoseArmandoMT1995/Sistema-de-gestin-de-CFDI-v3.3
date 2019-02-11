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
                    $this->load->view('complementos/nav/desactiva/inicio');
                    ?>
                  </li>
                  <li class="sub-menu">
                    <?php
                      $this->load->view('complementos/nav/activa/configuracion');
                                         
                    ?>
                  </li>

                  <li class="sub-menu">
                    <?php
                    $this->load->view('complementos/nav/desactiva/datos_genetrales');
                    ?>
                  </li>
                  <li class="sub-menu">
                    <?php
                    $this->load->view('complementos/nav/desactiva/catalogos');
                    ?>
                  </li>
                  
                  <li class="sub-menu">
                    <?php
                    $this->load->view('complementos/nav/desactiva/conceptos');
                    ?>
                  </li>
                  <li class="sub-menu">
                    <?php
                    $this->load->view('complementos/nav/desactiva/comprobante');
                    ?>
                  </li>
                  <!--<li class="sub-menu">
                    <?php
                    //$this->load->view('complementos/nav/desactiva/ayuda');
                    ?>
                  </li>-->

                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>