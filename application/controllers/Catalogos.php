<?php
class Catalogos extends CI_Controller {
public function __construct(){
      parent::__construct();
    		$this->load->helper('url');
    		$this->load->model('Catalogos_Modelo');
            $this->load->model('Generico_Modelo');
            $this->load->library("upload");
      		$this->load->library('session');
	}
    public function index_conceptos(){
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $conceptos = $this->Catalogos_Modelo->resiveTodaLaTabla("conceptos");
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Conceptos','');
        $this->load->view("pagina/catalogos/index_conceptos", compact("conceptos","foto_perfil","privilegios"));
    }
	public function index_receptor(){
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $receptor = $this->Catalogos_Modelo->resiveTodaLaTabla("receptor");
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Receptores','');
        $this->load->view("pagina/catalogos/index_receptor", compact("receptor","foto_perfil","privilegios"));
    }
    public function index_emisor(){
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $emisor = $this->Catalogos_Modelo->resiveTodaLaTabla("emisor");
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Emisor','');
        $this->load->view("pagina/catalogos/index_emisores", compact("emisor","foto_perfil","privilegios"));
    }
    public function index_usuarios(){
        
        $folio=       $this->session->userdata('Usufolio');
        $usuario=     $this->session->userdata('Usuclave');
        $tipo_usuario=$this->session->userdata('Usuacceso');

        $privilegios= $this->Generico_Modelo->privilegios_de_usuario($usuario);
        $foto_perfil= $this->Generico_Modelo->imagen_perfil();

        if ($tipo_usuario=="AA"){
            
            $usuario=$this->Generico_Modelo->resiveTodaLaTablaMenosUnRegistro
            ("usuario","Usuclave",$usuario);
        }
        if ($tipo_usuario=="AB"){
            $usuario=$this->Generico_Modelo->resiveTodaLaTablaMenosUnRegistroUnaCondicion
            ("usuario","Usuclave",$usuario,"Usufolio",$folio);
        }
        if ($tipo_usuario=="E"){
            $usuario=$this->Generico_Modelo->resiveTodaLaTablaMenosUnRegistroDosCondicionales
            ("usuario","Usuclave",$usuario,"Usufolio",$folio,"Usuacceso","AA");
        }
        else{

        }
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Usuarios','');
        $this->load->view("pagina/catalogos/index_usuarios", compact("usuario","foto_perfil","privilegios"));
    }
    public function edit_concepto($id = null){
	if (!$id == null)
        {   $usuario=     $this->session->userdata('Usuclave');
            $privilegios= $this->Generico_Modelo->privilegios_de_usuario($usuario);
            $id = $this->db->escape((int)$id);
            $foto_perfil=$this->Generico_Modelo->imagen_perfil();
            $concepto_editado = $this->Catalogos_Modelo->selecciona_un_registro("*","conceptos","ClaveProdServ",$id);
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Conceptos/','Quiere editar un registro');
            $this->load->view("pagina/catalogos/edit_concepto", compact("concepto_editado","foto_perfil","privilegios"));
            //print_r($concepto_editado);
        }
        else
        {
            header("Location:".base_url()."catalogos/index_conceptos");
        }
	}
    public function edit_emisor($id = null){
    if (!$id == null)
        {   $foto_perfil=$this->Generico_Modelo->imagen_perfil();
            $id = $this->db->escape((int)$id);
            $usuario=     $this->session->userdata('Usuclave');
            $privilegios= $this->Generico_Modelo->privilegios_de_usuario($usuario);
            
            $receptores_editado = $this->Catalogos_Modelo->selecciona_un_registro("*","receptor","Id_receptor",$id);
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Receptores/','Quiere editar un registro');
            $this->load->view("pagina/catalogos/edit_emisor", compact("receptores_editado","foto_perfil","privilegios"));
            //print_r($concepto_editado);
        }
        else
        {
            header("Location:".base_url()."catalogos/index_receptor");
        }
    }
	public function edit_receptores($id = null){
	if (!$id == null)
        {   $foto_perfil=$this->Generico_Modelo->imagen_perfil();
            $id = $this->db->escape((int)$id);
            $usuario=     $this->session->userdata('Usuclave');
            $privilegios= $this->Generico_Modelo->privilegios_de_usuario($usuario);
            
            $receptores_editado = $this->Catalogos_Modelo->selecciona_un_registro("*","receptor","Id_receptor",$id);
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Receptores/','Quiere editar un registro');
            $this->load->view("pagina/catalogos/edit_receptores", compact("receptores_editado","foto_perfil","privilegios"));
            //print_r($concepto_editado);
        }
        else
        {
            header("Location:".base_url()."catalogos/index_receptor");
        }
	}

