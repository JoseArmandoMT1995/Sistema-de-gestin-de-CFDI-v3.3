<?php
	class Comprobantes_Modelo extends CI_model{

	public function registrar_todo($tabla,$valores){
	$this->db->insert($tabla, $valores);
		  //inserta datos 
	}
	public function resiveTodaLaTabla($tabla){
	//selecciona todos los campos de la tabla x
	return $this->db->query("SELECT * FROM $tabla ")->result();
	}
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
	public function seleccionar_dos_tablas_un_registro(
		$campos_seleccionados,
		$tabla1,
		$tabla2,
		$id_f1,
		$id_f2,
		$id,
		$valor_id){
	$this->db->select($campos_seleccionados);    
	$this->db->from($tabla1);
	$this->db->join($tabla2, $tabla1.'.'.$id_f1.'='.$tabla2.'.'.$id_f2);
	$this->db->where($id,$valor_id);
	$consulta=$this->db->get();
		if ( $consulta->num_rows() > 0 ){
		    $row = $consulta->row_array();
		    return $row;
		}		
	}
	public function seleccionar_dos_tablas(
		$campos_seleccionados,
		$tabla1,
		$tabla2,
		$id_f1,
		$id_f2,
		$id,
		$valor_id){
	$this->db->select($campos_seleccionados);    
	$this->db->from($tabla1);
	$this->db->join($tabla2, $tabla1.'.'.$id_f1.'='.$tabla2.'.'.$id_f2);
	$this->db->where($id,$valor_id);
	return $this->db->get()->result_array();	
	}
	public function seleccionar_tres_tablas_un_registro(
		$campos_seleccionados,

		$tabla1,
		$tabla2,
		$tabla3,
		
		$id_f1_t1,
		$id_f1_t2,
		$id_f2_t1,
		$id_f2_t3,

		$id,
		$valor_id
		){
		$this->db->select($campos_seleccionados);    
		$this->db->from($tabla1);
		$this->db->join($tabla2, $tabla1.'.'.$id_f1_t1.'='.$tabla2.'.'.$id_f1_t2);
		$this->db->join($tabla3, $tabla1.'.'.$id_f2_t1.'='.$tabla3.'.'.$id_f2_t3);
		$this->db->where($id,$valor_id);
 		return $this->db->get()->result_array();
	}
	public function seleccionar_tres_tablas_un_registro_translados_o_retenciones(
		$campos_seleccionados,

		$tabla1,
		$tabla2,
		$tabla3,
		
		$id_f1_t1,
		$id_f1_t2,
		$id_f2_t1,
		$id_f2_t3,

		$id,
		$valor_id,

		$campo_estatus,
		$valor_estatus
		){
		$this->db->select($campos_seleccionados);    
		$this->db->from($tabla1);
		$this->db->join($tabla2, $tabla1.'.'.$id_f1_t1.'='.$tabla2.'.'.$id_f1_t2);
		$this->db->join($tabla3, $tabla1.'.'.$id_f2_t1.'='.$tabla3.'.'.$id_f2_t3);
		$this->db->where($id,$valor_id);
		$this->db->where($campo_estatus,$valor_estatus);
 		return $this->db->get()->result_array();
	}
	public function seleccionar_cuatro_tablas_un_registro(
		$campos_seleccionados,

		$tabla1,
		$tabla2,
		$tabla3,
		$tabla4,
		
		$id_f1_t1,
		$id_f1_t2,
		$id_f2_t1,
		$id_f2_t3,
		$id_f3_t1,
		$id_f3_t4,

		$id,
		$valor_id
		){
		$this->db->select($campos_seleccionados);    
		$this->db->from($tabla1);
		$this->db->join($tabla2, $tabla1.'.'.$id_f1_t1.'='.$tabla2.'.'.$id_f1_t2);
		$this->db->join($tabla3, $tabla1.'.'.$id_f2_t1.'='.$tabla3.'.'.$id_f2_t3);
		$this->db->join($tabla4, $tabla1.'.'.$id_f3_t1.'='.$tabla4.'.'.$id_f3_t4);
		$this->db->where($id,$valor_id);
 		$consulta=$this->db->get();
		if ( $consulta->num_rows() > 0 ){
		    $row = $consulta->row_array();
		    return $row;
		}
		
	}
	public function seleccionar_cuatro_tablas_de_un_registro(
		$campos_seleccionados,

		$tabla1,
		$tabla2,
		$tabla3,
		$tabla4,
		
		$id_f1_t1,
		$id_f1_t2,
		$id_f2_t1,
		$id_f2_t3,
		$id_f3_t1,
		$id_f3_t4,

		$id,
		$valor_id
		){
		$this->db->select($campos_seleccionados);    
		$this->db->from($tabla1);
		$this->db->join($tabla2, $tabla1.'.'.$id_f1_t1.'='.$tabla2.'.'.$id_f1_t2);
		$this->db->join($tabla3, $tabla1.'.'.$id_f2_t1.'='.$tabla3.'.'.$id_f2_t3);
		$this->db->join($tabla4, $tabla1.'.'.$id_f3_t1.'='.$tabla4.'.'.$id_f3_t4);
		$this->db->where($id,$valor_id);
	return $this->db->get()->result_array();
	}
	public function seleccionar_tres_tablas(
		$campos_seleccionados,
		$tabla1,
		$tabla2,
		$tabla3,
		$id_f1,
		$id_f2,
		$id_f3,
		$id,
		$valor_id){
	$this->db->select($campos_seleccionados);    
	$this->db->from($tabla1);
	$this->db->join($tabla2, $tabla1.'.'.$id_f1.'='.$tabla2.'.'.$id_f2);
	$this->db->join($tabla3, $tabla1.'.'.$id_f1.'='.$tabla2.'.'.$id_f2);
	$this->db->where($id,$valor_id);
	//$consulta=$this->db->get();
	return $query = $this->db->get();
	}
	public function seleccionar_cuatro_tablas(
		$campos_seleccionados,
		$tabla1,
		$tabla2,
		$tabla3,
		$tabla4,
		
		$id_f1_t1,
		$id_f1_t2,

		$id_f2_t1,
		$id_f2_t3,

		$id_f3_t1,
		$id_f3_t4){
		$this->db->select($campos_seleccionados);    
		$this->db->from($tabla1);
		$this->db->join($tabla2, $tabla1.'.'.$id_f1_t1.'='.$tabla2.'.'.$id_f1_t2);
		$this->db->join($tabla3, $tabla1.'.'.$id_f2_t1.'='.$tabla3.'.'.$id_f2_t3);
		$this->db->join($tabla4, $tabla1.'.'.$id_f3_t1.'='.$tabla4.'.'.$id_f3_t4);
 		return $this->db->get()->result_array();
	}

	public function ultimo_registro($campos,$tabla,$id){
		$this->db->select($campos);
        $this->db->from($tabla);
        $this->db->order_by($id, "DESC");
		$this->db->limit(1);
		$consulta=$this->db->get();
		if ( $consulta->num_rows() > 0 ){
		    $row = $consulta->row_array();
		    return $row;
		}
	}
	public function editar_un_registro($idntificador,$valor_id,$tabla,$valores){
		$this->db->where($idntificador, $valor_id);
		$this->db->update($tabla, $valores);
	}
	public function eliminar_un_registro($tabla,$idntificador,$valor_id){
		$this->db->where($idntificador, $valor_id);
		$this->db->delete($tabla); 	
	}
	public function rfc_receptor($rfc){
			$this->db-> select('*');
			$this->db->   from('receptores');
			$this->db->  where('rfc',$rfc);
			$query=$this->db->get();

		    if($query->num_rows()>0){
		      	return false;
		    	//return false;
		      	//ya exoste
		      	echo "ya existe";
		    }else{
		      	return true;
		    	//return true;
		      	//no existe
		    	echo "no existe";
		    }
		}
	public function genera_factura_encabezado($datos){
		//print_r($datos);
		$inicio='<';
		$fin='>';
		$encabezado0= '?xml version="'.$datos['Version'].'" '.'encoding="UTF-8"?';
		$encabezado1= 'cfdi:Comprobante xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:nomina12="http://www.sat.gob.mx/nomina12" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd http://www.sat.gob.mx/nomina12 http://www.sat.gob.mx/sitio_internet/cfd/nomina/nomina12.xsd" Version="'.$datos['Version'].'" Serie="'.$datos['Serie'].'" Folio="'.$datos['Folio'].
		'" Fecha="'.$datos['Fecha'].'" SubTotal="'.$datos['SubTotal'].'" Descuento="'.$datos['Descuento'].
		'" Moneda="'.$datos['Moneda'].'" Total="'.$datos['Total'].'" TipoDeComprobante="'.
		$datos['TipoDeComprobante'].'" FormaPago="'.$datos['FormaPago'].'" MetodoPago="'.$datos['MetodoPago']
		.'" LugarExpedicion="'.$datos['LugarExpedicion'].'" NoCertificado="'.$datos['NoCertificado']
		.'" Certificado"'.$datos['Certificado'].'" Sello"'.$datos['Sello'].'"';
		//echo $cadena;
		//return $cadena=$inicio.$encabezado0.$fin.$inicio.$encabezado1.$fin;
		//print_r($cadena);	
	}
	
	public function genera_factura_emisor($datos){
		$inicio='<';
		$fin='>';
		$emisor='cfdi:Emisor Rfc="'.$datos['RFC_emisor'].'" Nombre="'.$datos['Rason_social_emisor'].'" RegimenFiscal="'.$datos['Regimen_fiscal'].'" /';
		return $inicio.$emisor.$fin;

	}
	public function genera_factura_receptor($datos){
		$inicio='<';
		$fin='>';
		$emisor='cfdi:Emisor Rfc="'.$datos['RFC_receptor'].'" Nombre="'.$datos['Rason_social_receptor'].'" RegimenFiscal="'.$datos['Regimen_fiscal'].'" /';
		return $inicio.$emisor.$fin;
	} 
	public function genera_factura_concepto($datos){
		$inicio='<';
		$fin='>';
		$inicio_concepto='<cfdi:Conceptos>';
		$fin_concepto='</cfdi:Conceptos>';
		//</cfdi:Conceptos>
	}
	public function total_impuesto($campos_seleccionados,$tabla,$campo_a,$valor_campo_a,$campo_b,$valor_campo_b,$campo_c,$valor_campo_c){
	$this->db-> select($campos_seleccionados);
	$this->db->   from($tabla);
	$this->db->  where($campo_a,$valor_campo_a);
	$this->db->  where($campo_b,$valor_campo_b);
	$this->db->  where($campo_c,$valor_campo_c);
	$consulta=$this->db->get();
		if ( $consulta->num_rows() > 0 ){
		    $row = $consulta->row_array();
		    return $row;
		}			
	}
}
?>