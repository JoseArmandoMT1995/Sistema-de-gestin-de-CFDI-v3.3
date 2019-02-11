  
    <!--configuracion-->
  <a href="javascript:;" >
    <i class="fa fa-gears"></i>
    <span>Configuraciones(Admin)</span>
    </a>
    <ul class="sub">
    <li>
      <a  href="<?=base_url()?>Configuracion/Privilegios_sa_usuarios/<?php echo $this->session->userdata('Usuclave')?>"><i class="fa fa-lock"> Otorgar Privilegios</i></a>
      </li>
    <li>
      <a  href="<?=base_url()?>Configuracion/Monitoreo_usuario_sa/<?php echo $this->session->userdata('Usuclave')?>"><i class="fa fa-eye"> Monitoreo de Usuario</i></a>
      </li>
      <li>
      <a  href="<?=base_url()?>Configuracion/generar_nuevo_administrador"><i class="fa fa-child"> Crear Administrador</i></a>
      </li>
    <!--<li>
      <a  href="<?=base_url()?>Configuracion/graficos_todos_los_usuarios_existentes"><i class="fa fa-bar-chart-o"> Estadisticas</i></a>
      </li>-->
  </ul>
  