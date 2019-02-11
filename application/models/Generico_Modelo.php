<?php
class Generico_Modelo extends CI_model{
	
    //AGREGAR REGISTROS
    public function registrar_todo($tabla,$valores){
    $this->db->insert($tabla, $valores);
          //inserta datos 
    }
    //MODIFICAR
    public function editar_un_registro($idntificador,$valor_id,$tabla,$valores){
        $this->db->where($idntificador, $valor_id);
        $this->db->update($tabla, $valores);
    }
    public function editar_un_registro_dos_condicionales($idntificador_a,$valor_id_a,$idntificador_b,$valor_id_b,$tabla,$valores){
        $this->db->where($idntificador_a, $valor_id_a);
        $this->db->where($idntificador_b, $valor_id_b);
        $this->db->update($tabla, $valores);
    }
    //ELIMINAR
    public function eliminar_un_registro($tabla,$idntificador,$valor_id){
        $this->db->where($idntificador, $valor_id);
        $this->db->delete($tabla);  
    }
    //CONSULTAS
    //select * from $tabla?
    public function resiveTodaLaTabla($tabla){
    //selecciona todos los campos de la tabla x
    return $this->db->query("SELECT * FROM $tabla ")->result();
    }
    //EXCEPCIONES
    //SELECT * FROM $tabla? WHERE $id_execto? <> $id_execto_valor?
    public function resiveTodaLaTablaMenosUnRegistro($tabla,$id_execto,$id_execto_valor){
    return $this->db->query("SELECT * FROM $tabla WHERE $id_execto<> $id_execto_valor")->result();
    }
    public function resiveTodaLaTablaMenosUnRegistroUnaCondicion($tabla,$id_execto,$id_execto_valor,$folioId,$folioIdValor){
    return $this->db->query("SELECT * FROM $tabla WHERE $id_execto<> $id_execto_valor AND $folioId = $folioIdValor")->result();
    }
    public function resiveTodaLaTablaMenosUnRegistroDosCondicionales($tabla,$id_execto,$id_execto_valor,$id_a,$valor_id_a,$id_b,$valor_id_b){
    return $this->db->query("SELECT * FROM $tabla WHERE $id_execto<> $id_execto_valor AND $id_a = $valor_id_a" AND "$id_b" <> "$valor_id_b")->result();
    }
    //SELECCIONA UN REGISTRO
    public function selecciona_un_registro($campos_seleccionados,$tabla,$campo_a,$valor_campo_a){
    $this->db-> select($campos_seleccionados);
    $this->db->   from($tabla);
    $this->db->  where($campo_a,$valor_campo_a);
    $consulta=$this->db->get();
        if ( $consulta->num_rows() > 0 ){
            $row = $consulta->row_array();
            return $row;
        }       
    }
    //SELECCIONA UN REGISTRO CON DOS CONDICIONLES
    public function selecciona_un_registro_dos_where($campos_seleccionados,$tabla,$campo_a,$valor_campo_a,$campo_b,$valor_campo_b){
	$this->db-> select($campos_seleccionados);
	$this->db->   from($tabla);
	$this->db->  where($campo_a,$valor_campo_a);
	$this->db->  where($campo_b,$valor_campo_b);
	$consulta=$this->db->get();
		if ( $consulta->num_rows() > 0 ){
		    $row = $consulta->row_array();
		    return $row;
		}		
	}
    
