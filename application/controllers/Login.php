<?php
class Login extends CI_Controller {
public function __construct(){
			parent::__construct();
				$this->load->helper('url');
				$this->load->model('Login_Modelo');
				$this->load->model('Generico_Modelo');
				$this->load->library('session');
}
public function index(){
$this->load->view("pagina/login/login.php");
//manda al formulario login
}
function login_user(){
	$usuario=array(
		'usuario'=> $this->input->post('Usunombre'),
		'password'=>$this->input->post('contraseña'));
	//recive un arreglo asociativo dos elementos
	$espacio="<br>";
	$campos_elegidos="*";
	$tabla="usuario";
	$primer_identificador="Usunombre";
	$valor_p_identificador=$usuario['usuario'];
	$segundo_identificador="contraseña";
	$valor_s_identificador=$usuario['password'];

		$data=$this->Login_Modelo->login_user(
			$campos_elegidos,
			$tabla,
			$primer_identificador,
			$valor_p_identificador,
			$segundo_identificador,
			$valor_s_identificador
			);
		print_r($data);
		//manda las variables al metodo en el modelo "Login_Modelo"
			if($data)
			{
				$this->session->set_userdata('Usuclave'     ,$data['Usuclave']);
				$this->session->set_userdata('Usufolio'     ,$data['Usufolio']);
				$this->session->set_userdata('Usulogin'     ,$data['Usulogin']);
				$this->session->set_userdata('Usunombre'    ,$data['Usunombre']);    
				$this->session->set_userdata('Usuacceso'    ,$data['Usuacceso']);       
				//agregar las variables a sesion
				echo "ya quedo la papada";
				$espacio;
				echo $espacio;
				echo $this->session->userdata('Usuclave');
				echo $espacio;
				echo $this->session->userdata('Usulogin');
				echo $espacio;
				echo $this->session->userdata('Usunombre');

			}
			else{
				echo "no paso la papada";
				$this->session->set_flashdata('error_msg', 'Se produjo un error. Inténtalo de nuevo.');       
				//redirect('login');
			}
}
public function ajax_olvide_mi_paasword(){
		if ($this->input->is_ajax_request()) {

			$oc_nombre= $this->input->post("nombre_usu");
			$oc_folio = $this->input->post("folio_usu");
			$oc_email = $this->input->post("email_usu");
			//****************************************
			$campos_elegidos="*";
			$tabla="usuario";
			$primer_identificador="Usunombre";
			$valor_p_identificador=$oc_nombre; 
			$segundo_identificador="Usufolio";   
			$valor_s_identificador=$oc_folio;
			$data=$this->Login_Modelo->login_user(
			$campos_elegidos,
			$tabla,
			$primer_identificador,
			$valor_p_identificador,
			$segundo_identificador,
			$valor_s_identificador
			);
			echo json_encode($data);
		}
		else
		{
			show_404();
		}
	}
public function ajax_envio_contraseña_email(){
	if ($this->input->is_ajax_request()) {
		$oc_nombre= $this->input->post("nombre_usu");
		$contraseña= $this->input->post("folio_usu");
		$oc_email = $this->input->post("email_usu");
		// El mensaje
		$mensaje = "Hola $oc_nombre 1\r\nSu contraseña es: 2\r\n$contraseña";

		// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
		$mensaje = wordwrap($mensaje, 70, "\r\n");

		// Enviarlo
		mail('armando.moreno.tolentino@gmail.com', 'envio de contraseña', $mensaje);
	}
	
}
	public function ajax_ingresar(){
			if ($this->input->is_ajax_request()) {
				$campos_elegidos="*";
				$tabla="usuario";
				$primer_identificador="Usunombre";
				$valor_p_identificador=$this->input->post("nombre");
				$segundo_identificador="contraseña";
				$valor_s_identificador=$this->input->post("contraseña");

				$data=$this->Login_Modelo->login_user(
				$campos_elegidos,
				$tabla,
				$primer_identificador,
				$valor_p_identificador,
				$segundo_identificador,
				$valor_s_identificador
				);
				echo json_encode($data);
			}
			else
			{
				show_404();
			}
	}


	public function guardar_variables_sesion($Usuclave,$Usulogin,$Usunombre,$Usufolio,$Usuacceso){

		$this->session->set_userdata('Usuclave'     ,$Usuclave);
		$this->session->set_userdata('Usulogin'     ,$Usulogin);
		$this->session->set_userdata('Usunombre'    ,$Usunombre);
		$this->session->set_userdata('Usufolio'     ,$Usufolio);
		$this->session->set_userdata('Usuacceso'    ,$Usuacceso);
		$espacio="<br>";
				echo $this->session->userdata('Usuclave');
				echo $espacio;
				echo $this->session->userdata('Usulogin');
				echo $espacio;
				echo $this->session->userdata('Usunombre');
				redirect('inicio/inicio_con_session');

	}
	public function user_logout(){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
?>
