<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alertas extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model("alerta");
  }
  public function index()
  {
    $data["alertas"] = $this->alerta->obtenerTodos();
    $this->load->view("header");
    $this->load->view("alertas/index", $data);
    $this->load->view("footer");
  }
  public function guardar()
  {
    $datosAlerta = array(
      "nombre_alert_dn" => $this->input->post("nombre_alert_dn"),
      "impacto_alert_dn" => $this->input->post("impacto_alert_dn"),
    );
    if ($this->alerta->insertar($datosAlerta)) {
      $resultado = array("estado" => "OK", "mensaje" => "Alerta insertado Exitosamente");
    } else {
      $resultado = array("estado" => "error");
    }
    echo json_encode($resultado);
  }

  public function actualizar($id)
  {
    $datosAlerta = array(
      "nombre_alert_dn" => $this->input->post("nombre_alert_dn_editar"),
      "impacto_alert_dn" => $this->input->post("impacto_alert_dn_editar"),
    );
    if ($this->alerta->actualizar($id, $datosAlerta)) {
      $resultado = array("estado" => "OK", "mensaje" => "Alerta actualizado Exitosamente");
    } else {
      $resultado = array("estado" => "error");
    }
    echo json_encode($resultado);
  }

  public function obtenerPorId($id)
  {
    $alerta = $this->alerta->obtenerPorId($id);
    if ($alerta) {
      $resultado = array("estado" => "OK", "alerta" => $alerta);
    } else {
      $resultado = array("estado" => "error");
    }
    echo json_encode($resultado);
  }

  public function eliminar($id)
  {
    if ($this->alerta->eliminarPorId($id)) {
      $resultado = array("estado" => "OK", "mensaje" => "Alerta eliminada Exitosamente");
    } else {
      $resultado = array("estado" => "error", "mensaje" => "Error al eliminar Alerta");
    }
    echo json_encode($resultado);
  }

  public function listado()
  {
    $data["alertas"] = $this->alerta->obtenerTodos();
    $this->load->view("alertas/listado", $data);
  }
}
