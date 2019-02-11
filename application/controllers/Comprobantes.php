<?php
class Comprobantes extends CI_Controller {
public function __construct(){
      parent::__construct();
        $this->load->helper('url');
        $this->load->model('Comprobantes_Modelo');
        $this->load->model('Generico_Modelo');
        $this->load->library('session');
  }
/********************************************************************************************************/
//Mi perfil
/********************************************************************************************************/
  public function index(){
        $id=$this->session->userdata('Usuclave');
        if (!$id==null) {
        $privilegios=$this->Generico_Modelo->privilegios_de_usuario($id);
        $comprobante =$this->Comprobantes_Modelo->seleccionar_cuatro_tablas_de_un_registro(
        "Usuclave,id_factura_encabezado,Fecha,Rason_social_emisor,Rason_social_receptor,Usunombre",
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
        "Usuclave",
        $id
        );
        //print_r($comprobante);

         $foto_perfil=$this->Generico_Modelo->imagen_perfil();  
        $this->load->view('complementos/sesion');
        $this->load->view('plantilla/head');
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav/comprobantes',compact('foto_perfil',"privilegios"));
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
//public 
/********************************************************************************************************/
//genera xml
/********************************************************************************************************/
  public function generar_cfdi($caso,$id_fe){
    $id_usuario=$this->session->userdata('Usuclave');
    $privilegios=$this->Generico_Modelo->privilegios_de_usuario($id_usuario);
    //print_r($privilegios);
    if ($privilegios['perfil_m']=='si') {
        $this->generar_xml($id_fe);
      }else{
                  echo "<h1>No tiene los permisos para acceder a esta pagina</h1>";
                  echo "<h2>para ingresar necesita pedirle los permisos al administrador encargado</h2>";
                  echo "<h1>GRACIAS POR SU COMPRENCION</h1>";
      }
  }
  
  public function generar_xml($id_fe,$cfdi){
      $cfdi_encabezado =$this->Comprobantes_Modelo->seleccionar_cuatro_tablas_un_registro(
        "*",
        "factura_encabezado","usuario","receptor","emisor",
        "id_usuario","Usuclave",
        "id_receptor","Id_receptor",
        "id_emisor","Id_emisor",
        "id_factura_encabezado",$id_fe
      );
      //print_r($cfdi_encabezado);
      $in="?";
      $i="<";
      $f=">";
      $ff="</";
      $ff1="/>";
      $espacio="\n";
      $textoXML= '<?xml version="1.0" encoding="UTF-8"?>';
      $textoXML.=$i.'cfdi:Comprobante xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd" Version="3.3" ';
      $textoXML.='Serie="s'.$cfdi_encabezado['Serie'].'" ';
      $textoXML.='Folio="'.$cfdi_encabezado['Folio'].'" ';
      $textoXML.='Fecha="'.$cfdi_encabezado['Fecha'].'" ';
      $textoXML.='Sello=" " ';
      $textoXML.='FormaPago="'.$cfdi_encabezado['FormaPago'].'" ';
      $textoXML.='NoCertificado="" ';
      $textoXML.='CertificadoCertificado="" ';
      $textoXML.='Descuento="'.$cfdi_encabezado['Descuento'].'" ';
      $textoXML.='Moneda="'.$cfdi_encabezado['Moneda'].'" ';
      $textoXML.='SubTotal="'.$cfdi_encabezado['SubTotal'].'" ';
      $textoXML.='Total="'.$cfdi_encabezado['Total'].'" ';
      $textoXML.='TipoDeComprobante="'.$cfdi_encabezado['TipoDeComprobante'].'" ';
      $textoXML.='MetodoPago="'.$cfdi_encabezado['MetodoPago'].'" ';
      $textoXML.='LugarExpedicion="'.$cfdi_encabezado['LugarExpedicion'].'">'.$espacio;
      $textoXML.=$i.'cfdi:Emisor ';
      $textoXML.='Rfc="'.$cfdi_encabezado['RFC_emisor'].'" ';
      $textoXML.='Nombre="'.$cfdi_encabezado['Rason_social_emisor'].'" ';
      $textoXML.='RegimenFiscal="'.$cfdi_encabezado['Regimen_fiscal'].'"'.$ff1.$espacio;

      $textoXML.=$i."cfdi:Receptor ";
      $textoXML.='Rfc="'.$cfdi_encabezado['RFC_receptor'].'" ';
      $textoXML.='Nombre="'.$cfdi_encabezado['Rason_social_receptor'].'" ';
      $textoXML.='RegimenFiscal="'.$cfdi_encabezado['Regimen_fiscal'].'"'.$ff1.$espacio;
      $textoXML.=$i.'cfdi:Conceptos>'.$espacio;
      //$textoXML.='Comprobante';
      $id_factura_encabezado=$cfdi_encabezado['id_factura_encabezado'];
      $conceptos =$this->Comprobantes_Modelo->seleccionar_tres_tablas_un_registro(
      "*","detalle_factura","conceptos","factura_encabezado",
      "id_concepto","ClaveProdServ",
      "id_factura_encabezado","id_factura_encabezado  ",
      "detalle_factura.id_factura_encabezado",$id_factura_encabezado);

      for ($filaX=0; $filaX <count($conceptos) ; $filaX++) {
        $textoXML.=$i.'cfdi:Concepto'.$espacio;
        $textoXML.='ClaveProdServ="'.$conceptos[$filaX]['ClaveProdServ'].'" NoIdentificacion="'.$conceptos[$filaX]['NoIdentificacion'].'" Cantidad="'.$conceptos[$filaX]['cantidad'].'" ClaveUnidad="'.$conceptos[$filaX]['ClaveUnidad'].'" Unidad="'.$conceptos[$filaX]['Unidad'].'" Descripcion="'.$conceptos[$filaX]['Descripcion'].'" ValorUnitario="'.$conceptos[$filaX]['ValorUnitario'].'" Importe="'.$conceptos[$filaX]['Importe'].'" Descuento="'.$conceptos[$filaX]['Descuento'].'">';  
        $textoXML.=$i.'cfdi:Impuestos>'.$espacio;
        $textoXML.=$i.'cfdi:Traslados>'.$espacio;
        
        $impuestosT =$this->Comprobantes_Modelo->seleccionar_tres_tablas_un_registro_translados_o_retenciones(
        "*",
        "impiestos","detalle_factura","factura_encabezado",
        "id_detalle_factura","id_detalle_factura",
        "id_factura_encabezado","id_factura_encabezado",
        "impiestos.id_detalle_factura",$conceptos[$filaX]['id_detalle_factura'],
        "impiestos.estatus","translados");
        //echo "hola";
        for ($filaY=0; $filaY <count($impuestosT) ; $filaY++) {
          $textoXML.=$i.'cfdi:Traslado Base="'.$impuestosT[$filaY]['Base'].'" Impuesto="'.$impuestosT[$filaY]['Impuesto'].'" TipoFactor="'.$impuestosT[$filaY]['TipoFactor'].'" TasaOCuota="'.$impuestosT[$filaY]['TasaOCuota'].'" Importe="'.$impuestosT[$filaY]['Base']*$impuestosT[$filaY]['TasaOCuota'].'"/>'.$espacio;
        }
        $textoXML.=$i.'/cfdi:Traslados>'.$espacio;
        $textoXML.=$i.'cfdi:Retenciones>'.$espacio;
        $impuestosR =$this->Comprobantes_Modelo->seleccionar_tres_tablas_un_registro_translados_o_retenciones(
        "*","impiestos","detalle_factura","factura_encabezado",
        "id_detalle_factura","id_detalle_factura",
        "id_factura_encabezado","id_factura_encabezado",
        "impiestos.id_detalle_factura",$conceptos[$filaX]['id_detalle_factura'],
        "impiestos.estatus","retenidos");
        for ($filaY=0; $filaY <count($impuestosR) ; $filaY++) {     
          $textoXML.=$i.'cfdi:Retencion Base="'.$impuestosR[$filaY]['Base'].'" Impuesto="'.$impuestosR[$filaY]['Impuesto'].'" TipoFactor="'.$impuestosR[$filaY]['TasaOCuota'].'" TasaOCuota="'.$impuestosR[$filaY]['TasaOCuota'].'" Importe="'.$impuestosR[$filaY]['Importe'].'"/>'.$espacio;
        }
      $textoXML.=$i.'/cfdi:Retenciones>'.$espacio;
      $textoXML.=$i.'/cfdi:Impuestos>'.$espacio;
      $textoXML.=$i.'/cfdi:Concepto>'.$espacio;
      }
      $importe_base_producto=
      $this->Comprobantes_Modelo->selecciona_un_registro('SUM(Importe) AS DF_IMPORTE_TOTAL','detalle_factura','id_factura_encabezado',$id_fe);
      $descuento_producto=
      $this->Comprobantes_Modelo->selecciona_un_registro('SUM(descuento_detalle) AS DF_DESCTUENTO_TOTAL','detalle_factura','id_factura_encabezado',$id_fe);
    /**impuestos transladados*/
      $iva_transladado=
      $this->Comprobantes_Modelo->total_impuesto('SUM(Importe) AS impuestos_IVA_T_TOTAL','impiestos','id_factura_encabezado',$id_fe,'Impuesto','2','estatus','translados');
      //print_r($iva_transladado);
      $ieps_transladado=
      $this->Comprobantes_Modelo->total_impuesto('SUM(Importe) AS impuestos_IEPS_T_TOTAL','impiestos','id_factura_encabezado',$id_fe,'Impuesto','3','estatus','translados');
      //print_r($ieps_transladado);
    /**impuestos retenidos*/
      $isr_retenido=
      $this->Comprobantes_Modelo->total_impuesto('SUM(Importe) AS impuestos_ISR_R_TOTAL','impiestos','id_factura_encabezado',$id_fe,'Impuesto','1','estatus','retenidos');
      $iva_retenido=
      $this->Comprobantes_Modelo->total_impuesto('SUM(Importe) AS impuestos_IVA_R_TOTAL','impiestos','id_factura_encabezado',$id_fe,'Impuesto','2','estatus','retenidos');
      $ieps_retenido=
      $this->Comprobantes_Modelo->total_impuesto('SUM(Importe) AS impuestos_IEPS_R_TOTAL','impiestos','id_factura_encabezado',$id_fe,'Impuesto','3','estatus','retenidos');
      
      //$this->Generico_Modelo->monitoreo_usuario('monitoreo_usuario','Generar CFDI','Creo un CFDI');
      
      $importe=($importe_base_producto['DF_IMPORTE_TOTAL']);      
      $descuento=$descuento_producto['DF_DESCTUENTO_TOTAL'];

      $TIT=($iva_transladado['impuestos_IVA_T_TOTAL'] + $ieps_transladado['impuestos_IEPS_T_TOTAL']);
      
      $TIR=($isr_retenido['impuestos_ISR_R_TOTAL']+$iva_retenido['impuestos_IVA_R_TOTAL']+$ieps_retenido['impuestos_IEPS_R_TOTAL']);
      $TIT=round($TIT,2);
      $TIR=round($TIR,2);
      $SUBTOTAL=($importe_base_producto['DF_IMPORTE_TOTAL']+$TIT);

      $textoXML.=$i.'/cfdi:Conceptos>'.$espacio;
      $textoXML.=$i.'cfdi:Impuestos TotalImpuestosTrasladados="'.$TIT.'" TotalImpuestosRetenidos="'.$TIR.'">'.$espacio;
      $textoXML.=$i.'cfdi:Traslados>'.$espacio;

      //echo round($iva_transladado['impuestos_IVA_T_TOTAL'],2);
      if ($iva_transladado['impuestos_IVA_T_TOTAL']!=0) {
        $textoXML.=$i.'cfdi:Traslado Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="'.round($iva_transladado['impuestos_IVA_T_TOTAL'],2).'"/>'.$espacio;
      }
      if ($ieps_transladado['impuestos_IEPS_T_TOTAL']!=0) {
        $textoXML.=$i.'cfdi:Traslado Impuesto="003" TipoFactor="Tasa" TasaOCuota="0.500000" Importe="'.round($ieps_transladado['impuestos_IEPS_T_TOTAL'],2).'"/>'.$espacio;
      }
      $textoXML.=$i.'/cfdi:Traslados>'.$espacio;
      $textoXML.=$i.'cfdi:Retenciones>'.$espacio;
      if ($isr_retenido['impuestos_ISR_R_TOTAL']!=0) {
        $textoXML.=$i.'cfdi:Retenido Impuesto="001" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="'.round($isr_retenido['impuestos_ISR_R_TOTAL'],2).'"/>'.$espacio;
      }
      if ($iva_retenido['impuestos_IVA_R_TOTAL']!=0) {
        $textoXML.=$i.'cfdi:Retenido Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="'.round($iva_retenido['impuestos_IVA_R_TOTAL'],2).'"/>'.$espacio;
      }
      if ($ieps_retenido['impuestos_IEPS_R_TOTAL']!=0) {
        $textoXML.=$i.'cfdi:Retenido Impuesto="003" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="'.round($ieps_retenido['impuestos_IEPS_R_TOTAL'],2).'"/>'.$espacio;
      }
      
      $textoXML.=$i.'/cfdi:Retenciones>'.$espacio;
      $textoXML.=$i.'/cfdi:Impuestos>'.$espacio;
      $textoXML.='</cfdi:Comprobante>';
      echo $textoXML;
      $textoXML = mb_convert_encoding($textoXML, "UTF-8");
      // Grabamos el XML en el servidor como un fichero plano, para
      // poder ser leido por otra aplicación.
      $nombre_ubicacion_doc_xml="usuarios/cfdi/Normal/".$cfdi_encabezado['RFC_emisor'].".xml";
      $nombre_archivo=$cfdi_encabezado['RFC_emisor'].".xml";
      $gestor = fopen($nombre_ubicacion_doc_xml, 'w');
      fwrite($gestor, $textoXML);
      fclose($gestor);
      
     //header('Location:'.base_url().'usuarios/cfdi/n/'.$cfdi_encabezado['RFC_emisor'].'.xml');


    /*echo $nombre_ubicacion_doc_xml;
    echo "<CENTER><h1>'XML'</h1></CENTER>";

    echo '<a href="'.
    base_url().'usuarios/cfdi/n/'.$cfdi_encabezado['RFC_emisor'].
    '.xml"><button>XML SIN TIMBRAR</button></a>';
    
    $miArray = array(
    'hola' => "caca",
    'mundo'=>"mi caca"
    );

    echo "<a href='http://localhost/prueba_get/prueba2.php/?miArray="
    .serialize($miArray).
    "'><button>XML TIMBRADO</button></a>";*/
    //echo $nombre_ubicacion_doc_xml;
    $foto_perfil=$this->Generico_Modelo->imagen_perfil();  
    $id=$this->session->userdata('Usuclave');
    $privilegios=$this->Generico_Modelo->privilegios_de_usuario($id);

    //print_r($cfdi_encabezado);
    //echo $nombre_ubicacion_doc_xml;
 
    $this->load->view("pagina/comprobantes/generar_cfdi",
      compact(
      "privilegios","foto_perfil","nombre_ubicacion_doc_xml","nombre_archivo","cfdi_encabezado","cfdi"
      ));
  }
  public function descargar_documentos(){
    //echo base_url()."usuarios/cfdi/n/131130218.xml";
    //echo "<br>".$_GET['condicion'];
    if($_GET['condicion']=="T"){
      $nombre_archivo=$_GET["nombre_archivo"];
      $archivo=$_GET["ubicacion_doc_xml"];
      $archivo=$archivo;
      echo $archivo;
    }
    else{
      $nombre_archivo=$_GET["nombre_archivo"];
      $archivo=$_GET["ubicacion_doc_xml"];
      $archivo=base_url().$archivo;
      echo $archivo;
    }
    
    header("Content-disposition: attachment; filename=".$nombre_archivo);
    header("Content-type: *");
    readfile($archivo);
    
    
  }
  public function timbrado(){
  //echo "timbrado";
  //echo $_GET["ubicacion_doc_xml"];
    $ubicacion="http://localhost/factuwin10/usuarios/cfdi/n/131130218.xml/";
    //echo "puente 1 => <br>";
    $arreglo = array(
      'nombre_del_archivo_xml' => $_GET["nombre_archivo"],
      'ubicacion_xml'=>$ubicacion.$_GET["nombre_archivo"],
      'rfc_emisor'=>$_GET["rfc_emisor"],
      'num_certificado'=>$_GET["noCer"],
      'archivo_cer'=>$_GET["archivo_cer"],
      'archivo_pem'=>$_GET["archivo_pem"],
      'usuario_id'=>$_GET["Usuario_id"],
      'usuario_contraseña'=>$_GET["Usuario_contraseña"],
    );
    echo "<pre>";
    print_r($arreglo);
    echo "</pre>";
    echo $arreglo["rfc_emisor"];
    //header("http://localhost/prueba_get/prueba2.php?miArray=".serialize($miArray));
    header(
    "Location: http://localhost/FacturacionModerna-PHP-master/ejemploTimbradoXML33.php?miArray="
    .serialize($arreglo)."/");
  
  }
  
  public function generar_xml_nuevo($id_fe){
    //$xml=$this->generar_cfdi_xml($id_fe);
    header(
    "Location: http://localhost/FacturacionModerna-PHP-master/prueba_timbrado2.php?factura_encabezado="
    .$id_fe);

  }
  public function generar_cfdi_xml($id_fe){
    echo "hola esto es generar xml nuevo";
    echo "<br>el id es $id_fe";
    echo "<br>a entrado a generar_cfdi_xml";
    $fecha_actual = substr( date('c'), 0, 19);
    echo "<br>la hora es:".$fecha_actual;
    header(
    "Location: http://localhost/FacturacionModerna-PHP-master/ejemploTimbradoXML33.php?miArray="
    .serialize($arreglo)."/");
  }

  public function opciones_descarga_cfdi(){

  }
}
?>