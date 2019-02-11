<div class="showback" >
  <h4><i class="fa fa-angle-right"></i>AGREGAR USUARIO</h4>
      <section>                 
        <div align="center">
          <div class="container">
            
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">ADMINISTRADOR</a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div class="panel-body">
                    <?php
                      $this->load->view('complementos/formularios/catalogos/usuario/submit_add_administrador_sa');
                    ?>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">USUARIO  ESTANDAR</a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">

                    <?php
                      $this->load->view('complementos/formularios/catalogos/usuario/submit_add_estandar_sa');
                    ?>
                  
                  </div>
                </div>
              </div>
            </div> 
          </div>
            
        </div>
      </div>
      </section>
    </div>
  </div>
</div>