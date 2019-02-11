<?php
class Informacion_General extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Informacion_General_modelo');
    $this->load->model('Generico_Modelo');
    $this->load->library('session');
	}
/************************************************************************************************/
//Mi perfil
/************************************************************************************************/
	public function index()
  {
   	$id=$this->session->userdata('Usuclave');
    $foto_perfil=$this->Generico_Modelo->imagen_perfil();
   	if (!$id==null) 
    {
   	  $mi_perfil =$this->Informacion_General_modelo->selecciona_un_registro(
        '*','usuario','Usuclave',$id);
      $usuario=$this->session->userdata('Usuclave');
      $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
      $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Informacion General/Mi Perfil','Esta viendo su perfil de usurio');
   	  $this->load->view("pagina/Informacion_General/Mi_perfil", compact("mi_perfil","foto_perfil","privilegios"));
   	}
   	else
    {
   		echo "no paso la papada x2";
   		$this->session->sess_destroy();
		  redirect('login');
   	}
 	}
/************************************************************************************************/
//Editar mi perfil
/************************************************************************************************/
  public function Editar_perfil($id =null)
	{
		$valor_campo_a=$this->session->userdata('Usuclave');
    $privilegios=$this->Generico_Modelo->privilegios_de_usuario($valor_campo_a);
    $foto_perfil=$this->Generico_Modelo->imagen_perfil();
    $usuario=$this->session->userdata('Usuclave');
    $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
    //print_r($privilegios);
    if ($privilegios['perfil_m']=='si') 
    {
      /*muestra tosos los datos a modificar*/
      if (!$id == null)
      {
        $usuario_editado = $this->Informacion_General_modelo->selecciona_un_registro('*','usuario','Usuclave',$valor_campo_a);
        //print_r($mi_perfil);
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Informacion General/Editar su Perfil','Quiere editar su perfil');
        $this->load->view("pagina/Informacion_General/Editar_mi_perfil", compact("usuario_editado","foto_perfil","privilegios"));
      }
      else
      {
        $this->session->sess_destroy();
        redirect('login');
      }
		}
    else
    {
      echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
      echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
      echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
    }
	}

/************************************************************************************************/
//Modificar mi perfil
/************************************************************************************************/
  public function update_usuario($id = null,$caso)
  {
    if($this->input->post())
    {
      if ($caso=="A") 
      {
        $yo=$id;
      }
      if($caso=="B")
      {
        $yo=$this->session->userdata('Usuclave');
      }

      $privilegios=$this->Generico_Modelo->privilegios_de_usuario($yo);
      
      if ($privilegios['perfil_m']=='si') 
      {
        if ($_POST['nombre_usu'] == "" && $_POST['contraseña_usu'] == "")
        {
          $this->mensje_error("no ingreso los datos de confirmacion PINCHE MENSO");
        }
        else
        {   
          $usuario=array(
          'usuario'=> $this->input->post('nombre_usu'),
          'password'=>$this->input->post('contraseña_usu'));
            //recive un arreglo asociativo dos elementos
            
          $data1=$this->Informacion_General_modelo->selecciona_un_registro("*",'usuario',"Usuclave",$id);

          //print_r($data1);
          if($data1['Usunombre']==$usuario['usuario'] && $data1['contraseña']==$usuario['password'])
          {
            $nombre_de_usuario=$_POST['Usunombre'];
            $contraseña_de_usuario=$_POST['contraseña'];
            $redundante=$this->Informacion_General_modelo->nombres_redundantes_editar_usuario(
            "*","usuario","Usuclave <>",$id,"Usunombre",$nombre_de_usuario);
            if (is_array($redundante)) {
            $this->mensje_error("lo semtimos el nombre de usuario que escogio ya existe en otra cuenta!");
            }
            else
            {
              $this->load->library("upload");
              $config = array(
              "upload_path" => "./usuarios/fotos_perfil",
              'allowed_types' => "jpg|png"
              );
              $variablefile= $_FILES;
              $info = array();
              $files = count($_FILES['Usufoto']['name']);
              //print_r($files);
              for ($i=0; $i < $files; $i++) 
              { 
                $_FILES['Usufoto']['name'] = $variablefile['Usufoto']['name'][$i];
                $_FILES['Usufoto']['type'] = $variablefile['Usufoto']['type'][$i];
                $_FILES['Usufoto']['tmp_name'] = $variablefile['Usufoto']['tmp_name'][$i];
                $_FILES['Usufoto']['error'] = $variablefile['Usufoto']['error'][$i];
                $_FILES['Usufoto']['size'] = $variablefile['Usufoto']['size'][$i];
                  
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Usufoto')) 
                {
                  $data = array("upload_data" => $this->upload->data());
                  $datos = array(
                  "Usuclave"=>$data1['Usuclave'],
                  "Usufolio"=>$data1['Usufolio'],
                  "Usulogin"=>$data1['Usulogin'],
                  "Usunombre"=>$nombre_de_usuario,
                  "Usuacceso"=>$data1['Usuacceso'],
                  "contraseña"=>$contraseña_de_usuario,
                  "Foto_Perfil" => $data['upload_data']['file_name'],
                  );        
                  $this->Generico_Modelo->editar_un_registro("Usuclave",$id,"usuario",$datos);
                  $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Informacion General/Editar su Perfil','Ha editado su informacion de perfil');
                      //echo "Registro guardado";
                  $info[$i] = array
                    (
                      "Usufoto" => $data['upload_data']['file_name'],
                      "mensaje" => "Archivo subido y guardado"
                    );
                  $mensaje="exito";

                   
                  if ($caso=="A") 
                  {
                    $this->index(); 
                  }
                  if($caso=="B")
                  {
                    header("Location:".base_url()."catalogos/index_usuarios");
                  }
                }
                else
                {
                //echo $this->upload->display_errors();
                $info[$i] = array
                  (
                    "Usufoto" => $_FILES['Usufoto']['name'],
                    "mensaje" => "Archivo no subido ni guardado"
                  );
                }
              }
            }
          }
          else
          {
            $this->mensje_error("parece que el nombre del usurio o la contraseña estan mal");
          }
        }
      } 
      else
      {
        echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
        echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
        echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
      }
    }
  }  
/************************************************************************************************/
//Mensje de error
/************************************************************************************************/
public function mensje_error($msj)
  {
    echo "<h1>$msj</h1>";
  }
}
?>