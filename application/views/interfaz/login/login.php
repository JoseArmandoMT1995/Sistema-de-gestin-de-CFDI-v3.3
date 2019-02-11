
		      <form class="form-login" action="<?=base_url()?>Login/login_user" method="POST">
		      	<?php $this->load->view('complementos/titulos/login/login'); ?>
		        <?php $this->load->view('complementos/formularios/login/login'); ?>
		          <!-- Modal -->
		        <?php $this->load->view('complementos/formularios/login/ventana_modal/olvide_mi_password'); ?>
		        <?php $this->load->view('complementos/formularios/login/ventana_modal/registro'); ?>
		          <!-- modal -->
		      </form>	  	
	  	