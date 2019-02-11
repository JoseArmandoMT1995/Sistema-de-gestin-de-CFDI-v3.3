<?php
	class Inicio_Modelo extends CI_model{
	public function registrar_todo($tabla,$valores){
	$this->db->insert($tabla, $valores);
	//inserta datos 
	}
	public function registrar_y_retornar($tabla,$valores){
	//inserta datos
	$this->db->insert($tabla, $valores);
	//recive el id de la consulta insert into 
	return $this->db->insert_id();
   
		  
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
	public function selecciona_muchos_registros($campos_seleccionados,$tabla,$campo_a,$valor_campo_a){
	$this->db-> select($campos_seleccionados);
	$this->db->   from($tabla);
	$this->db->  where($campo_a,$valor_campo_a);
	return $this->db->get()->result_array();		
	}
	public function seleccionar_dos_tablas_un_registro(
		$campos_seleccionados,
		$tabla1,
		$tabla2,
		$id1,
		$id2,
		$valor_id1){
	$this->db->select($campos_seleccionados);    
	$this->db->from($tabla1);
	$this->db->join($tabla2, $tabla1.'.'.$id1.'='.$tabla2.'.'.$id2);
	$this->db->where($id1,$valor_id1);
	$consulta=$this->db->get();
		if ( $consulta->num_rows() > 0 ){
		    $row = $consulta->row_array();
		    return $row;
		}		
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
	public function editar_un_registro($tabla,$valores,$idntificador,$valor_id){
		$this->db->where($idntificador, $valor_id);
		$this->db->update($tabla, $valores);
	}
	public function eliminar_un_registro($tabla,$idntificador,$valor_id){
		$this->db->where($idntificador, $valor_id);
		$this->db->delete($tabla); 	
	}
}
?>