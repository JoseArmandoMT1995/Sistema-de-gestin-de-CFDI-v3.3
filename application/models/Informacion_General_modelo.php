<?php
	class Informacion_General_modelo extends CI_model{
	public function login_user(
      $campos_elegidos,
      $tabla,
      $primer_identificdor,$valor_p_identificador,
      $segundo_identificador,$valor_s_identificador
    ){
    $this->db-> select($campos_elegidos);
    $this->db->   from($tabla);
    $this->db->  where($primer_identificdor,$valor_p_identificador);
    $this->db->  where($segundo_identificador,$valor_s_identificador);
    if($query=$this->db->get())
    {
        return $query->row_array();
    }
    else{

      return false;
    }
  }
  public function nombres_redundantes_editar_usuario(
		$campos_seleccionados,$tabla,$campo_a,$valor_campo_a,$campo_b,$valor_campo_b){
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
	public function editar_un_registro($idntificador,$valor_id,$tabla,$valores){
		$this->db->where($idntificador, $valor_id);
		$this->db->update($tabla, $valores);
	}
}
?>