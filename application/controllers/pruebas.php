<?php
class pruebas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Generico_Modelo');
		$this->load->library("upload");
		
		$this->load->library('session');
	}
	public function index(){
		$this->load->view("pruebas/mandar_doc");
	}
	
    public function insertar_administrador(){
        $config = array(
            "upload_path" => "./usuarios/pruebas",
            'allowed_types' => "*"
        );
        $variablefile= $_FILES;
        $info = array();
	 		
            $_FILES['archivo1']['name'] = 	 $variablefile['archivo1']['name'][0];
            $_FILES['archivo1']['type'] = 	 $variablefile['archivo1']['type'][0];
            $_FILES['archivo1']['tmp_name'] = $variablefile['archivo1']['tmp_name'][0];
            $_FILES['archivo1']['error'] = 	 $variablefile['archivo1']['error'][0];
            $_FILES['archivo1']['size'] = 	 $variablefile['archivo1']['size'][0];

            $_FILES['archivo2']['name'] = 	 $variablefile['archivo2']['name'][0];
            $_FILES['archivo2']['type'] = 	 $variablefile['archivo2']['type'][0];
            $_FILES['archivo2']['tmp_name'] = $variablefile['archivo2']['tmp_name'][0];
            $_FILES['archivo2']['error'] = 	 $variablefile['archivo2']['error'][0];
            $_FILES['archivo2']['size'] = 	 $variablefile['archivo2']['size'][0];
            print_r($_FILES['archivo2']);
            $this->upload->initialize($config);
            
            if ($_FILES['archivo2']['type'] != "application/octet-stream"
             && $_FILES['archivo1']['type'] != "application/x-x509-ca-cert") 
            {
            	echo "archivos incorecto";
            }
            else
            {
            	if (is_array($_FILES['archivo1']) 
            	 && is_array($_FILES['archivo2']))
            	{
            		$this->generar_archivo("archivo1");
            		$this->generar_archivo("archivo2");
	        	}
	        	else
	        	{
	          		echo "fracaso!";
	        	}
        	}              
    }
    public function generar_archivo($archivo){
    	
    	if ($this->upload->do_upload($archivo)) {
            $data = array("upload_data" => $this->upload->data());    
            $datos = array(
        	"si"=>"exito",        			
        	);
            if (!is_array($datos)) {
             	$mensaje="error";
            }
        	else
        	{
                //echo "Registro guardado";
                $info = array(
                    "archivo" => $data['upload_data']['file_name'],
                    "mensaje" => "Archivo subido y guardado"
                );
                //print_r($info);
                $mensaje=$info['mensaje'];
                echo "<br>$mensaje";
        	}
        }
        else
        {
            //echo $this->upload->display_errors();
            $info[$i] = array(
                "archivo" => $_FILES[$archivo]['name'],
                "mensaje" => "Archivo no subido ni guardado"
            );
        }
    }
    public function timbrado(){
        $this->load->view("interfaz/comprobantes/timbrado");
    }
}
?>
