<?php

class Alerta extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }
  public function insertar($datos)
  {
    if ($this->db->insert("alerta", $datos)) {
      return true;
    } else {
      return false;
    }
  }
  public function obtenerTodos()
  {
    $alertas = $this->db->get("alerta");
    if ($alertas->num_rows() > 0) {
      return $alertas->result();
    } else {
      return false;
    }
  }
  public function eliminarPorId($id)
  {
    $this->db->where("id_alert_dn", $id);
    return $this->db->delete("alerta");
  }

  public function obtenerPorId($id)
  {
    $this->db->where("id_alert_dn", $id);
    $alerta = $this->db->get("alerta");
    if ($alerta->num_rows() > 0) {
      return $alerta->row();
    } else {
      return false;
    }
  }
  public function actualizar($id, $datos)
  {
    $this->db->where("id_alert_dn", $id);
    if ($this->db->update("alerta", $datos)) {
      return true;
    } else {
      return false;
    }
  }
}
