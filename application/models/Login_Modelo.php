<?php
class Login_Modelo extends CI_model{
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
}
?>
