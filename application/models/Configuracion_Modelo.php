<?php
	class Configuracion_Modelo extends CI_model{
	
	
	
	public function nombres_redundantes($campos_seleccionados,$tabla,$campo_a,$valor_campo_a){
		$this->db-> select($campos_seleccionados);
		$this->db->   from($tabla);
		$this->db->  where($campo_a,$valor_campo_a);
		$consulta=$this->db->get();
		if ( $consulta->num_rows() > 0 ){
		    $row = $consulta->row_array();
		    return $row;
		}
	}
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

	public function mostrar_dos_tablas_completas(
		$campos_seleccionados,
		$tabla1,
		$tabla2,
		$id_f1,
		$id_f2
		){
	$this->db->select($campos_seleccionados);    
	$this->db->from($tabla1);
	$this->db->join($tabla2, $tabla1.'.'.$id_f1.'='.$tabla2.'.'.$id_f2);
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
	public function editar_un_registro_dos_condicionales($idntificador_a,$valor_id_a,$idntificador_b,$valor_id_b,$tabla,$valores){
		$this->db->where($idntificador_a, $valor_id_a);
		$this->db->where($idntificador_b, $valor_id_b);
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
	    
	}
?>