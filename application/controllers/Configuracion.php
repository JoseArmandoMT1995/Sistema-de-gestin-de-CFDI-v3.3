<?php
class Configuracion extends CI_Controller {
public function __construct(){
			parent::__construct();
				$this->load->helper('url');
				$this->load->model('Configuracion_Modelo');
				$this->load->model('Generico_Modelo');
                $this->load->library("upload");
				$this->load->library('session');
}
	public function Monitoreo_usuario_sa(){
	$usuario	=$this->session->userdata('Usuclave');
	$foto_perfil=$this->Generico_Modelo->imagen_perfil();

	$usuarios = $this->Configuracion_Modelo->mostrar_dos_tablas_completas(
		"*","monitoreo_usuario","usuario","id_usuario","Usuclave");
	//print_r($usuarios);
	$this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Configuracion/Monitoreo de usurio','Esta viendo la actividad de todos los usuarios');
	$this->load->view("pagina/configuracion/Monitoreo_usuario_sa", compact("usuarios","foto_perfil"));

	}
	public function error_mensaje(){
		echo "el usuario ya esta registrado con el mismo nombre";
	}
	public function Privilegios_sa_usuarios(){
		$sa=$this->session->userdata('Usuacceso');
		$usuario=$this->session->userdata('Usuclave');

		$foto_perfil=$this->Generico_Modelo->imagen_perfil();

        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
        if ($privilegios['configuracion_a']=='si' && $sa="AA") {
		$usuario=$this->session->userdata('Usuclave');
		 $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','configuraciones/monitoreo_usuario','esta viendo a los usuarios');
		$usuarios=$this->Generico_Modelo->resiveTodaLaTablaMenosUnRegistro("usuario","Usuclave",$usuario);
		$this->load->view("pagina/configuracion/Privilegios_sa_usuarios", compact("usuarios","foto_perfil"));
		}
		elseif ($privilegios['inicio_a']=='si' && $sa="AB") {

			echo "<h1>pendiente falta que agrege el administrador sus usuarios por medio de su folio </h1>";
		}
		else{
			echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
            echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
            echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
		}
	}
	public function Privilegios_un_usuario($id){
		$usuario=$this->session->userdata('Usuclave');
		$foto_perfil=$this->Generico_Modelo->imagen_perfil();
		$this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','configuraciones/monitoreo_usuario/otorgar privilegios','quiere otorgar privilegios a un usuario');
		$privilegios_usuario=$this->Configuracion_Modelo->seleccionar_dos_tablas(
		"*","privilegio_usuario","usuario","id_usuario","Usuclave",
		"Usuclave",
		$id);
		$usuario=$this->Configuracion_Modelo->selecciona_un_registro(
			"*","usuario","Usuclave",$id);
		//print_r($privilegios_usuario);
		$this->load->view("pagina/configuracion/Privilegios_sa", compact("privilegios_usuario","usuario","foto_perfil"));
	}
	public function editar_privilegios($modulo,$id_usuario){
	$this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','configuraciones/monitoreo_usuario/otorgar privilegios','ha otorgado privilegios a un usuario');

	if (!isset($_POST['ver'])) {
		$ver="no";
		//echo "nada";
	}
	if (!isset($_POST['agregar'])) {
		$agregar="no";
		//echo "nada";
	}
	if (!isset($_POST['editar'])) {
		$editar="no";
		//echo "nada";
	}
	if (!isset($_POST['eliminar'])) {
		$eliminar="no";
		//echo "nada";
	}
	if (isset($_POST['ver'])) {
		$ver=$_POST['ver'];
		//echo "ok1";
	}
	if (isset($_POST['agregar'])) {
		$agregar=$_POST['agregar'];
		//echo "ok2";
	}
	if (isset($_POST['editar'])) {
		$editar=$_POST['editar'];
		//echo "ok3";
	}
	if (isset($_POST['eliminar'])) {
		$eliminar=$_POST['eliminar'];
		//echo "ok3";
	}
	
	$valores = array(
		'acceso' => $ver,
		'agregar_contenido' => $agregar,
		'modificar_contenido' =>$editar,
		'eliminar_contenido' => $eliminar);
	//print_r($valores);
	$this->Configuracion_Modelo->editar_un_registro_dos_condicionales(
	'nombre_modulo_acceso',$modulo,'id_usuario',$id_usuario,'privilegio_usuario',$valores);
	$this->Privilegios_un_usuario($id_usuario);
	}
	public function generar_nuevo_administrador(){
		$usuario=$this->session->userdata('Usuclave');
		$foto_perfil=$this->Generico_Modelo->imagen_perfil();
		$this->load->view('pagina/configuracion/generar_nuevo_administrador',compact("foto_perfil"));
		
	}
	public function insertar_administrador(){
		
        $ultimo_id=$this->Configuracion_Modelo->ultimo_registro("Usuclave","usuario","Usuclave");
        $ultimo_folio=$this->Configuracion_Modelo->ultimo_registro("Usufolio","usuario","Usufolio");

        $Usunombre=$_POST['Usunombre'];
		$contraseña=$_POST['contraseña'];
        $Usulogin="administrador";
        $Usuacceso="AB";
        $Usuclave=$ultimo_id['Usuclave']+1;
        $Usufolio=$ultimo_folio['Usufolio']+1;


        
        $this->load->library("upload");
        $config = array(
            "upload_path" => "./usuarios/fotos_perfil",
            'allowed_types' => "jpg|png"
        );
        $variablefile= $_FILES;
        $info = array();
        $files = count($_FILES['archivo']['name']);
        for ($i=0; $i < $files; $i++) { 
            $_FILES['archivo']['name'] = $variablefile['archivo']['name'][$i];
            $_FILES['archivo']['type'] = $variablefile['archivo']['type'][$i];
            $_FILES['archivo']['tmp_name'] = $variablefile['archivo']['tmp_name'][$i];
            $_FILES['archivo']['error'] = $variablefile['archivo']['error'][$i];
            $_FILES['archivo']['size'] = $variablefile['archivo']['size'][$i];
            $this->upload->initialize($config);
            if ($this->upload->do_upload('archivo')) {
                $data = array("upload_data" => $this->upload->data());
                
                $datos = array(
        			"Usuclave"=>$Usuclave,
        			"Usufolio"=>$Usufolio,
        			"Usulogin"=>$Usulogin,
        			"Usunombre"=>$Usunombre,
        			"Usuacceso"=>$Usuacceso,
        			"contraseña"=>$contraseña,
            		"Foto_Perfil" => $data['upload_data']['file_name'],
        		);
                $redundante=$this->Configuracion_Modelo->nombres_redundantes("*","usuario","Usunombre",$datos['Usunombre']);

        		if ($datos['Usunombre']==$redundante['Usunombre']) {
        			$mensaje="error";
        		}
        		else
        		{
        			$this->Generico_Modelo->registrar_todo("usuario",$datos);
                	$this->Generico_Modelo->registros_privilegio_usuario($Usuclave,$Usuacceso);
                    //echo "Registro guardado";
                    $info[$i] = array(
                        "archivo" => $data['upload_data']['file_name'],
                        "mensaje" => "Archivo subido y guardado"
                    );
                    $mensaje="exito";
        		}
            }
            else{
                //echo $this->upload->display_errors();
                $info[$i] = array(
                        "archivo" => $_FILES['archivo']['name'],
                        "mensaje" => "Archivo no subido ni guardado"
                );
            }
        }
        $envio = "";
        foreach ($info as $key) {
            $envio .= "Archivo : ".$key['archivo']." - ".$key["mensaje"]."\n";
        }
        //echo $envio;
        if ($mensaje=="exito") {
        	header("Location:".base_url()."catalogos/index_usuarios");
        }else{
        	$this->error_mensaje();
        }        
    }
    public function insertar_usuario_estandar(){
		
        $ultimo_id=$this->Configuracion_Modelo->ultimo_registro("Usuclave","usuario","Usuclave");
        $ultimo_folio=$this->Configuracion_Modelo->ultimo_registro("Usufolio","usuario","Usufolio");

        $Usunombre=$_POST['Usunombre'];
		$contraseña=$_POST['contraseña'];
        $Usulogin="Estandar";
        $Usuacceso="E";
        $Usuclave=$ultimo_id['Usuclave']+1;
        if (isset($_POST['folio'])) {
            $Usufolio=$_POST['folio'];
        }
        else{
            $Usufolio=$this->session->userdata('Usufolio');
        }


        
        $this->load->library("upload");
        $config = array(
            "upload_path" => "./usuarios/fotos_perfil",
            'allowed_types' => "jpg|png"
        );
        $variablefile= $_FILES;
        $info = array();
        $files = count($_FILES['archivo']['name']);
        for ($i=0; $i < $files; $i++) { 
            $_FILES['archivo']['name'] = $variablefile['archivo']['name'][$i];
            $_FILES['archivo']['type'] = $variablefile['archivo']['type'][$i];
            $_FILES['archivo']['tmp_name'] = $variablefile['archivo']['tmp_name'][$i];
            $_FILES['archivo']['error'] = $variablefile['archivo']['error'][$i];
            $_FILES['archivo']['size'] = $variablefile['archivo']['size'][$i];
            $this->upload->initialize($config);
            if ($this->upload->do_upload('archivo')) {
                $data = array("upload_data" => $this->upload->data());
                
                $datos = array(
        			"Usuclave"=>$Usuclave,
        			"Usufolio"=>$Usufolio,
        			"Usulogin"=>$Usulogin,
        			"Usunombre"=>$Usunombre,
        			"Usuacceso"=>$Usuacceso,
        			"contraseña"=>$contraseña,
            		"Foto_Perfil" => $data['upload_data']['file_name'],
        		);
                $redundante=$this->Configuracion_Modelo->nombres_redundantes("*","usuario","Usunombre",$datos['Usunombre']);

        		if ($datos['Usunombre']==$redundante['Usunombre']) {
        			$mensaje="error";
        		}
        		else
        		{
        			$this->Generico_Modelo->registrar_todo("usuario",$datos);
                	$this->Generico_Modelo->registros_privilegio_usuario($Usuclave,"E");
                    //echo "Registro guardado";
                    $info[$i] = array(
                        "archivo" => $data['upload_data']['file_name'],
                        "mensaje" => "Archivo subido y guardado"
                    );
                    $mensaje="exito";
        		}
            }
            else{
                //echo $this->upload->display_errors();
                $info[$i] = array(
                        "archivo" => $_FILES['archivo']['name'],
                        "mensaje" => "Archivo no subido ni guardado"
                );
            }
        }
        $envio = "";
        foreach ($info as $key) {
            $envio .= "Archivo : ".$key['archivo']." - ".$key["mensaje"]."\n";
        }
        //echo $envio;
        if ($mensaje=="exito") {
        	header("Location:".base_url()."catalogos/index_usuarios");
        }else{
        	$this->error_mensaje();
        }        
    }
    public function graficos_todos_los_usuarios_existentes(){
    	$usuario=$this->session->userdata('Usuclave');
		$foto_perfil=$this->Generico_Modelo->imagen_perfil();
    	$this->load->view('pagina/configuracion/graficos/graficos_todos_los_usuarios_existentes',compact('foto_perfil'));
    }
}
?>
