<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Inicio_Modelo');
        $this->load->model('Generico_Modelo');
		$this->load->library('session');
	}
	public function index()
	{
        $foto_perfil=$this->Generico_Modelo->imagen_perfil();
		$this->load->view("pagina/index",compact('foto_perfil'));
		//$this->load->view("inicio");
	}
    public function ayuda()
    {
        $usuario=$this->session->userdata('Usuacceso');

        if ($usuario=="AA") {
            header("location: localhost\factuwin10\application\views\complementos\ayuda");
            //$this->load->view("complementos/ayuda/Manual_usuarioSA.pptx");
        }
        if ($usuario=="AB") {
            //$this->load->view("complementos/ayuda/Manual_usuarioA.pptx");
        }
        if ($usuario=="E") {
            //$this->load->view("complementos/ayuda/Manual_usuarioE.pptx");
        }


    }

	public function inicio_con_session()
	{
    $usuario=$this->session->userdata('Usuclave');
    $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
    $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Index','Ingreso al sistema');
    $foto_perfil=$this->Generico_Modelo->imagen_perfil();
		$this->load->view("pagina/inicio/index.php",compact('foto_perfil','privilegios'));
	}
	public function datos_del_emisor(){
		$usuario=$this->session->userdata('Usuclave');
		$emisor =$this->session->userdata('Id_emisor1');
		if (!isset($usuario)&&!isset($emisor)) {
			redirect('login/user_logout');
		}else{
			$Tabla_Emisor=$this->Inicio_Modelo->selecciona_un_registro('*','emisor','Id_emisor',$emisor);
			$Tabla_Receptor=$this->Inicio_Modelo->resiveTodaLaTabla('receptor');

			$this->load->view("pagina/inicio/Datos_del_emisor.php",compact("Tabla_Emisor","Tabla_Receptor"));
		}
	}
	public function llenado_de_datos_cfdi(){
        $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Generar CFDI','');
		$usuario	=$this->session->userdata('Usuclave');
		$Usulogin 	=$this->session->userdata('Usulogin');
		$Usulogin 	=$this->session->userdata('Usunombre');
        $imagen=$this->Generico_Modelo->selecciona_un_registro(
        "Foto_Perfil","usuario","Usuclave",$usuario);
        $foto_perfil=$imagen['Foto_Perfil'];

		if (!isset($usuario)&&!isset($Usulogin)&&!isset($Usulogin)) {
			redirect('login/user_logout');
		}else{
			$Tabla_Conceptos=$this->Inicio_Modelo->resiveTodaLaTabla('conceptos');
			$Tabla_Emisor	=$this->Inicio_Modelo->resiveTodaLaTabla('emisor');
			$Tabla_Receptor	=$this->Inicio_Modelo->resiveTodaLaTabla('receptor');
            //privilegios de usuario
            $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
            $fecha_hora=$this->fecha_hora();
            $acceso_usuario=$this->session->userdata('Usuacceso');
            
            $this->load->view("pagina/inicio/captura_de_datos_cfdi33.php",compact("Tabla_Conceptos","Tabla_Emisor","Tabla_Receptor","fecha_hora","privilegios","acceso_usuario","foto_perfil"));
		}		
	}
    public function fecha_hora(){
    ini_set('date.timezone', 'America/Mexico_City');
    $time1=date('H:i:s',time());
    //datos importantes
    $dia=date('d',time());
    $mes=date('m',time());
    $año=date('Y',time());
    $hora=date("g:i a",strtotime($time1));  
    //id_usuario|actividad|Dia|Mes|Año|Hora
    return $tiempo=$año."-".$mes.'-'.$dia.' '.$hora;
    }
    
	public function ajax_select(){
		if ($this->input->is_ajax_request()) {
			$tabla = $this->input->post("tabla");
			$nombre_id = $this->input->post("nombre_id");
			$id = $this->input->post("id");
			$campos_seleccionados = $this->input->post("campos_seleccionados");
			$datos = $this->Inicio_Modelo->selecciona_un_registro(
				$campos_seleccionados,
				$tabla,
				$nombre_id,
				$id
				);
			echo json_encode($datos);
			}
		else
		{
			show_404();
		}
	}

	public function pendiente(){
		$this->load->view('interfaz/pendiente.php');
	}



    public function factura(){
        //verifica si se preciono el boton subnit
        //primer filtro
    if (isset($_POST['insertar'])) {
            //comprobante
        //id usuario
        $usuario=$this->session->userdata('Usuclave');
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($usuario);
        if ($privilegios['inicio_a']=='si') {
            $cm1=       $_POST['Version'];
            $cm2=       $_POST['Folio'];
            $cm3=       $_POST['Fecha'];
            $cm4=       $_POST['FormaPago'];
            $cm5=       "";
            $cm6=       $_POST['CondicionesDePago'];
            $cm7=       $_POST['Serie'];
            $cm8=       $_POST['TipoDeComprobante'];
            $cm9=       $_POST['MetodoPago'];
            $cm10=      $_POST['LugarExpedicion'];
            $cm11=      $_POST['Moneda_Comprobante1'];
            $cm12=      "";
            $cm13=      "";
            $items1=    ($_POST['folio_prpducto']);
            $items2=    ($_POST['ClaveProdServ_concepto']);
            $items3=    ($_POST['NoIdentificacion_concepto']);
            $items4=    ($_POST['ClaveUnidad_concepto']);
            $items5=    ($_POST['Descripcion_concepto']);
            $items6=    ($_POST['ValorUnitario_concepto']);
            $items7=    ($_POST['Moneda']);
            $items8=    ($_POST['Descuento_concepto']);
            $items9=    ($_POST['Cantidad_concepto']);
            $items10=   ($_POST['importe_base_concepto']);
            $items11=   ($_POST['trans_iva_tasa']);
            $items12=   ($_POST['trans_iva_importe']);
            $items13=   ($_POST['trans_ieps_tasa']);
            $items14=   ($_POST['trans_ieps_importe']);
            $items15=   ($_POST['ret_iva_tasa']);
            $items16=   ($_POST['ret_iva_importe']);
            $items17=   ($_POST['ret_ieps_tasa']);
            $items18=   ($_POST['ret_ieps_importe']);
            $items19=   ($_POST['ret_isr_tasa']);
            $items20=   ($_POST['ret_isr_importe']);
            //id del emisor
            echo "<hr><h2>emisor</h2>";
            $emisor=$_POST['id_emisor'];
            $emisor_registro=$this->Inicio_Modelo->selecciona_un_registro("*","emisor","Id_emisor",$emisor);
            print_r($emisor_registro);
            //id del receptor
            echo "<hr><h2>receptor</h2>";
            $receptor= $_POST['Id_receptor'];
            $receptor_registro=$this->Inicio_Modelo->selecciona_un_registro("*","receptor","Id_receptor",$receptor);
            print_r($receptor_registro);
            
               
            if (
                !isset($cm1)  & !isset($cm2) & !isset($cm3)& !isset($cm4)& !isset($cm5)
                &!isset($cm6) & !isset($cm7) & !isset($cm8)& !isset($cm9)& !isset($cm10)
                &!isset($cm11)& !isset($cm12)& !isset($cm13)

                &!isset($emisor)& !isset($receptor)

                &!isset($items1) & !isset($items2) & !isset($items3) & !isset($items4) & !isset($items5)
                &!isset($items6) & !isset($items7) & !isset($items8) & !isset($items9) & !isset($items10)
                &!isset($items11)& !isset($items12)& !isset($items13)& !isset($items14)& !isset($items15)
                &!isset($items16)& !isset($items17)& !isset($items18)& !isset($items19)& !isset($items20)
            ) {
                echo "filtro 2";
            }
            else{
            //selecciona el ultimo registro de factura encabezado para meter un sucesor
            $ultimo_id=$this->Inicio_Modelo->ultimo_registro('id_factura_encabezado','factura_encabezado','id_factura_encabezado');
            //asigna al sucesor sumandole uno al anterior
            $ultimo_id= $ultimo_id['id_factura_encabezado']+1;
            //llena todos los datos del comprobante en un arreglo tambien los datos del emisor y receptor
            $comprobante = array(
                'id_factura_encabezado' => $ultimo_id,
                'id_emisor'             => $emisor,
                'id_receptor'           => $receptor,
                'id_usuario'            => $usuario,
                'Version'               => $cm1,
                'Folio'                 => $cm2,
                'Fecha'                 => $cm3,
                'FormaPago'             => $cm4,
                'NoCertificado'         => $cm5,
                'CondicionesDePago'     => $cm6,
                'Serie'                 => $cm7,
                'TipoDeComprobante'     => $cm8,
                'MetodoPago'            => $cm9,
                'LugarExpedicion'       => $cm10,
                'Moneda'                => $cm11,
                'Sello'                 => $cm12,
                'Certificado'           => $cm13                
                );     
            //registra la factura encabezado y retorna su id
            $id_factura=$this->Inicio_Modelo->registrar_y_retornar("factura_encabezado",$comprobante);
            //recive toda la tabla creada con aterioridad guardando todo ese arreglo en una var
            $factura_encabezado    = $this->Inicio_Modelo->selecciona_un_registro('*','factura_encabezado','id_factura_encabezado',$id_factura);
            //genera los concetos asociados al comprobante
                if (isset($id_factura)) {
                    echo $arreglo= count($items1)-1;
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
                    $item13 = current($items13);
                    $item14 = current($items14);
                    $item15 = current($items15);
                    $item16 = current($items16);
                    $item17 = current($items17);
                    $item18 = current($items18);
                    $item19 = current($items19);
                    $item20 = current($items20);
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $v1=  (( $item1 !== false) ?  $item1 : ", &nbsp;");
                    $v2=  (( $item2 !== false) ?  $item2 : ", &nbsp;");
                    $v3=  (( $item3 !== false) ?  $item3 : ", &nbsp;");
                    $v4=  (( $item4 !== false) ?  $item4 : ", &nbsp;");
                    $v5=  (( $item5 !== false) ?  $item5 : ", &nbsp;");
                    $v6=  (( $item6 !== false) ?  $item6 : ", &nbsp;");
                    $v7=  (( $item7 !== false) ?  $item7 : ", &nbsp;");
                    $v8=  (( $item8 !== false) ?  $item8 : ", &nbsp;");
                    $v9=  (( $item9 !== false) ?  $item9 : ", &nbsp;");
                    $v10= (( $item10 !== false) ? $item10 : ", &nbsp;");
                    $v11= (( $item11 !== false) ? $item11 : ", &nbsp;");
                    $v12= (( $item12 !== false) ? $item12 : ", &nbsp;");
                    $v13= (( $item13 !== false) ? $item13 : ", &nbsp;");
                    $v14= (( $item14 !== false) ? $item14 : ", &nbsp;");
                    $v15= (( $item15 !== false) ? $item15 : ", &nbsp;");
                    $v16= (( $item16 !== false) ? $item16 : ", &nbsp;");
                    $v17= (( $item17 !== false) ? $item17 : ", &nbsp;");
                    $v18= (( $item18 !== false) ? $item18 : ", &nbsp;");
                    $v19= (( $item19 !== false) ? $item19 : ", &nbsp;");
                    $v20= (( $item20 !== false) ? $item20 : ", &nbsp;");
                    //agregando al arreglo

                    $valores = array(
                    'folio_producto'            => $v1,
                    'ClaveProdServ_concepto'    => $v2,
                    'NoIdentificacion_concepto' => $v3,
                    'ClaveUnidad_concepto'      => $v4,
                    'Descripcion_concepto'      => $v5,
                    'ValorUnitario_concepto'    => $v6,
                    'Moneda'                    => $v7,
                    'Descuento_concepto'        => $v8,
                    'Cantidad_concepto'         => $v9,
                    'importe_base_concepto'     => $v10,
                    'trans_iva_tasa'            => $v11,
                    'trans_iva_importe'         => $v12,
                    'trans_ieps_tasa'           => $v13,
                    'trans_ieps_importe'        => $v14,
                    'ret_iva_tasa'              => $v15,
                    'ret_iva_importe'           => $v16,
                    'ret_ieps_tasa'             => $v17,
                    'ret_ieps_importe'          => $v18,
                    'ret_isr_tasa'              => $v19,
                    'ret_isr_importe'           => $v20
                    );                    
                    //print_r($valores);//print_r($valores);
                    $detalle_factura = 
                    array(
                    'id_concepto'           => $v2, 
                    'id_factura_encabezado' => $id_factura,
                    'cantidad'              => $v9,     
                    'Unidad'                => $v4, 
                    'Importe'               => $v10,
                    'descuento_detalle'     => $v8
                    );
                    $id_detalle_factura=$this->Inicio_Modelo->registrar_y_retornar("detalle_factura",$detalle_factura);
                    if ($v11 > 0) {
                        $impuestoIvaTrans = array(
                            'id_factura_encabezado' => $id_factura,
                            'id_detalle_factura'    => $id_detalle_factura,
                            'Base'                  => $v10,
                            'Impuesto'              => "002",
                            'TipoFactor'            => "Tasa",
                            'TasaOCuota'            => $v11,
                            'Importe'               => $v12,
                            'estatus'               => "translados"
                        );
                        $this->Inicio_Modelo->registrar_todo("impiestos",$impuestoIvaTrans);
                    }
                    if ($v13 > 0) {
                        $impuestoIepsTrans = array(
                            'id_factura_encabezado' => $id_factura,
                            'id_detalle_factura'    => $id_detalle_factura,
                            'Base'                  => $v10,
                            'Impuesto'              => "003",
                            'TipoFactor'            => "Tasa",
                            'TasaOCuota'            => $v13,
                            'Importe'               => $v14,
                            'estatus'               => "translados"
                        );
                        $this->Inicio_Modelo->registrar_todo("impiestos",$impuestoIepsTrans);
                    }
                    if ($v15 > 0) {
                        $impuestoIsrRet = array(
                            'id_factura_encabezado' => $id_factura,
                            'id_detalle_factura'    => $id_detalle_factura,
                            'Base'                  => $v10,
                            'Impuesto'              => "001",
                            'TipoFactor'            => "Tasa",
                            'TasaOCuota'            => $v15,
                            'Importe'               => $v16,
                            'estatus'               => "retenidos"
                        );
                        $this->Inicio_Modelo->registrar_todo("impiestos",$impuestoIsrRet);
                    }
                    if ($v17 > 0) {
                        $impuestoIvaRet = array(
                            'id_factura_encabezado' => $id_factura,
                            'id_detalle_factura'    => $id_detalle_factura,
                            'Base'                  => $v10,
                            'Impuesto'              => "002",
                            'TipoFactor'            => "Tasa",
                            'TasaOCuota'            => $v17,
                            'Importe'               => $v18,
                            'estatus'               => "retenidos"
                        );
                        $this->Inicio_Modelo->registrar_todo("impiestos",$impuestoIvaRet);
                    }
                    if ($v19 > 0) {
                        $impuestoIepsRet = array(
                            'id_factura_encabezado' => $id_factura,
                            'id_detalle_factura'    => $id_detalle_factura,
                            'Base'                  => $v10,
                            'Impuesto'              => "003",
                            'TipoFactor'            => "Tasa",
                            'TasaOCuota'            => $v19,
                            'Importe'               => $v20,
                            'estatus'               => "retenidos"
                        );
                        $this->Inicio_Modelo->registrar_todo("impiestos",$impuestoIepsRet);
                    }

                    else{
                        echo "<h3>no existe impuesto</h3>";
                    }

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
                    $item20 = next( $items20 );

                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false  && $item6 === false && $item7 === false && $item8 === false && $item9 === false && $item10 === false && $item11 === false && $item12 === false && $item13 === false && $item14 === false && $item15 === false  && $item16 === false && $item17 === false && $item18 === false && $item19 === false && $item20 === false) break;
                }
                echo '<br>';
                //print_r($ultimo_id);
                $importe_base_producto=
                 $this->Inicio_Modelo->selecciona_un_registro('SUM(Importe) AS DF_IMPORTE_TOTAL','detalle_factura','id_factura_encabezado',$ultimo_id);
                 $descuento_producto=
                 $this->Inicio_Modelo->selecciona_un_registro('SUM(descuento_detalle) AS DF_DESCTUENTO_TOTAL','detalle_factura','id_factura_encabezado',$ultimo_id);
                 $iva_transladado=
                 $this->Inicio_Modelo->total_impuesto('SUM(Importe) AS impuestos_IVA_T_TOTAL','impiestos','id_factura_encabezado',$ultimo_id,'Impuesto','2','estatus','translados');
                 $ieps_transladado=
                 $this->Inicio_Modelo->total_impuesto('SUM(Importe) AS impuestos_IEPS_T_TOTAL','impiestos','id_factura_encabezado',$ultimo_id,'Impuesto','3','estatus','translados');
                 $isr_retenido=
                 $this->Inicio_Modelo->total_impuesto('SUM(Importe) AS impuestos_ISR_R_TOTAL','impiestos','id_factura_encabezado',$ultimo_id,'Impuesto','1','estatus','retenidos');
                 $iva_retenido=
                 $this->Inicio_Modelo->total_impuesto('SUM(Importe) AS impuestos_IVA_R_TOTAL','impiestos','id_factura_encabezado',$ultimo_id,'Impuesto','2','estatus','retenidos');
                 $ieps_retenido=
                 $this->Inicio_Modelo->total_impuesto('SUM(Importe) AS impuestos_IEPS_R_TOTAL','impiestos','id_factura_encabezado',$ultimo_id,'Impuesto','3','estatus','retenidos');
                $this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Generar CFDI','Creo un CFDI');
                echo "<br/><hr/><h3>IMPUESTOS</h3>";
                print_r($importe_base_producto);echo('<hr/>');

                print_r($descuento_producto);echo('<hr/>');

                print_r($iva_transladado);echo('<hr/>');

                print_r($ieps_transladado);echo('<hr/>');

                print_r($isr_retenido);echo('<hr/>');

                print_r($iva_retenido);echo('<hr/>');

                print_r($ieps_retenido);echo('<hr/>');
                echo "<br/><hr/><h3>IMPORTE BASE</h3>";
                $importe=($importe_base_producto['DF_IMPORTE_TOTAL']);
                echo $importe;
                echo "<br/><hr/><h3>DESCUENTOS</h3>";
                $descuento=$descuento_producto['DF_DESCTUENTO_TOTAL'];
                echo($descuento);
                echo "<br/><hr/><h3>TOTAL DE IMPUESTOS TRANSLADADOS</h3>";
                $TIT=($iva_transladado['impuestos_IVA_T_TOTAL'] + $ieps_transladado['impuestos_IEPS_T_TOTAL']);
                echo($TIT);
                $TIR=($isr_retenido['impuestos_ISR_R_TOTAL']+$iva_retenido['impuestos_IVA_R_TOTAL']+$ieps_retenido['impuestos_IEPS_R_TOTAL']);
                echo "<br/><hr/><h3>TOTAL DE IMPUESTOS RETENIDOS</h3>";
                echo($TIR);
                echo "<br/><hr/><h3>SUBTOTAL</h3>";
                $subtotal=($importe_base_producto['DF_IMPORTE_TOTAL']);
                echo $subtotal;
                echo "<br/><hr/><h3>TOTAL</h3>";
                $total=($subtotal+$TIT-$TIR)-$descuento;
                echo $total;
                echo "
                <table border='1'>
                <tr>
                    <td>DESCUENTO</td><td>SUBTOTAL</td><td>TOTAL</td>
                </tr>
                <tr>
                    <td>$descuento</td><td>$subtotal</td><td>$total</td>
                </tr>
                </table>";
                $totales_factura_encabezado = array('descuento' => $descuento,'subtotal' =>$subtotal, 'total' =>$total);
                print_r($totales_factura_encabezado);
                
                $this->Inicio_Modelo->editar_un_registro('factura_encabezado',$totales_factura_encabezado,'id_factura_encabezado',$id_factura);
                header("Location:".base_url()."comprobantes/index");
                }else{
                echo " usted no ha generado nada";
            }
            //header("Location:".base_url()."Login/user_logout");                      
        }
        }else{
                //$this->load->view('pagina/sin_privilegios');
                echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
                echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
                echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
        }

       }else
       {
            echo "denegado 1";
       }
    }
}