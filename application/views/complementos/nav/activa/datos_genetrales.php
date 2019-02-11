  <!--configuracion-->
  <a class="active" href="javascript:;" >
    <i class="fa fa-user"></i>
    <span>Informacion General</span>
    </a>
    <ul class="sub">
    <li>
      <a  href="<?=base_url()?>Informacion_General"><i class="fa fa-user"> Mi Perfil</i></a>
      </li>
    <li>
      <a  href="<?=base_url()?>Informacion_General/Editar_perfil/<?php echo $this->session->userdata('Usuclave')?>"><i class="fa fa-cog"> Editar mi Perfil</i></a>
      </li>
  </ul>