	public function monitoreo_usuario($tabla,$direccion,$actividad){
	ini_set('date.timezone', 'America/Mexico_City');
	$time1=date('H:i:s',time());
	//datos importantes
	$usuario= $this->session->userdata('Usuclave');
	$dia=date('d',time());
	$mes=date('M',time());
	$año=date('Y',time());
	$hora=date("g:i a",strtotime($time1));	
	//id_usuario|actividad|Dia|Mes|Año|Hora
	$insertar = 
	array(
		'id_usuario' => $usuario,
		'mes' => $mes,
		'dia' => $dia,
		'Año' => $año,
		'Hora' => $hora,
		'Direccion' => $direccion,
		'Actividad' => $actividad,);
	$this->db->insert($tabla, $insertar);
	}
	public function privilegios_de_usuario($usuario){
		$privilegiosInicio=$this->selecciona_un_registro_dos_where('*','privilegio_usuario ','nombre_modulo_acceso',
                'GENERAR_CFDI','id_usuario',$usuario);
            
            $privilegiosMiPerfil=$this->selecciona_un_registro_dos_where('*','privilegio_usuario ','nombre_modulo_acceso','INFORMACION_GENERAL','id_usuario',$usuario);
            
            $privilegiosCatalogos=$this->selecciona_un_registro_dos_where('*','privilegio_usuario ','nombre_modulo_acceso','CATALOGOS','id_usuario',$usuario);
            
            $privilegiosConceptos=$this->selecciona_un_registro_dos_where('*','privilegio_usuario ','nombre_modulo_acceso','CONCEPTOS','id_usuario',$usuario);
            $privilegiosComprobantes=$this->selecciona_un_registro_dos_where('*','privilegio_usuario ','nombre_modulo_acceso','COMPROBANTES','id_usuario',$usuario);    
            
            $privilegiosAyuda=$this->selecciona_un_registro_dos_where('*','privilegio_usuario ','nombre_modulo_acceso','AYUDA','id_usuario',$usuario);   

            $privilegiosConfiguraciones=$this->selecciona_un_registro_dos_where('*','privilegio_usuario ','nombre_modulo_acceso','CONFIGURACIONES','id_usuario',$usuario);

			return $privilegios=$this->parametros_privilegios($privilegiosInicio,$privilegiosMiPerfil, $privilegiosCatalogos,$privilegiosConceptos,$privilegiosConfiguraciones, $privilegiosAyuda,$privilegiosComprobantes);

	}
    public function registros_privilegio_usuario($id,$categoria_usuario){
        //echo "<hr>";
        //print_r($id);
        //echo $id.'<hr>';
        //echo $categoria_usuario.'<hr>';
        $nGC='GENERAR_CFDI';
        $dGC='MODULO ENCARGADO DE GENERAR FACTURAS POR MEDIO DE LOS DATOS DEL EMISOR,RECEPTOR,COMPROBANTE Y CONCEPTOS';

        $nIG='INFORMACION_GENERAL';
        $dIG='VISUALIZA LA INFORMACIÓN DE PERFIL';
        
        $nCAT='CATALOGOS';
        $dCAT='MODULO ENCARGADO DE LA GESTIÓN DE LA INFORMACIÓN (EMISOR,RECEPTOR,COMPROBANTE Y CONCEPTOS)';
        
        $nCON='CONCEPTOS';
        $dCON='PERMITE VER LOS CONCEPTOS, AGREGAR CONCEPTOS';
        
        $nCOM='COMPROBANTES';
        $dCOM='MUESTRA LOS COMPROBANTES GENERADOS';
        
        $nAYU='AYUDA';
        $dAYU='MUESTRA MANUAL DE USUARIO';

        $nCONF='CONFIGURACIONES';
        $dCONF='OPCION SOLO PARA ADMINISTRADOR , MUESTRA GRAFICOS, MONITORA USUARIOS Y OTORGA PRIVILEGIOS';
        
        if ($categoria_usuario=="AA") {
            //echo "<hr>super admin";
            $this->generar_privilegios_automaticos_usuario($id,$nGC,$dGC,"si","si","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nIG,$dIG,"si","si","si ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCAT,$dCAT,"si","si","si","si");
            $this->generar_privilegios_automaticos_usuario($id,$nCON,$dCON,"si","si","si ","si");
            $this->generar_privilegios_automaticos_usuario($id,$nCOM,$dCOM,"si","si","si","no");
            $this->generar_privilegios_automaticos_usuario($id,$nAYU,$dAYU,"si","si","no","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCONF,$dCONF,"si","no","no ","no");
        }
        if ($categoria_usuario=="AB") 
        {
            //echo "<hr>admin";
            $this->generar_privilegios_automaticos_usuario($id,$nGC,$dGC,"si","si","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nIG,$dIG,"si","si","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCAT,$dCAT,"si","si","si","si");
            $this->generar_privilegios_automaticos_usuario($id,$nCON,$dCON,"si","si","si","si");
            $this->generar_privilegios_automaticos_usuario($id,$nCOM,$dCOM,"si","si","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nAYU,$dAYU,"si","si","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCONF,$dCONF,"no","no","no ","no");
        }
        if ($categoria_usuario=="E") 
        {
            //echo "<hr>estandar";
            $this->generar_privilegios_automaticos_usuario($id,$nGC,$dGC,"si","si","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nIG,$dIG,"si","no","si","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCAT,$dCAT,"no","no","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCON,$dCON,"si","si","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCOM,$dCOM,"si","no","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nAYU,$dAYU,"si","no","no ","no");
            $this->generar_privilegios_automaticos_usuario($id,$nCONF,$dCONF,"no","no","no ","no");
        
        }
        else{

        }
    }
    public function generar_privilegios_automaticos_usuario(
        $id,$nombre_modulo_acceso,$definicion,
        $acceso,$agregar_contenido,$modificar_contenido,$eliminar_contenido){
        //id_usuario|acceso|nombre_modulo_acceso|definicion|modificar_contenido|eliminar_contenido
            $privilegios = array(
                'id_usuario'            => $id,
                'acceso'                => $acceso,
                'nombre_modulo_acceso'  => $nombre_modulo_acceso,
                'definicion'            => $definicion,
                'agregar_contenido'     => $agregar_contenido, 
                'modificar_contenido'   => $modificar_contenido,
                'eliminar_contenido'    => $eliminar_contenido);
            $this->registrar_todo("privilegio_usuario",$privilegios);
    }
	public function parametros_privilegios($privilegiosInicio,$privilegiosMiPerfil, $privilegiosCatalogos,$privilegiosConceptos,$privilegiosConfiguraciones, $privilegiosAyuda,$privilegiosComprobantes){
                   
            $p_v_inicio=$privilegiosInicio['acceso'];
            $p_a_inicio=$privilegiosInicio['agregar_contenido'];

            $p_v_perfil=$privilegiosMiPerfil['acceso'];
            $p_m_perfil=$privilegiosMiPerfil['modificar_contenido'];

            $p_v_catalogos=$privilegiosCatalogos['acceso'];
            $p_a_catalogos=$privilegiosCatalogos['agregar_contenido'];
            $p_m_catalogos=$privilegiosCatalogos['modificar_contenido'];
            $p_e_catalogos=$privilegiosCatalogos['eliminar_contenido'];

            $p_v_conceptos=$privilegiosConceptos['acceso'];
            $p_a_conceptos=$privilegiosConceptos['agregar_contenido'];
            $p_m_conceptos=$privilegiosConceptos['modificar_contenido'];
            $p_e_conceptos=$privilegiosConceptos['eliminar_contenido'];

            $p_v_comprobantes=$privilegiosComprobantes['acceso'];
            $p_a_comprobantes=$privilegiosComprobantes['agregar_contenido'];
            $p_m_comprobantes=$privilegiosComprobantes['modificar_contenido'];
            $p_e_comprobantes=$privilegiosComprobantes['eliminar_contenido'];

            $p_v_configuracion=$privilegiosConfiguraciones['acceso'];
            $p_a_configuracion=$privilegiosConfiguraciones['agregar_contenido'];
            $p_m_configuracion=$privilegiosConfiguraciones['modificar_contenido'];
            $p_e_configuracion=$privilegiosConfiguraciones['eliminar_contenido'];

            $p_v_ayuda=$privilegiosAyuda['acceso'];

            return $privilegios = array(
                'inicio_v' => $p_v_inicio,
                'inicio_a' => $p_a_inicio,
                'perfil_v' => $p_v_perfil,
                'perfil_m' => $p_m_perfil,
                'catalogos_v' => $p_v_catalogos,
                'catalogos_a' => $p_a_catalogos,
                'catalogos_m' => $p_m_catalogos,    
                'catalogos_e' => $p_e_catalogos,
                'conceptos_v' => $p_v_conceptos,
                'conceptos_a' => $p_a_conceptos,
                'conceptos_m' => $p_m_conceptos,    
                'conceptos_e' => $p_e_conceptos,
                'comprobantes_v' => $p_v_comprobantes,
                'comprobantes_a' => $p_a_comprobantes,
                'comprobantes_m' => $p_m_comprobantes,    
                'comprobantes_e' => $p_e_comprobantes,
                'ayuda_v' => $p_v_ayuda,
                'configuracion_v' => $p_v_configuracion,
                'configuracion_a' => $p_a_configuracion,
                'configuracion_m' => $p_m_configuracion,    
                'configuracion_e' => $p_e_configuracion,
                ); 
    }
    public function imagen_perfil(){
        $id_usuario=$this->session->userdata('Usuclave');
        $imagen=$this->Generico_Modelo->selecciona_un_registro(
        "Foto_Perfil","usuario","Usuclave",$id_usuario);
        return $foto_perfil=$imagen['Foto_Perfil'];

    }
	 
}
?>