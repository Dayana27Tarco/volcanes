<?php

class Situacion extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  public function insertar($datos)
  {
    if ($this->db->insert("situacion", $datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function obtenerTodas()
  {
    $situaciones = $this->db->get("situacion");
    if ($situaciones->num_rows() > 0) {
      return $situaciones->result();
    } else {
      return false;
    }
  }
  public function eliminarPorId($id)
  {
    $this->db->where("id_si_dn", $id);
    return $this->db->delete("situacion");
  }

  public function ObtenerPorId($id)
  {
    $this->db->where("id_si_dn", $id);
    $situacion = $this->db->get("situacion");
    if ($situacion->num_rows() > 0) {
      return $situacion->row();
    } else {
      return false;
    }
  }
  public function editar($id, $datos)
  {
    $this->db->where("id_si_dn", $id);
    if ($this->db->update("situacion", $datos)) {
      return true;
    } else {
      return false;
    }
  }
}// cierre de la clase
