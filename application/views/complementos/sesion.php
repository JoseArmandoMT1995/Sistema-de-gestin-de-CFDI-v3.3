<?php
  $login=$this->session->userdata('Usuclave');
  if(!$login){
    //"la clave o el emal son incorrectas";
    redirect('login/user_logout');
  }
?>