	public function edit_usuarios($id = null){
	if (!$id == null)
        {
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        //print_r($privilegios);
      if ($privilegios['catalogos_m']=='si') {

            $id = $this->db->escape((int)$id);
            //selecciona_un_registro("*","usuario","Usuclave",$id);
            $usuario_editado = $this->Catalogos_Modelo->
            selecciona_un_registro(
            '*',
            'usuario',
            'Usuclave',
            $id);
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Usuarios/','Quiere editar un registro');

            $this->load->view("pagina/catalogos/edit_usuarios", compact("usuario_editado","foto_perfil","privilegios"));
            }
            else{
                echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
                echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
                echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
            }
        }
        else
        {
            header("Location:".base_url()."catalogos/index_usuarios");
        }
	}
    public function update_concepto($id = null)
    {
        if($this->input->post())
        {
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
      if ($privilegios['catalogos_m']=='si') {
            $id=$id;  
            $concepto = array(
            'NoIdentificacion' =>  $_POST["NoIdentificacion"] ,
            'ClaveUnidad' =>       $_POST["ClaveUnidad"] ,
            'Descripcion' =>       $_POST["Descripcion"] ,
            'ValorUnitario' =>     $_POST["ValorUnitario"] ,
            'Moneda' =>            $_POST["Moneda"] ,
            'Impuesto_trans_Iva' =>      $_POST["Impuesto_Iva"] ,
            'Impuesto_ret_iva' =>   $_POST["Impuesto_IvaRet"] ,
            'Impuesto_trans_Ieps' =>     $_POST["Impuesto_Ieps"] ,
            'Impuesto_ret_Isr' =>      $_POST["Impuesto_Isr"]
            );
            //print_r($id);
            $this->Catalogos_Modelo->editar_un_registro("ClaveProdServ",$id,"conceptos",$concepto);
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Conceptos/','Edito un registro');
            header("Location:".base_url()."catalogos/index_conceptos");
            }
            else{
                echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
                echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
                echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
            }
        }
    }
    public function update_usuario($id = null)
    {
    if($this->input->post())
        {
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
            if ($privilegios['catalogos_m']=='si') {

                $id=$id;    
                $usuario = array(
                'Usufolio' =>		  	$_POST["Usufolio"],
                'Usulogin' =>       	$_POST["Usulogin"],
                'Usunombre' =>       	$_POST["Usunombre"],
                'Usuacceso' =>     		$_POST["Usuacceso"],
                'contraseña' =>         $_POST["contraseña"] 
                );    
                print_r($id);
                
                $this->Catalogos_Modelo->editar_un_registro("Usuclave",$id,"usuario",$usuario);
                $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Usuarios/','Edito un registro');
            
                header("Location:".base_url()."catalogos/index_usuarios");
            }
            else{
                    echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
                    echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
                    echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
            }
        }
    }
        public function update_receptor($id = null)
    {
        if($this->input->post())
        {
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
      if ($privilegios['catalogos_m']=='si') {
            $id=$id;    
            $receptor = array(
            'RFC_receptor' =>		  	$_POST["RFC_receptor"] ,
            'UsoCFDI' =>       	        $_POST["Regimen_fiscal"] ,
            'Tipo_perosna_receptor' =>  $_POST["Tipo_perosna_receptor"] ,
            'Rason_social_receptor' =>  $_POST["Rason_social_receptor"] ,
            'Nombre' =>         		$_POST["Nombre"] ,
            'Ap_paterno' =>		  		$_POST["Ap_paterno"] ,
            'Ap_materno' =>       		$_POST["Ap_materno"] ,
            'Calle' =>       			$_POST["Calle"] ,
            'NoExterior' =>     		$_POST["NoExterior"] ,
            'NoInterior' =>         	$_POST["NoInterior"] ,
            'Colonia' =>		  		$_POST["Colonia"] ,
            'Localidad' =>       		$_POST["Localidad"] ,
            'Municipio' =>       		$_POST["Municipio"] ,
            'Estado' =>     			$_POST["Estado"] ,
            'Pais' =>         			$_POST["Pais"] ,
            'CodigoPostal' =>		  	$_POST["CodigoPostal"] ,
            'Email_receptor' =>       	$_POST["Email_receptor"] ,
            'Telefono_receptor' =>      $_POST["Telefono_receptor"] 
            );
            //print_r($id);
            //print_r($receptor);
            $this->Catalogos_Modelo->editar_un_registro("Id_receptor",$id," receptor",$receptor); 
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Receptores/','Edito un registro');
 
            header("Location:".base_url()."catalogos/index_receptor");
        }
        else{
            echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
            echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
            echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
        }
        }
    }
	public function eliminarConcepto($id = null){
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
      if ($privilegios['catalogos_e']=='si') {
		if ($this->Catalogos_Modelo->eliminar_un_registro("conceptos","ClaveProdServ",$id))
        {
            //xattr_get(filename, name)header("Location:".base_url()."catalogos/index_conceptos");
             $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Conceptos/','Elimino un registro');
        }
        else{
           
            header("Location:".base_url()."catalogos/index_conceptos");
        }
    }else{
         echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
            echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
            echo "<h1>GRACIAS POR SU COMPRENCION</h1>";

    }

	}
	public function eliminarUsiario($id = null){
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
      if ($privilegios['catalogos_e']=='si') {
      
        $fe=$this->Catalogos_Modelo->selecciona_una_tabla_una_condicion(
        "id_factura_encabezado","factura_encabezado","id_usuario",$id);

        for ($filaX=0; $filaX <count($fe) ; $filaX++) {
            $this->Catalogos_Modelo->eliminar_un_registro("impiestos","id_factura_encabezado",$fe[$filaX]['id_factura_encabezado']);
            $this->Catalogos_Modelo->eliminar_un_registro("detalle_factura","id_factura_encabezado",$fe[$filaX]['id_factura_encabezado']);
        }

        $this->Catalogos_Modelo->eliminar_un_registro("factura_encabezado","id_usuario"
                ,$id);



		$this->Catalogos_Modelo->eliminar_un_registro("monitoreo_usuario","id_usuario"
                ,$id);
        $this->Catalogos_Modelo->eliminar_un_registro("privilegio_usuario","id_usuario",$id);
        $this->Catalogos_Modelo->eliminar_un_registro("usuario","Usuclave",$id);
         header("Location:".base_url()."catalogos/index_usuarios");
         //$this->index_usuarios();
    }
    else{
         echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
            echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
            echo "<h1>GRACIAS POR SU COMPRENCION</h1>";

    }

	}
	public function eliminarReceptor($id = null){
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
      if ($privilegios['catalogos_e']=='si') {
		if ($this->Catalogos_Modelo->eliminar_un_registro("receptor","Id_receptor",$id))
        {
            //xattr_get(filename, name)header("Location:".base_url()."catalogos/index_conceptos");
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Receptores/','Elimino un registro');
        }
        else{
            
            
            header("Location:".base_url()."catalogos/index_receptor");
        }
    }
    else{
         echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
            echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
            echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
    }
	}
    public function submit_add_concepto(){
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Conceptos/','Quiere agregar registros','foto_perfil');
        $this->load->view("pagina/catalogos/submit_add_conceptos.php",compact("privilegios","foto_perfil"));
    }
    public function submit_add_emisor(){
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Emisores/','Quiere agregar registros');
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $this->load->view("pagina/catalogos/submit_add_emisor.php",compact("privilegios","foto_perfil"));
    }
    public function submit_add_receptor(){
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Receptores/','Quiere agregar registros');
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $this->load->view("pagina/catalogos/submit_add_receptor.php",compact("privilegios","foto_perfil"));
    }
    public function submit_add_usuarios(){
        $usuario=$this->session->userdata('Usuclave');
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        $usuarios=$this->Catalogos_Modelo->seleccionar_una_tabla_una_condicion(
        "*","usuario","Usulogin","administrador");
        //print_r($usuarios);
        //print_r($privilegios);
        if ($privilegios['catalogos_a']=='si') 
        {
            $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Usuarios/','Quiere agregar registros');
            $ss=$this->session->userdata('Usuacceso');
            if ($ss=="AA")
            {
                $this->load->view("pagina/catalogos/submit_add_usuarios.php",compact("privilegios","foto_perfil","usuarios"));
            }
            else
            {
                $this->load->view("pagina/catalogos/submit_add_usuarios_generico.php",compact("privilegios","foto_perfil","usuarios"));
            }
            
        }else{
            echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
            echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
            echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
        }
    }
    public function submit_post_emisor(){
        if(isset($_POST['insertar']))
        {
            

            $config = array(
            "upload_path" => "./usuarios/cetificados",
            'allowed_types' => "*"
        );
        $variablefile= $_FILES;
        $info = array();
            
            $_FILES['archivo1']['name'] =    $variablefile['archivo1']['name'][0];
            $_FILES['archivo1']['type'] =    $variablefile['archivo1']['type'][0];
            $_FILES['archivo1']['tmp_name'] = $variablefile['archivo1']['tmp_name'][0];
            $_FILES['archivo1']['error'] =   $variablefile['archivo1']['error'][0];
            $_FILES['archivo1']['size'] =    $variablefile['archivo1']['size'][0];

            $_FILES['archivo2']['name'] =    $variablefile['archivo2']['name'][0];
            $_FILES['archivo2']['type'] =    $variablefile['archivo2']['type'][0];
            $_FILES['archivo2']['tmp_name'] = $variablefile['archivo2']['tmp_name'][0];
            $_FILES['archivo2']['error'] =   $variablefile['archivo2']['error'][0];
            $_FILES['archivo2']['size'] =    $variablefile['archivo2']['size'][0];
            
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

                    $ultimo_id=
                    $this->Catalogos_Modelo->ultimo_registro('Id_emisor','emisor','Id_emisor');

                    $emisor = array(
                    'Id_emisor' =>            $ultimo_id['Id_emisor'] +1,
                    'RFC_emisor' =>           $_POST['rfc'],
                    'Rason_social_emisor' =>  $_POST['razon_social'],
                    'Regimen_fiscal' =>       $_POST['Regimen_fiscal'],
                    'Tipo_perosna_emisor' =>  $_POST['tipo_persona'],

                    'Calle' =>                $_POST['calle'],
                    'NoExterior' =>           $_POST['ninterior'],
                    'NoInterior' =>           $_POST['nexterior'],
                    'Colonia' =>              $_POST['colonia'],
                    'Localidad' =>            $_POST['localidad'],
                    'Municipio' =>            $_POST['municipio'],
                    'Estado' =>               $_POST['estado'],
                    'Pais' =>                 $_POST['pais'],
                    'CodigoPostal' =>         $_POST['codigo_postal'],

                    'noCertificdo' =>         $_POST['n_cer'],
                    'Usuario_pac' =>          $_POST['id_usu'],
                    'Contraseña_pac' =>       $_POST['pass_usu'],
                    'Punto_Cer' =>            $_FILES['archivo1']['name'],
                    'Punto_pem' =>            $_FILES['archivo2']['name'],

                    'Telefono_emisor' =>      $_POST['telefono'],
                    'Email_emisor' =>         $_POST['correo']
                );
                    if (is_array($emisor)) {
                        $this->Catalogos_Modelo->registrar_todo("emisor",$emisor);
                        echo "<h2>datos guardados exitosamente</h2>";
                    }else{
                        echo "<h2>no se han encontrado datos,no se ha guardado nada</h2>";
                    }
                }
                else
                {
                    echo "fracaso!";
                }
            } 
        }
    }
    public function submit_post_concepto(){   
        ini_set('date.timezone','America/Mexico_City');
        $hf=date('Y-m-d,H:i:s',time());
        $hora=date('H:i:s',time());
        $fecha=date('Y-m-d',time());
        //$foto_perfil=$this->Generico_Modelo->imagen_perfil();
        $capturar_fecha=$fecha."T".$hora;
        $fecha_hora=$capturar_fecha;

        $usuario=$this->session->userdata('Usuclave');
        if(isset($_POST['insertar']))
        {   
            if (  !isset($_POST['ClaveProdServ']) 
                & !isset($_POST['NoIdentificacion']) 
                & !isset($_POST['ClaveUnidad']) 
                & !isset($_POST['Descripcion'])
                & !isset($_POST['ValorUnitario']) 
                & !isset($_POST['Moneda']) 
                & !isset($_POST['Descuento']) 
                & !isset($_POST['Impuesto_Iva_Trans'])
                & !isset($_POST['Impuesto_Ieps_Trans']) 
                & !isset($_POST['Impuesto_Isr_Ret']) 
                & !isset($_POST['Impuesto_Iva_Ret'])
                & !isset($_POST['Impuesto_Ieps_Ret'])
            ) {
                header("Location:".base_url()."catalogos/submit_add_concepto");
            }else{
            //guarda las variables por el metodo post
            $items1 = ($_POST['ClaveProdServ']);
            $items2 = ($_POST['NoIdentificacion']);
            $items3 = ($_POST['ClaveUnidad']);
            $items4 = ($_POST['Descripcion']);
            $items5 = ($_POST['ValorUnitario']);
            $items6 = ($_POST['Moneda']);
            $items7 = ($_POST['Descuento']);
            $items8 = ($_POST['Impuesto_Iva_Trans']);  
            $items9 = ($_POST['Impuesto_Ieps_Trans']);
            $items10 =($_POST['Impuesto_Isr_Ret']);
            $items11 =($_POST['Impuesto_Iva_Ret']);
            $items12 =($_POST['Impuesto_Ieps_Ret']);
            $items13 =$fecha_hora;

           $arreglo= count($items1)-1;
            for ($i=0; $i <= $arreglo; $i++) { 
                     //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    $item4 = current($items4);
                    $item5 = current($items5);
                    $item6 = current($items6);
                    $item7 = current($items7);
                    $item8 = current($items8);
                    $item9 = current($items9);
                    $item10 =current($items10);
                    $item11 =current($items11);
                    $item12 =current($items12);
                   //$item11 = current($items11);
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $v1= (( $item1 !== false) ? $item1 : ", &nbsp;");
                    $v2= (( $item2 !== false) ? $item2 : ", &nbsp;");
                    $v3= (( $item3 !== false) ? $item3 : ", &nbsp;");
                    $v4= (( $item4 !== false) ? $item4 : ", &nbsp;");
                    $v5= (( $item5 !== false) ? $item5 : ", &nbsp;");
                    $v6= (( $item6 !== false) ? $item6 : ", &nbsp;");
                    $v7= (( $item7 !== false) ? $item7 : ", &nbsp;");
                    $v8= (( $item8 !== false) ? $item8 : ", &nbsp;");
                    $v9= (( $item9 !== false) ? $item9 : ", &nbsp;");
                    $v10=(( $item10 !== false) ? $item10 : ", &nbsp;");
                    $v11=(( $item11 !== false) ? $item11 : ", &nbsp;");
                    $v12=(( $item12 !== false) ? $item12 : ", &nbsp;");
                    //agregando al arreglo
                    $valores = array(
                    'ClaveProdServ'      => $v1,
                    'NoIdentificacion'   => $v2,
                    'ClaveUnidad'        => $v3,
                    'Descripcion'        => $v4,
                    'ValorUnitario'      => $v5,
                    'Moneda'             => $v6,
                    'Descuento'          => $v7,
                    'Impuesto_trans_Iva' => $v8,
                    'Impuesto_trans_Ieps'=> $v9,
                    'Impuesto_ret_Isr'   =>$v10,
                    'Impuesto_ret_iva'   =>$v11,
                    'Impuesto_ret_Ieps'  =>$v12,
                    'fecha_captura'      =>$items13
                );
                    $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Conceptos/','Agrego un registro');

                    $this->Catalogos_Modelo->registrar_todo('conceptos',$valores);
                    header('Location: index_conceptos');  
                    //-----------------------------------
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    $item3 = next( $items3 );
                    $item4 = next( $items4 );
                    $item5 = next( $items5 );
                    $item6 = next( $items6 );
                    $item7 = next( $items7 );
                    $item8 = next( $items8 );
                    $item9 = next( $items9 );
                    $item10 =next( $items10 );
                    $item11 =next( $items11 );
                    $item12 =next( $items12 );
                    $item13 =next( $items13 );
                    
                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false  && $item6 === false && $item7 === false && $item8 === false && $item9 === false && $item10 === false && $item11 === false && $item12 === false && $item13 === false) break;
                } 
            }
        }
    }
    public function submit_post_receptor(){
        
        if(isset($_POST['insertar']))
        {

        $ultimo_id=$this->Catalogos_Modelo->ultimo_registro('Id_receptor','receptor','Id_receptor');
        $ultimo_id= $ultimo_id['Id_receptor'] +1;
        if (      !isset($_POST['RFC_receptor']) 
                & !isset($_POST['Regimen_fiscal']) 
                & !isset($_POST['Tipo_perosna_receptor']) 
                & !isset($_POST['Rason_social_receptor'])
                & !isset($_POST['Nombre'])
                & !isset($_POST['Ap_paterno'])
                & !isset($_POST['Ap_materno'])
                & !isset($_POST['Calle'])
                & !isset($_POST['NoExterior'])
                & !isset($_POST['NoInterior'])
                & !isset($_POST['Colonia'])
                & !isset($_POST['Localidad'])
                & !isset($_POST['Municipio'])
                & !isset($_POST['Estado'])
                & !isset($_POST['Pais'])
                & !isset($_POST['CodigoPostal'])
                & !isset($_POST['Email_receptor'])
                & !isset($_POST['Telefono_receptor'])
            ) {
                header("Location:".base_url()."catalogos/submit_add_receptor");
            }else{
            //guarda las variables por el metodo post
            $items1 = ($ultimo_id);
            $items2 = ($_POST['RFC_receptor']);
            $items3 = ($_POST['Regimen_fiscal']);
            $items4 = ($_POST['Tipo_perosna_receptor']);
            $items5 = ($_POST['Rason_social_receptor']);
            $items6 = ($_POST['Nombre']);
            $items7 = ($_POST['Ap_paterno']);
            $items8 = ($_POST['Ap_materno']);  
            $items9 = ($_POST['Calle']);
            $items10 = ($_POST['NoExterior']); 
            $items11 = ($_POST['NoInterior']);
            $items12 = ($_POST['Colonia']);
            $items13 = ($_POST['Localidad']);
            $items14 = ($_POST['Municipio']);
            $items15 = ($_POST['Estado']);
            $items16 = ($_POST['Pais']);
            $items17 = ($_POST['CodigoPostal']);
            $items18 = ($_POST['Email_receptor']);  
            $items19 = ($_POST['Telefono_receptor']);
            
            //echo $items1;
           $arreglo= count($items2)-1;
            for ($i=0; $i <= $arreglo; $i++) { 
                   
                     //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = ($items1+$i);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    $item4 = current($items4);
                    $item5 = current($items5);
                    $item6 = current($items6);
                    $item7 = current($items7);
                    $item8 = current($items8);
                    $item9 = current($items9);
                    $item10 = current($items10);
                    $item11 = current($items11);
                    $item12 = current($items12);
                    $item13 = current($items13);
                    $item14 = current($items14);
                    $item15 = current($items15);
                    $item16 = current($items16);
                    $item17 = current($items17);
                    $item18 = current($items18);
                    $item19 = current($items19);
                    //echo $item1;
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $v1=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $v2=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $v3=(( $item3 !== false) ? $item3 : ", &nbsp;");
                    $v4=(( $item4 !== false) ? $item4 : ", &nbsp;");
                    $v5=(( $item5 !== false) ? $item5 : ", &nbsp;");
                    $v6=(( $item6 !== false) ? $item6 : ", &nbsp;");
                    $v7=(( $item7 !== false) ? $item7 : ", &nbsp;");
                    $v8=(( $item8 !== false) ? $item8 : ", &nbsp;");
                    $v9=(( $item9 !== false) ? $item9 : ", &nbsp;");
                    $v10=(( $item10 !== false) ? $item10 : ", &nbsp;");
                    $v11=(( $item11 !== false) ? $item11 : ", &nbsp;");
                    $v12=(( $item12 !== false) ? $item12 : ", &nbsp;");
                    $v13=(( $item13 !== false) ? $item13 : ", &nbsp;");
                    $v14=(( $item14 !== false) ? $item14 : ", &nbsp;");
                    $v15=(( $item15 !== false) ? $item15 : ", &nbsp;");
                    $v16=(( $item16 !== false) ? $item16 : ", &nbsp;");
                    $v17=(( $item17 !== false) ? $item17 : ", &nbsp;");
                    $v18=(( $item18 !== false) ? $item18 : ", &nbsp;");
                    $v19=(( $item19 !== false) ? $item19 : ", &nbsp;");
                    //agregando al arreglo
                    $valores = array(
                    'Id_receptor'     		=> $v1,
                    'RFC_receptor'  		=> $v2,
                    'UsoCFDI'       	    => $v3,
                    'Tipo_perosna_receptor' => $v4,
                    'Rason_social_receptor' => $v5,
                    'Nombre'            	=> $v6,
                    'Ap_paterno'      		=> $v7,
                    'Ap_materno'   			=> $v8,
                    'Calle'     			=> $v9,
                    'NoExterior'      		=>$v10,
                	'NoInterior'     		=> $v11,
                    'Colonia'  				=> $v12,
                    'Localidad'       		=> $v13,
                    'Municipio'       		=> $v14,
                    'Estado'     			=> $v15,
                    'Pais'            		=> $v16,
                    'CodigoPostal'      	=> $v17,
                    'Email_receptor'   		=> $v18,
                    'Telefono_receptor'     => $v19);
                    $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/Registros/','Agrego un registro');
                    $this->Catalogos_Modelo->registrar_todo('receptor',$valores);
                    header('Location: index_receptor');  
                    //-----------------------------------
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    $item3 = next( $items3 );
                    $item4 = next( $items4 );
                    $item5 = next( $items5 );
                    $item6 = next( $items6 );
                    $item7 = next( $items7 );
                    $item8 = next( $items8 );
                    $item9 = next( $items9 );
                    $item10 = next( $items10);
                    $item11 = next( $items11 );
                    $item12 = next( $items12 );
                    $item13 = next( $items13 );
                    $item14 = next( $items14 );
                    $item15 = next( $items15 );
                    $item16 = next( $items16 );
                    $item17 = next( $items17 );
                    $item18 = next( $items18 );
                    $item19 = next( $items19 );
                    
                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false  && $item6 === false && $item7 === false && $item8 === false && $item9 === false && $item10 === false && $item11 === false && $item12 === false && $item13 === false && $item14 === false && $item15 === false  && $item16 === false && $item17 === false && $item18 === false && $item19 === false) break;
            } 
        }
        
        }
    }
    public function submit_post_usuarios(){
        if(isset($_POST['insertar']))
        {
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        //print_r($privilegios);
      if ($privilegios['catalogos_a']=='si') {

            $ultimo_id=$this->Catalogos_Modelo->ultimo_registro('Usuclave','usuario','Usuclave');
            //$ultimo_folio=$this->Catalogos_Modelo->ultimo_registro('Usufolio','usuario','Usufolio');
            $ultimo_id= $ultimo_id['Usuclave'] +1;
            if (  !isset($_POST['Usulogin']) 
                & !isset($_POST['Usunombre']) 
                & !isset($_POST['contraseña'])) 
            {
                header("Location:".base_url()."catalogos/submit_add_usuarios");
            }else{
            //guarda las variables por el metodo post
            echo "<br>".$UltimoUsuario  = ($ultimo_id);
            echo "<br>".$Usulogin       = "Estandar";
            echo "<br>".$Usunombre      = ($_POST['Usunombre']);
            echo "<br>".$contraseña     = ($_POST['Password']);
            echo "<br>".$folio          = $this->session->userdata('Usufolio');
            
            if ($Usulogin="Estandar") {
                $Usuacceso="E";
            }
            $usuario = array(
                'Usuclave'  => $UltimoUsuario,
                'Usufolio'  => $folio,
                'Usulogin'  => $Usulogin,
                'Usunombre' => $Usunombre,
                'Usuacceso' => $Usuacceso,
                'contraseña'=> '1234');
            $this->Catalogos_Modelo->registrar_todo('usuario',$usuario);
            $this->Generico_Modelo->registros_privilegio_usuario($UltimoUsuario,'E');
            




            //id_usuario|acceso|nombre_modulo_acceso|definicion|modificar_contenido|eliminar_contenido

           //print_r($ultimo_folio) ;

           
           } 

            }else{
                echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
                echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
                echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
            }
        }
        else{
            
            header("Location:".base_url()."catalogos/submit_add_usuarios");
        }
    }

    public function documento($cat,$metodo){
        $usuario=     $this->session->userdata('Usuclave');
        $folio=       $this->session->userdata('Usufolio');
        $tipo_usuario=$this->session->userdata('Usuacceso');
        $privilegios= $this->Generico_Modelo->privilegios_de_usuario($usuario);
      //print_r($tipo_usuario);
        

        if ($privilegios['catalogos_a']=='si') {
            echo $cat;
            echo "<br>".$metodo;        
            if (!isset($cat) && !isset($metodo)) {
                echo "error fatal";
            }
            else{
                if ($tipo_usuario=="AA" && $cat=="usuario") {
                    $datos = $this->Catalogos_Modelo->resiveTodaLaTabla($cat);
                }
                if ($tipo_usuario=="AB" && $tipo_usuario=="E" && $cat=="usuario") {
                    $datos = $this->Catalogos_Modelo->resiveTodaLaTablaUnFolio($cat,"Usufolio",$folio);
                }
                else{
                    $datos = $this->Catalogos_Modelo->resiveTodaLaTabla($cat);
                }
                $datos = $this->Catalogos_Modelo->resiveTodaLaTabla($cat); 
                $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Catalogo/'.$cat.'/','Genero un '.$metodo.' de los registros de '.$cat);
                $this->load->view('complementos/formularios/'.$metodo.'/'.$cat, compact("datos","cat"));   
                }
            }      
            else{
                echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
                echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
                echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
            }
    }
    public function comprobantes(){
        $id=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($id);
        if (!$id==null) {
        $folio= $this->session->userdata('Usufolio');

        $comprobante =$this->Catalogos_Modelo->seleccionar_cuatro_tablas(
        "id_factura_encabezado,Fecha,Rason_social_emisor,Rason_social_receptor,Usunombre",
        "factura_encabezado",
        "usuario",
        "receptor",
        "emisor",
    
        "id_usuario",
        "Usuclave",

        "id_receptor",
        "Id_receptor",

        "id_emisor",
        "Id_emisor",
        "Usufolio",$folio);

         $foto_perfil=$this->Generico_Modelo->imagen_perfil();  
        $this->load->view('complementos/sesion');
        $this->load->view('plantilla/head');
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav/catalogos',compact('foto_perfil','privilegios'));
        $this->load->view('interfaz/comprobantes/index',compact('comprobante'));
  
        $this->load->view('plantilla/footer');

        }
        else{
          echo "no paso la papada x2";
          $this->session->sess_destroy();
        redirect('login');
          }
          //$this->load->view('pagina/configuracion/Mi_perfil.php');
      }
      public function generar_archivo($archivo){

        if ($this->upload->do_upload($archivo)) {
            $data = array("upload_data" => $this->upload->data());   

            if (!is_array($data)) {
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
            $info = array(
                "archivo" => $_FILES[$archivo]['name'],
                "mensaje" => "Archivo no subido ni guardado!"
            );
            $mensaje=$info['mensaje'];
                echo "<br>$mensaje";
        }
    }
}
?>